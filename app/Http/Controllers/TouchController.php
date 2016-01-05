<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Poll;
use App\Models\Score;
use App\Models\Touch;
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

class TouchController extends Controller
{
    public function show()
    {
        $lists = Touch::all();
        //dd($lists);
        return view('touching.show', compact('lists'));
    }

    public function batch()
    {
        $files = Input::file('upload');
        $file_count = count($files);
        $uploadcount = 0;
        //dd($files);
        $saves = glob('uploads/touch/*'); // get all file names
        foreach ($saves as $save) { // iterate files
            if (is_file($save)) {
                unlink($save);
            } // delete file
        }
        Touch::truncate();
        foreach ($files as $file) {
            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file' => $file), $rules);
            if ($validator->passes()) {
                $destinationPath = 'uploads/touch';
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount++;

                $touch = new Touch;
                $touch->name = $filename;
                $touch->filename = $filename;
                $touch->save();
            }
        }
        if ($uploadcount == $file_count) {
            return Redirect::to('/touching/show');
        } else {
            Flash::overlay('上傳失敗', '警告');
            return Redirect::to('/admin/adv');
        }
    }

    public function topic()
    {
        $file = Input::file('upload');
        //dd($files);
        $save = 'uploads/touch/topic.png'; // get all file names
        if (is_file($save)) {
            unlink($save);
        } // delete file

        $rules = array('file' => 'required|mimes:png'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        $validator = Validator::make(array('file' => $file), $rules);
        if ($validator->passes()) {
            $destinationPath = 'uploads/touch';
            $filename = 'topic.png';
            $upload_success = $file->move($destinationPath, $filename);
            return Redirect::to('/touching/show#2nd');
        } else {
            Flash::overlay('上傳失敗', '警告');
            return Redirect::to('/admin/adv');
        }
    }

    public function poll(Request $request)
    {
        //dd($request::input('r1'));
        $name = $request::input('name');
        $r1 = $request::input('r1');
        $r2 = $request::input('r2');
        $r3 = $request::input('r3');
        $r4 = $request::input('r4');
        $r5 = $request::input('r5');
//        $request::flash();
//        if ($Name == "") {
//            Flash::warning('請輸入姓名');
//            return Redirect::back()->withInput();
//        }

        $validator = Validator::make($request::all(), [
            'name' => 'required',
            'r1'   => 'required',
            'r2'   => 'required',
            'r3'   => 'required',
            'r4'   => 'required',
            'r5'   => 'required',
        ]);

        if ($validator->fails()) {
            Flash::warning('請輸入完整 * 必填資訊');
            return Redirect::to('/touching/show#poll')->withInput();
        }
        $poll = new Poll;
        $poll->name = $name;
        $poll->r1 = $r1;
        $poll->r2 = $r2;
        $poll->r3 = $r3;
        $poll->r4 = $r4;
        $poll->r5 = $r5;

        if ($poll->save()) {
            return redirect('/touching/thanks');
        } else {
            Flash::warning('系統異常，請再重新送出一次');
            return Redirect('/touching/show#poll');
        }
    }

    public function lists()
    {
        $filter = DataFilter::source(new Poll());
        $filter->add('name', '姓名', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('id', '序號', true);
        $grid->add('name', '姓名', true);
        $grid->add('r1', '第一名', true);
        $grid->add('r2', '第二名', true);
        $grid->add('r3', '第三名', true);
        $grid->add('r4', '第四名', true);
        $grid->add('r5', '第五名', true);
        $grid->add('updated_at', '投票時間', true);

        $grid->edit('/admin/touching/poll/edit', '功能', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        Score::truncate();
        $r1s = DB::table('polls')->select(DB::raw('count(*) as count, r1'))->groupBy('r1')->get();
        //dd($r1s);
        foreach ($r1s as $r1) {
            $score = new Score;
            $score->name = $r1->r1;
            $score->count = $r1->count;
            $score->total = ($r1->count) * 5;
            $score->save();
        }

        $r2s = DB::table('polls')->select(DB::raw('count(*) as count, r2'))->groupBy('r2')->get();
        foreach ($r2s as $r2) {
            $score = new Score;
            $score->name = $r2->r2;
            $score->count = $r2->count;
            $score->total = ($r2->count) * 4;
            $score->save();
        }

        $r3s = DB::table('polls')->select(DB::raw('count(*) as count, r3'))->groupBy('r3')->get();
        foreach ($r3s as $r3) {
            $score = new Score;
            $score->name = $r3->r3;
            $score->count = $r3->count;
            $score->total = ($r3->count) * 3;
            $score->save();
        }

        $r4s = DB::table('polls')->select(DB::raw('count(*) as count, r4'))->groupBy('r4')->get();
        foreach ($r4s as $r4) {
            $score = new Score;
            $score->name = $r4->r4;
            $score->count = $r4->count;
            $score->total = ($r4->count) * 2;
            $score->save();
        }

        $r5s = DB::table('polls')->select(DB::raw('count(*) as count, r5'))->groupBy('r5')->get();
        foreach ($r5s as $r5) {
            $score = new Score;
            $score->name = $r5->r5;
            $score->count = $r5->count;
            $score->total = ($r5->count) * 1;
            $score->save();
        }

        //dd(Score::all());
        $scores = DB::table('scores')->select(DB::raw('name, sum(count) as count, sum(total) as total'))->groupBy('name')->orderBy('total',
            'count', 'asc')->get();
        //dd($scores);
        return View::make('touching.list', compact('filter', 'grid', 'scores'));
    }

    public function edit()
    {
        $edit = DataEdit::source(new Poll());
        //dd($edit);
        $edit->link("/admin/touching/poll/list", "Back", "BL");
        $edit->label('投票細項');

        $edit->add('name', '姓名', 'text');
        $edit->add('r1', '第一名', 'text');
        $edit->add('r2', '第二名', 'text');
        $edit->add('r3', '第三名', 'text');
        $edit->add('r4', '第四名', 'text');
        $edit->add('r5', '第五名', 'text');

        $grid = DataGrid::source(new Poll());
        $grid->add('name', '姓名', true);
        $grid->add('r1', '第一名', true);
        $grid->add('r2', '第二名', true);
        $grid->add('r3', '第三名', true);
        $grid->add('r4', '第四名', true);
        $grid->add('r5', '第五名', true);
        $grid->add('updated_at', '投票時間', true);

        $grid->edit('/admin/touching/poll/edit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function reset()
    {
        Poll::truncate();
        return Redirect::to('/admin/touching/poll/list');
    }
}
