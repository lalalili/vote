<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Title;
use App\Models\Vote;
use DataEdit;
use DataFilter;
use DataGrid;
use Input;
use Redirect;
use View;
use Request;
use Flash;

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
        $edit->add('utf8_filename', '原始圖片名稱', 'text');
        $edit->add('path', '照片', 'image')->resize(160, 160)->move('uploads/demo/user')->preview(160, 160);


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

    public function show($id)
    {
        //$lists = Photo::findOrFail($id);
        $lists = Photo::with('Album', 'Title')->where('album_id',$id)->get();
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

    public function pull()
    {
        $voteToID = Request::input('voteToID');
        $Name = Request::input('name');
        $Phone = Request::input('phone');
        $Q1 = Request::input('q1');
        $Q2 = Request::input('q2');
        $Q3 = Request::input('q3');
        $Q4 = Request::input('q4');

        //dd($voteToID);
        //dd($Name);
        //dd($Phone);
        //dd($Q3);
        if ($voteToID == "")
        {
            return view('show');
        }
        else if ($Name == "") {
            Flash::warning('請輸入姓名');
            return Redirect::back();

        } else if ($Phone == "") {
            Flash::warning('請輸入電話');
            return Redirect::back();
        } else if ($Q4 <> "1") {
            Flash::warning('請勾選同意活動辦法');
            return Redirect::back();
        }
        $vote = new Vote;
        $vote->photo_id = $voteToID;
        $vote->name = $Name;
        $vote->phone = $Phone;
        $vote->q1 = $Q1;
        $vote->q2 = $Q2;
        $vote->q3 = $Q3;
        if ($vote->save()) {
            return Redirect::back()->back();
        } else {
            Flash::warning('系統異常，請再重新送出一次');
            return Redirect::back();
        }
    }

}
