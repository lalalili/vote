<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Summary;
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

    public function seed(){
        //準備資料並存到summary
        $counts = DB::table('votes')
            ->Join('photos', 'votes.photo_id', '=', 'photos.id')
            ->join('albums', 'photos.album_id', '=', 'albums.id')
            ->select(DB::raw('albums.id as album_id, albums.name as album_name, photos.id as photo_id, photos.name as photo_name,count(*) as count'))->groupBy('photo_id')->orderBy('count', 'desc')->get();
        DB::table('summaries')->truncate();
        foreach ($counts as $count) {
            //dd($count);
            $summary = new Summary;
            $summary->album_id = $count->album_id;
            $summary->album_name = $count->album_name;
            $summary->photo_id = $count->photo_id;
            $summary->photo_name = $count->photo_name;
            $summary->count = $count->count;
            $summary->save();
        }

        //計算排名
        $album_count = DB::table('albums')->count();
        for ($i = 1; $i <= $album_count; $i++) {
            $ranks = DB::select('SELECT id, album_id, album_name, photo_id, photo_name, count, rank FROM (
              SELECT id, album_id, album_name, photo_id, photo_name, count, @curRank := IF
              (@prevRank = count, @curRank, @incRank) AS rank,    @incRank := @incRank + 1, @prevRank := count FROM summaries p,
              (SELECT @curRank :=0, @prevRank := NULL, @incRank := 1) r where album_id = ? ORDER BY count desc) s', [$i]);
            //dd($ranks);
            DB::table('summaries')->where('album_id', $i)->delete();
            foreach ($ranks as $rank) {
                //dd($count);
                $summary = new Summary;
                $summary->album_id = $rank->album_id;
                $summary->album_name = $rank->album_name;
                $summary->photo_id = $rank->photo_id;
                $summary->photo_name = $rank->photo_name;
                $summary->count = $rank->count;
                $summary->rank = $rank->rank;
                $summary->save();
            }
        }
    }

    public function count()
    {
        //產生報告
        $r1s = DB::table('summaries')
        ->Join('albums', 'summaries.album_id', '=', 'albums.id')
        ->where('albums.area','北智捷')
        ->where('albums.type','生活館')
        ->get();
        $r2s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area','桃智捷')
            ->where('albums.type','生活館')
            ->get();
        $r3s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area','中智捷')
            ->where('albums.type','生活館')
            ->get();
        $r4s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area','南智捷')
            ->where('albums.type','生活館')
            ->get();
        $r5s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area','高智捷')
            ->where('albums.type','生活館')
            ->get();
        //dd($r1);
        return view('admin.summary', compact('r1s','r2s','r3s','r4s','r5s'));


    }
}
