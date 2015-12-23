<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Whitelist;
use DataEdit;
use DataFilter;
use DataGrid;
use Excel;
use Flash;
use Input;
use Redirect;
use Request;
use Validator;
use View;

class WhitelistController extends Controller
{
    public function lists()
    {
        $filter = DataFilter::source(new Whitelist());
        //dd($filter);
        $filter->add('name', '姓名', 'text');
        $filter->add('phone', '電話', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '姓名');
        $grid->add('phone', '電話');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/whitelist/edit', '功能', 'show|modify|delete');

        $grid->link('/admin/whitelist/edit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function edit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Whitelist());
        //dd($edit);
        $edit->link("/admin/whitelist/list", "上一頁", "BL");
        $edit->link("/admin/whitelist/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '姓名', 'text')->rule('required');
        $edit->add('phone', '電話', 'text')->rule('required');

        $grid = DataGrid::source(new Whitelist());
        $grid->add('name', '姓名');
        $grid->add('phone', '電話');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/whitelist/edit', '功能', 'show|modify|delete');

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
            if ($upload_name == 'whitelist.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'whitelist.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::selectSheets('whitelist')->load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                Whitelist::truncate();
                foreach ($uploads as $upload) {
                    Whitelist::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/whitelist/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }

    public function download()
    {
        Excel::create('whitelist', function ($excel) {
            $excel->sheet('whitelist', function ($sheet) {
                $title = Whitelist::all();
                //dd($data);
                $sheet->fromArray($title);
            });
        })->export('xlsx');
    }
}
