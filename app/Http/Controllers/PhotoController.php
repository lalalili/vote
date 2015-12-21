<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Title;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Entrust;
use Excel;
use Flash;
use Input;
use Redirect;
use Request;
use Validator;
use View;

class PhotoController extends Controller
{
    public function anyList()
    {
        $filter = DataFilter::source(Photo::with('album', 'title'));
        //dd($filter);
        $filter->add('album.name', '據點', 'text');
        $filter->add('title.name', '職稱', 'text');
        $filter->add('name', '姓名', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);

        $grid->add('{{ $album->name }}', '據點', 'album_id');
        $grid->add('{{ $title->name }}', '職稱', 'title_id');
        $grid->add('name', '姓名');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);
        $grid->edit('/admin/photo/edit', '功能', 'show|modify');

        $grid->link('/admin/photo/edit', "新增員工", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Photo());
        //dd($edit);
        $edit->link("/admin/photo/list", "上一頁", "BL");
        $edit->link("/admin/photo/edit", "新增員工", "TR");
        $edit->label('員工編輯');

        $edit->add('album_id', '據點', 'select')->options(Album::lists("name", "id")->all());
        $edit->add('title_id', '職稱', 'select')->options(Title::lists("name", "id")->all());
        $edit->add('name', '姓名', 'text')->rule('required|min:2');
//        $edit->add('utf8_filename', '原始圖片名稱', 'text');
        $edit->add('path', '照片', 'image')->resize(145, 160)->move('uploads/images/user')->preview(145, 160);


        $grid = DataGrid::source(Photo::with('album', 'title'));
        $grid->add('{{ $album->name }}', '據點', 'album_id');
        $grid->add('{{ $title->name }}', '職稱', 'title_id');
        $grid->add('name', '姓名', true);
        $grid->add('updated_at', '更新時間');
        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        $grid->edit('/admin/photo/edit', '功能', 'show|modify');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function show($id)
    {
        //$lists = Photo::findOrFail($id);
        //$lists = Photo::with('Album', 'Title')->where('album_id', $id)->orderBy('titles.id', 'desc')->get();
        $lists = DB::table('photos')
            ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
            ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
            ->select('photos.id as id', 'photos.name as name', 'photos.path as path', 'titles.name as title',
                'albums.id as album_id', 'titles.note as order')
            ->where('album_id', $id)->orderBy('order', 'asc')->get();
        //dd($lists);
        return view('show', compact('lists'));
    }

    public function choose($id)
    {
        //dd($id);
        $to = Photo::findOrFail($id);
        //dd($to);
        return view('pull', compact('to'));
    }

    public function anyDelete()
    {
        if (!Entrust::hasRole('admin')) {
            return redirect('/admin');
        } else {
            $filter = DataFilter::source(Photo::with('album', 'title'));
            //dd($filter);
            $filter->add('album.name', '據點', 'text');
            $filter->add('title.name', '職稱', 'text');
            $filter->add('name', '姓名', 'text');

            $filter->submit('search');
            $filter->reset('reset');
            $filter->build();

            $grid = DataGrid::source($filter);

            $grid->add('{{ $album->name }}', '據點', 'album_id');
            $grid->add('{{ $title->name }}', '職稱', 'title_id');
            $grid->add('name', '姓名');
            $grid->add('updated_at', '更新時間');
            $grid->orderBy('album_id', 'asc');
            $grid->paginate(10);

            $grid->edit('/admin/photo/edit', '功能', 'show|modify|delete');

            $grid->link('/admin/photo/edit', "新增員工", "TR");
            return View::make('admin.list', compact('filter', 'grid'));
        }
    }

    public function wall($id)
    {
        //$lists = Photo::findOrFail($id);
        //$lists = Photo::with('Album', 'Title')->where('album_id', $id)->orderBy('titles.id', 'desc')->get();
        $lists = DB::table('photos')
            ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
            ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
            ->select('photos.id as id', 'photos.name as name', 'photos.path as path', 'albums.name as album',
                'albums.id as album_id', 'titles.note as order')
            ->where('title_id', $id)->orderBy('album_id', 'asc')->get();
        //dd($lists);
        return view('admin.wall', compact('lists'));
    }

    public function getDownload()
    {
        Excel::create('photo', function ($excel) {
            $excel->sheet('photo', function ($sheet) {
                $photos = DB::table('photos')
                    ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
                    ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
                    ->select('photos.name as name', 'photos.id as id', 'albums.area as area', 'albums.name as store',
                        'albums.id as album_id', 'titles.name as title', 'titles.id as title_id', 'photos.path as path')
                    ->orderBy('photos.id', 'asc')->get();
                //dd($photos);
                $data = array();
                foreach ($photos as $photo) {
                    $data[] = (array)$photo;
                }
                //dd($data);
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function anyBatch()
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
            if ($upload_name == 'photo.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'photo.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::selectSheets('new')->load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                //Photo::truncate();
                foreach ($uploads as $upload) {
                    Photo::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/photo/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }
}
