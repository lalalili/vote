<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Title;
use App\Models\Vote;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Entrust;
use Flash;
use Input;
use Redirect;
use Request;
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
        $grid->add('updated_at', '更新時間');
        $grid->orderBy('album_id', 'asc');
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

    public function pull()
    {
        $voteToID = Request::input('voteToID');
        $Name = Request::input('name');
        $Phone = Request::input('phone');
        $Q1 = Request::input('q1');
        $Q2 = Request::input('q2');
        $Q3 = Request::input('q3');
        $Q4 = Request::input('q4');
        Request::flash();
        //dd($voteToID);
        //dd($Name);
        //dd($Phone);
        //dd($Q3);
        if ($voteToID == "") {
            return view('show');
        } elseif ($Name == "") {
            Flash::warning('請輸入姓名');
            return Redirect::back()->withInput();
        } elseif ($Phone == "") {
            Flash::warning('請輸入電話');
            return Redirect::back()->withInput();
        } elseif ($Q4 <> "1") {
            Flash::warning('請勾選同意活動辦法');
            return Redirect::back()->withInput();
        }
        $vote = new Vote;
        $vote->photo_id = $voteToID;
        $vote->name = $Name;
        $vote->phone = $Phone;
        if ($Q1 == 1) {
            $vote->q1 = $Q1;
        } else {
            $vote->q1 = 0;
        }
        if ($Q2 == 1) {
            $vote->q2 = $Q2;
        } else {
            $vote->q2 = 0;
        }
        if ($Q3 == 1) {
            $vote->q3 = $Q3;
        } else {
            $vote->q3 = 0;
        }
        if ($vote->save()) {
            return redirect('/thanks');
        } else {
            Flash::warning('系統異常，請再重新送出一次');
            return Redirect::back()->withInput();
        }
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
}
