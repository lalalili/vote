<?php namespace app\Http\Controllers;

use App\Http\Requests;
use App\Models\Photo;
use App\Models\PostVote;
use App\Models\Vote;
use App\Models\Whitelist;
use App\PostSummary;
use App\Summary;
use Artisan;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Excel;
use Flash;
use Input;
use Redirect;
use Request;
use Validator;
use View;

class VoteController extends Controller
{
    public function pull(Request $request)
    {
        //dd($request::input('voteToID'));
        $voteToID = $request::input('voteToID');
        $Name = $request::input('name');
        $Phone = $request::input('phone');
        $Q1 = $request::input('q1');
        $Q2 = $request::input('q2');
        $Q3 = $request::input('q3');
        $Q4 = $request::input('q4');
        $request::flash();
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

        $validator = Validator::make($request::all(), [
            'phone' => 'required|digits_between:8,10',
        ]);

        if ($validator->fails()) {
            Flash::warning('電話號碼請依照範例範例格式，輸入不含符號的數字');
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
        $grid->add('{{ $photo->album->area}}', '經銷商', 'photo_id');
        $grid->add('album', '據點');
        $grid->add('{{ $photo->name }}', '員工姓名', 'photo_id');
        $grid->add('name', '客戶姓名');
        $grid->add('phone', '客戶電話');
        $grid->add('updated_at', '投票時間');

        $grid->edit('/admin/vote/edit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);


        return View::make('admin.vote', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

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
        $grid->add('{{ $photo->album->area}}', '經銷商', 'photo_id');
        $grid->add('album', '據點', 'album_id');
        $grid->add('{{ $photo->name }}', '員工姓名', 'photo_id');
        $grid->add('name', '客戶姓名');
        $grid->add('phone', '客戶電話');
        $grid->add('updated_at', '投票時間');

        $grid->edit('/admin/vote/edit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function downloadVote()
    {
        Excel::create('votes', function ($excel) {
            $excel->sheet('votes', function ($sheet) {
                $votes = DB::table('votes')
                    ->select('votes.id as 投票編號', 'albums.area as 經銷商', 'albums.name as 據點', 'photos.name as 員工姓名', 'votes.name as 客戶姓名',
                        'phone as 客戶電話',
                        'q1 as 問題1', 'q2 as 問題2', 'q3 as 問題3', 'votes.updated_at as 投票時間')
                    ->Join('photos', 'votes.photo_id', '=', 'photos.id')
                    ->join('albums', 'photos.album_id', '=', 'albums.id')
                    ->orderBy('votes.id', 'desc')
                    ->get();
                //dd($summaries);
                $data = array();
                foreach ($votes as $vote) {
                    $data[] = (array)$vote;
                }
                //dd($data);
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function downloadSummary()
    {
        Excel::create('summary', function ($excel) {
            $excel->sheet('summary', function ($sheet) {
                $summaries = DB::table('summaries')
                    ->select('area as 經銷商', 'album_name as 據點', 'photo_name as 姓名', 'count as 票數', 'rank as 店排名')
                    ->Join('albums', 'summaries.album_id', '=', 'albums.id')
//                    ->where('rank', '<', '4')
                    ->get();
                //dd($summaries);
                $data = array();
                foreach ($summaries as $summary) {
                    $data[] = (array)$summary;
                }
                //dd($data);
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function recal()
    {
        //準備資料並存到summary
        $counts = DB::table('votes')
            ->Join('photos', 'votes.photo_id', '=', 'photos.id')
            ->join('albums', 'photos.album_id', '=', 'albums.id')
            ->select(DB::raw('albums.id as album_id, albums.name as album_name, photos.id as photo_id, photos.name as photo_name,count(*) as count'))
            ->groupBy('photo_id')
            ->orderBy('count', 'desc')
            ->get();
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
              (SELECT @curRank :=0, @prevRank := NULL, @incRank := 1) r where album_id = ? ORDER BY count desc) s',
                [$i]);
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
        $r1s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r2s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r3s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '生活館')
            ->get();
        $r4s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r5s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r6s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r7s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r8s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r9s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r10s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        //dd($r1);
        return view('admin.summary', compact('r1s', 'r2s', 'r3s', 'r4s', 'r5s', 'r6s', 'r7s', 'r8s', 'r9s', 'r10s'));
    }

    public function count()
    {
        //產生報告
        $r1s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r2s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r3s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r4s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r5s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r6s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r7s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r8s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r9s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r10s = DB::table('summaries')
            ->Join('albums', 'summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        //dd($r1);
        return view('admin.summary', compact('r1s', 'r2s', 'r3s', 'r4s', 'r5s', 'r6s', 'r7s', 'r8s', 'r9s', 'r10s'));
    }

    public function resetVotes()
    {
        DB::table('votes')->truncate();
        return redirect('admin/vote/list');
    }

    public function resetPhotos()
    {
        DB::table('photos')->truncate();
        return redirect('admin/photo/list');
    }

    public function seed()
    {
        //echo '<br>產生測試員工資料...';
        Artisan::call('db:seed');
        //echo '<br>員工資料產生完成';
        return redirect('admin/photo/list');
    }


    public function anyPostlist()
    {
        $filter = DataFilter::source(PostVote::with('photo'));
        //dd($filter);
        //$filter->add('album.name', '據點', 'text');
        $filter->add('photo.name', '員工姓名', 'text');
        $filter->add('name', '客戶姓名', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('{{ $photo->album->area }}', '經銷商', 'photo_id');
        $grid->add('album', '據點');
        $grid->add('{{ $photo->name }}', '員工姓名', 'photo_id');
        $grid->add('name', '客戶姓名');
        $grid->add('phone', '客戶電話');
        $grid->add('created_at', '投票時間');

        $grid->edit('/admin/vote/postedit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        return View::make('admin.post_vote', compact('filter', 'grid'));
    }

    public function anyPostedit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new PostVote());
        //dd($edit);
        $edit->link("/admin/vote/postlist", "Back", "BL");
        $edit->label('投票細項');

        $edit->add('album', '據點', 'text');
        $edit->add('photo_id', '員工姓名', 'select')->options(Photo::lists("name", "id")->all());;
        $edit->add('name', '客戶姓名', 'text');
        $edit->add('phone', '客戶電話', 'text');
        $edit->add('q1', '問題一', 'checkbox');
        $edit->add('q2', '問題二', 'checkbox');
        $edit->add('q3', '問題三', 'checkbox');

        $grid = DataGrid::source(PostVote::with('photo'));
        $grid->add('{{ $photo->album->area }}', '經銷商', 'photo_id');
        $grid->add('album', '據點', 'album_id');
        $grid->add('{{ $photo->name }}', '員工姓名', 'photo_id');
        $grid->add('name', '客戶姓名');
        $grid->add('phone', '客戶電話');
        $grid->add('created_at', '投票時間');

        $grid->edit('/admin/vote/postedit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function postDownloadvote()
    {
        Excel::create('post_votes', function ($excel) {
            $excel->sheet('post_votes', function ($sheet) {
                $votes = DB::table('post_votes')
                    ->select('post_votes.id as 投票編號', 'albums.area as 經銷商', 'albums.name as 據點', 'photos.name as 員工姓名',
                        'post_votes.name as 客戶姓名',
                        'phone as 客戶電話',
                        'q1 as 問題1', 'q2 as 問題2', 'q3 as 問題3', 'post_votes.created_at as 投票時間')
                    ->Join('photos', 'post_votes.photo_id', '=', 'photos.id')
                    ->join('albums', 'photos.album_id', '=', 'albums.id')
                    ->orderBy('post_votes.id', 'desc')
                    ->get();
                //dd($summaries);
                $data = array();
                foreach ($votes as $vote) {
                    $data[] = (array)$vote;
                }
                //dd($data);
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function postDownloadSummary()
    {
        Excel::create('post_summary', function ($excel) {
            $excel->sheet('post_summary', function ($sheet) {
                $summaries = DB::table('post_summaries')
                    ->select('area as 區域', 'album_name as 據點', 'photo_name as 姓名', 'count as 票數', 'rank as 店排名')
                    ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
//                    ->where('rank', '<', '4')
                    ->get();
                //dd($summaries);
                $data = array();
                foreach ($summaries as $summary) {
                    $data[] = (array)$summary;
                }
                //dd($data);
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function syncVote()
    {
        DB::table('post_votes')->truncate();
        $phone = Whitelist::lists('phone');
        $votes = DB::table('votes')->whereRaw('updated_at = (select max(updated_at) from votes as f where f.phone = votes.phone)')
            ->whereNotIn('phone', $phone)
            ->where(DB::raw(' time(created_at) between "08:00:00" and "22:00:00"'))->get();
        //dd($votes);0
        foreach ($votes as $vote) {
            $postvote = new PostVote;
            $postvote->name = $vote->name;
            $postvote->phone = $vote->phone;
            $postvote->q1 = $vote->q1;
            $postvote->q2 = $vote->q2;
            $postvote->q3 = $vote->q3;
            $postvote->photo_id = $vote->photo_id;
            $postvote->note1 = $vote->note1;
            $postvote->note2 = $vote->note2;
            $postvote->created_at = $vote->updated_at;
            $postvote->save();
        }

        $whitelist_votes = DB::table('votes')
            ->whereIn('phone', $phone)
//            ->where(DB::raw(' time(created_at) between "08:00:00" and "22:00:00"'))
            ->get();

        foreach ($whitelist_votes as $whitelist_vote) {
            $postvote = new PostVote;
            $postvote->name = $whitelist_vote->name;
            $postvote->phone = $whitelist_vote->phone;
            $postvote->q1 = $whitelist_vote->q1;
            $postvote->q2 = $whitelist_vote->q2;
            $postvote->q3 = $whitelist_vote->q3;
            $postvote->photo_id = $whitelist_vote->photo_id;
            $postvote->note1 = $whitelist_vote->note1;
            $postvote->note2 = $whitelist_vote->note2;
            $postvote->created_at = $whitelist_vote->updated_at;
            $postvote->save();
        }
        return Redirect::back();
    }

    public function postCount()
    {
        //產生報告
        $r1s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r2s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r3s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r4s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r5s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r6s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r7s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r8s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r9s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r10s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        //dd($r1);
        return view('admin.post_summary',
            compact('r1s', 'r2s', 'r3s', 'r4s', 'r5s', 'r6s', 'r7s', 'r8s', 'r9s', 'r10s'));
    }

    public function postRecal()
    {
        //準備資料並存到summary
        $counts = DB::table('post_votes')
            ->Join('photos', 'post_votes.photo_id', '=', 'photos.id')
            ->join('albums', 'photos.album_id', '=', 'albums.id')
            ->select(DB::raw('albums.id as album_id, albums.name as album_name, photos.id as photo_id, photos.name as photo_name,count(*) as count'))
            ->groupBy('photo_id')
            ->orderBy('count', 'desc')
            ->get();
        //dd($counts);
        DB::table('post_summaries')->truncate();
        foreach ($counts as $count) {
            //dd($count);
            $summary = new PostSummary;
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
              (@prevRank = count, @curRank, @incRank) AS rank,    @incRank := @incRank + 1, @prevRank := count FROM post_summaries p,
              (SELECT @curRank :=0, @prevRank := NULL, @incRank := 1) r where album_id = ? ORDER BY count desc) s',
                [$i]);
            //dd($ranks);
            DB::table('post_summaries')->where('album_id', $i)->delete();
            foreach ($ranks as $rank) {
                //dd($count);
                $summary = new PostSummary;
                $summary->album_id = $rank->album_id;
                $summary->album_name = $rank->album_name;
                $summary->photo_id = $rank->photo_id;
                $summary->photo_name = $rank->photo_name;
                $summary->count = $rank->count;
                $summary->rank = $rank->rank;
                $summary->save();
            }
        }
        $r1s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r2s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r3s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '生活館')
            ->get();
        $r4s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r5s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '生活館')
            ->where('rank', '<', '4')
            ->get();
        $r6s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '北智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r7s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '桃智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r8s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '中智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r9s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '南智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        $r10s = DB::table('post_summaries')
            ->Join('albums', 'post_summaries.album_id', '=', 'albums.id')
            ->where('albums.area', '高智捷')
            ->where('albums.type', '服務廠')
            ->where('rank', '<', '4')
            ->get();
        //dd($r1);
        return view('admin.post_summary',
            compact('r1s', 'r2s', 'r3s', 'r4s', 'r5s', 'r6s', 'r7s', 'r8s', 'r9s', 'r10s'));
    }

    public function anyWhitelist()
    {
        $phone = Whitelist::lists('phone');
        $filter = DataFilter::source(Vote::with('photo')->whereIn('phone', $phone));
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
        $grid->add('updated_at', '投票時間');

        $grid->edit('/admin/vote/whiteedit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);


        return View::make('admin.whitelist', compact('filter', 'grid'));
    }

    public function anyWhiteedit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Vote());
        //dd($edit);
        $edit->link("/admin/vote/whitelist", "Back", "BL");
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
        $grid->add('updated_at', '投票時間');

        $grid->edit('/admin/vote/whiteedit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function downloadWhitelistVote()
    {
        Excel::create('whitelist_votes', function ($excel) {
            $excel->sheet('whitelist_votes', function ($sheet) {
                $phone = Whitelist::lists('phone');
                $votes = DB::table('votes')
                    ->select('votes.id as 投票編號', 'albums.area as 經銷商', 'albums.name as 據點', 'photos.name as 員工姓名', 'votes.name as 客戶姓名',
                        'phone as 客戶電話',
                        'q1 as 問題1', 'q2 as 問題2', 'q3 as 問題3', 'votes.updated_at as 投票時間')
                    ->Join('photos', 'votes.photo_id', '=', 'photos.id')
                    ->join('albums', 'photos.album_id', '=', 'albums.id')
                    ->whereIn('phone', $phone)
                    ->orderBy('votes.id', 'desc')
                    ->get();

                //dd($votes);
                $data = array();
                foreach ($votes as $vote) {
                    $data[] = (array)$vote;
                }
                //dd($data);
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }
}
