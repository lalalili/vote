<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Album;
use DataEdit;
use DataFilter;
use DataGrid;
use Excel;
use Flash;
use Redirect;
use Request;
use Validator;
use View;

class AlbumController extends Controller
{
    public function lists()
    {
        $filter = DataFilter::source(new Album());
        //dd($filter);
        $filter->add('name', '據點', 'text');
        $filter->add('area', '經銷商', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '據點');
        $grid->add('area', '經銷商');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/album/edit', '功能', 'show|modify|delete');

        $grid->link('/admin/album/edit', "新增據點", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function edit()
    {
        $edit = DataEdit::source(new Album());
        //dd($edit);
        $edit->link("/admin/album/list", "上一頁", "BL");
        $edit->link("/admin/album/edit", "新增據點", "TR");
        $edit->label('據點編輯');

        $edit->add('name', '據點', 'text')->rule('required|min:3');
        $edit->add('type', '類別', 'text')->rule('required|min:3');
        $edit->add('area', '經銷商', 'text')->rule('required|min:3');
        $edit->add('path', 'QR Code', 'image')->move('uploads/images/store')->resize(160, 160)->preview(160, 160);

//        $edit->add('column', '呈現欄位(預設3)', 'text');
//        $edit->add('seq', '呈現順序(1~9)', 'text');
//        $edit->add('is_display', '是否顯示', 'checkbox');

        $grid = DataGrid::source(new Album());
        $grid->add('name', '據點');
        $grid->add('area', '經銷商');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/album/edit', '功能', 'show|modify');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function batch()
    {
        $file = array('upload' => Request::file('upload'));
        $rules = array('upload' => 'required',);
        //dd(Request::file('upload'));
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            Flash::overlay('請選擇上傳Excel檔案', '警告');
            return Redirect::to('admin/adv');
        } else {
            // checking file is valid.
            $upload_name = Request::file('upload')->getClientOriginalName();
            //dd($upload_name);
            if ($upload_name == 'store.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'store.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::selectSheets('store')->load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                Album::truncate();
                foreach ($uploads as $upload) {
                    Album::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/album/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }

    public function show()
    {
        $lists1 = Album::where('area', '北智捷')->where('name', '<>','總公司')->get();
        $lists2 = Album::where('area', '桃智捷')->where('name', '<>','總公司')->get();
        $lists3 = Album::where('area', '中智捷')->where('name', '<>','總公司')->get();
        $lists4 = Album::where('area', '南智捷')->where('name', '<>','總公司')->get();
        $lists5 = Album::where('area', '高智捷')->where('name', '<>','總公司')->get();
        //dd($lists2);
        return view('qr', compact('lists1', 'lists2', 'lists3', 'lists4', 'lists5'));
    }

    public function choose($id)
    {
        //dd(Album::find($id));
        if (Album::find($id) <> null) {
            $storeId = $id;
            return view('home', compact('storeId'));
        } else {
            return redirect('/');
        }
    }

    public function download()
    {
        Excel::create('store', function ($excel) {
            $excel->sheet('store', function ($sheet) {
                $title = Album::all();
                //dd($data);
                $sheet->fromArray($title);
            });
        })->export('xlsx');
    }
}
