<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Vote;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Input;
use View;

class VoteController extends Controller
{

    public function anyList()
    {
        $filter = DataFilter::source(Vote::with('photo'));
        //dd($filter);
        //$filter->add('album.name', '據點', 'text');
        $filter->add('photo.name', '員工姓名', 'text');
        $filter->add('name', '客戶姓名', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);

        $grid->add('album', '據點');
        $grid->add('{{ $photo->name }}', '員工姓名', 'photo_id');
        $grid->add('name', '客戶姓名');
        $grid->add('updated_at', 'Last Updated');

        $grid->edit('/admin/vote/edit', 'Edit', 'show');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);


        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Vote());
        //dd($edit);
        $edit->link("/admin/vote/list", "Back", "BL");
        $edit->label('投票細項');

        $edit->add('album', '據點', 'text');
        $edit->add('photo_id', '員工姓名', 'select')->options(Photo::lists("name", "id")->all());;
        $edit->add('name', '客戶姓名', 'text');
        $edit->add('phone', '客戶電話', 'text');
        $edit->add('q1', '問題一', 'checkbox');
        $edit->add('q2', '問題二', 'checkbox');
        $edit->add('q3', '問題三', 'checkbox');

        $grid = DataGrid::source(Vote::with('photo'));
        $grid->add('album', '據點', 'album_id');
        $grid->add('{{ $photo->name }}', '員工姓名', 'photo_id');
        $grid->add('name', '客戶姓名');
        $grid->add('updated_at', 'Last Updated');

        $grid->edit('/admin/vote/edit', 'Edit', 'show');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function count()
    {
        $counts = DB::table('votes')
            ->Join('photos', 'votes.photo_id', '=', 'photos.id')
            ->join('albums', 'photos.album_id', '=', 'albums.id')
            ->select(DB::raw('count(*) as count, photos.name, albums.name as store'))->groupBy('photo_id')->orderBy('count', 'desc')->get();
        return view('admin.summary', compact('counts'));

//        $filter = DataFilter::source($counts);
//        $filter->text('store', '據點');
//        $filter->text('photos.name', '員工姓名');
//        $filter->submit('search');
//        $filter->reset('reset');
//        $filter->build();
//
//        $grid = DataGrid::source($filter);
//        $grid->attributes(array("class"=>"table table-striped"));
//        $grid->add('store', '據點');
//        $grid->add('name', '員工姓名');
//        $grid->add('count', '票數');
//        $grid->paginate(10);
//        return View::make('admin.list', compact('filter', 'grid'));
    }
}
