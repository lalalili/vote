<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Title;
use DataEdit;
use DataFilter;
use DataGrid;
use Input;
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
        $grid->add('{{ $title->name }}', '區域', 'title_id');
        $grid->add('name', '姓名');
        $grid->add('updated_at', '更新時間');
        $grid->orderBy('album_id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/photo/edit', '功能', 'show|modify');

        $grid->link('/admin/photo/edit', "新增員工", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Photo());
        //dd($edit);
        $edit->link("/admin/photo/list", "上一頁", "BL");
        $edit->link("/admin/photo/edit", "新增員工", "TR");
        $edit->label('員工編輯');

        $edit->add('album_id', '據點', 'select')->options(Album::lists("name", "id")->all());
        $edit->add('title_id', '職稱', 'select')->options(title::lists("name", "id")->all());
        $edit->add('name', '姓名', 'text')->rule('required|min:2');
        $edit->add('filename','照片', 'image')->move('uploads/demo/')->resize(160, 160)->preview(160, 160);


        $grid = DataGrid::source(Photo::with('album', 'title'));
        $grid->add('{{ $album->name }}', '據點', 'album_id');
        $grid->add('{{ $title->name }}', '據點', 'title_id');
        $grid->add('name', '姓名');
        $grid->add('updated_at', '更新時間');
        $grid->orderBy('album_id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/photo/edit', '功能', 'show|modify');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function show(){
        $lists = Photo::with('Album','Title')->get();
        //dd($lists);
        return view('vote', compact('lists'));
    }

    public function poll($id){
        //dd($id);
        $to = Photo::find($id);
        //dd($to->name);
        return view('pull', compact('to'));
    }
}
