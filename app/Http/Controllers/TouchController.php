<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Poll;
use App\Models\Score;
use App\Models\Touch;
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

class TouchController extends Controller
{
    public function show()
    {
        $lists = Touch::all();
        //dd($lists);
        return view('touching.show', compact('lists'));
    }

    public function yearly()
    {
        $lists = Touch::all();
        //dd($lists);
        return view('touching.yearly', compact('lists'));
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
        $dep = $request::input('dep');
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
            'dep'  => 'required',
        ]);

        if ($validator->fails()) {
            Flash::warning('請輸入完整 * 必填資訊');
            return Redirect::to('/touching2/#poll')->withInput();
        }
        $poll = new Poll;
        $poll->name = $name;
        $poll->r1 = $r1;
        $poll->r2 = $r2;
        $poll->r3 = $r3;
        $poll->r4 = $r4;
        $poll->r5 = $r5;
        $poll->note1 = $dep;

        if ($poll->save()) {
            return redirect('/touching/thanks');
        } else {
            Flash::warning('系統異常，請再重新送出一次');
            return Redirect('/touching2/#poll');
        }
    }

    public function pollYear(Request $request)
    {
        //dd($request::input('r1'));
        $name = $request::input('name');
        $r1 = $request::input('r1');
        $r2 = $request::input('r2');
        $r3 = $request::input('r3');
        $r4 = $request::input('r4');
        $r5 = $request::input('r5');
        $dep = $request::input('dep');

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
            'dep'  => 'required',
        ]);

        if ($validator->fails()) {
            Flash::warning('請輸入完整 * 必填資訊');
            return Redirect::to('/touching/yearly#poll')->withInput();
        }
        $poll = new Poll;
        $poll->name = $name;
        $poll->r1 = $r1;
        $poll->r2 = $r2;
        $poll->r3 = $r3;
        $poll->r4 = $r4;
        $poll->r5 = $r5;
        $poll->note1 = $dep;


        if ($poll->save()) {
            return redirect('/touching/thanks');
        } else {
            Flash::warning('系統異常，請再重新送出一次');
            return Redirect('/touching/yearly#poll');
        }
    }

    public function lists()
    {
        $filter = DataFilter::source(new Poll());
        $filter->add('id', '序號', 'text');
        $filter->add('name', '姓名', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('id', '序號', true);
        $grid->add('note1', '部門', true);
        $grid->add('name', '姓名', true);
        $grid->add('r1', '北智捷', true);
        $grid->add('r2', '桃智捷', true);
        $grid->add('r3', '中智捷', true);
        $grid->add('r4', '南智捷', true);
        $grid->add('r5', '高智捷', true);
        $grid->add('updated_at', '投票時間', true);

        $grid->edit('/admin/touching/poll/edit', '功能', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(50);

        Score::truncate();
        $r1s = DB::table('polls')->select(DB::raw('count(*) as count, r1 as rank'))->groupBy('r1')->get();
        //dd($r1s);
        foreach ($r1s as $r1) {
            $score = new Score;
            $score->name = '北智捷';
            $score->count = 0;

            switch ($r1->rank) {
                case '第一名':
                    $score->total += ($r1->count) * 5;
                    break;
                case '第二名':
                    $score->total += ($r1->count) * 4;
                    break;
                case '第三名':
                    $score->total += ($r1->count) * 3;
                    break;
                case '第四名':
                    $score->total += ($r1->count) * 2;
                    break;
                case '第五名':
                    $score->total += ($r1->count) * 1;
                    break;
            }

            $score->save();
        }

        $r2s = DB::table('polls')->select(DB::raw('count(*) as count, r2 as rank'))->groupBy('r2')->get();
        //dd($r2s);
        foreach ($r2s as $r2) {
            $score = new Score;
            $score->name = '桃智捷';
            $score->count = 0;

            switch ($r2->rank) {
                case '第一名':
                    $score->total += ($r2->count) * 5;
                    break;
                case '第二名':
                    $score->total += ($r2->count) * 4;
                    break;
                case '第三名':
                    $score->total += ($r2->count) * 3;
                    break;
                case '第四名':
                    $score->total += ($r2->count) * 2;
                    break;
                case '第五名':
                    $score->total += ($r2->count) * 1;
                    break;
            }

            $score->save();
        }

        $r3s = DB::table('polls')->select(DB::raw('count(*) as count, r3 as rank'))->groupBy('r3')->get();
        //dd($r1s);
        foreach ($r3s as $r3) {
            $score = new Score;
            $score->name = '中智捷';
            $score->count = 0;

            switch ($r3->rank) {
                case '第一名':
                    $score->total += ($r3->count) * 5;
                    break;
                case '第二名':
                    $score->total += ($r3->count) * 4;
                    break;
                case '第三名':
                    $score->total += ($r3->count) * 3;
                    break;
                case '第四名':
                    $score->total += ($r3->count) * 2;
                    break;
                case '第五名':
                    $score->total += ($r3->count) * 1;
                    break;
            }

            $score->save();
        }

        $r4s = DB::table('polls')->select(DB::raw('count(*) as count, r4 as rank'))->groupBy('r4')->get();
        //dd($r1s);
        foreach ($r4s as $r4) {
            $score = new Score;
            $score->name = '南智捷';
            $score->count = 0;

            switch ($r4->rank) {
                case '第一名':
                    $score->total += ($r4->count) * 5;
                    break;
                case '第二名':
                    $score->total += ($r4->count) * 4;
                    break;
                case '第三名':
                    $score->total += ($r4->count) * 3;
                    break;
                case '第四名':
                    $score->total += ($r4->count) * 2;
                    break;
                case '第五名':
                    $score->total += ($r4->count) * 1;
                    break;
            }

            $score->save();
        }

        $r5s = DB::table('polls')->select(DB::raw('count(*) as count, r5 as rank'))->groupBy('r5')->get();
        //dd($r1s);
        foreach ($r5s as $r5) {
            $score = new Score;
            $score->name = '高智捷';
            $score->count = 0;

            switch ($r5->rank) {
                case '第一名':
                    $score->total += ($r5->count) * 5;
                    break;
                case '第二名':
                    $score->total += ($r5->count) * 4;
                    break;
                case '第三名':
                    $score->total += ($r5->count) * 3;
                    break;
                case '第四名':
                    $score->total += ($r5->count) * 2;
                    break;
                case '第五名':
                    $score->total += ($r5->count) * 1;
                    break;
            }

            $score->save();
        }


        //dd(Score::all());
        $scores = DB::table('scores')->select(DB::raw('name, sum(count) as count, sum(total) as total'))->groupBy('name')->orderBy('total',
            'count', 'asc')->get();
        return View::make('touching.list', compact('filter', 'grid', 'scores'));
    }

    public function edit()
    {
        $edit = DataEdit::source(new Poll());
        //dd($edit);
        $edit->link("/admin/touching/poll/list", "Back", "BL");
        $edit->label('投票細項');
        $edit->add('note1', '部門', 'text');
        $edit->add('name', '姓名', 'text');
        $edit->add('r1', '北智捷', 'text');
        $edit->add('r2', '桃智捷', 'text');
        $edit->add('r3', '中智捷', 'text');
        $edit->add('r4', '南智捷', 'text');
        $edit->add('r5', '高智捷', 'text');

        $grid = DataGrid::source(new Poll());
        $grid->add('id', '序號', true);
        $grid->add('note1', '部門', true);
        $grid->add('name', '姓名', true);
        $grid->add('r1', '北智捷', true);
        $grid->add('r2', '桃智捷', true);
        $grid->add('r3', '中智捷', true);
        $grid->add('r4', '南智捷', true);
        $grid->add('r5', '高智捷', true);
        $grid->add('updated_at', '投票時間', true);

        $grid->edit('/admin/touching/poll/edit', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(50);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function reset()
    {
        Poll::truncate();
        return Redirect::to('/admin/touching/poll/list');
    }

    public function draw()
    {
        $count = Poll::count();
        return view('touching/draw', compact('count'));
    }

    public function name($id)
    {
        $name = Poll::where('id', $id)->pluck('name');
        //return response()->json(['response' => $name]);
        print_r($name);
        die;
    }

    public function download()
    {
        Excel::create('touching', function ($excel) {
            $excel->sheet('touching', function ($sheet) {
                $touchings = DB::table('polls')
                    ->select('id as sno', 'note1 as 部門', 'name as 姓名', 'r1 as 第一名', 'r2 as 第二名', 'r3 as 第三名',
                        'r4 as 第四名', 'r5 as 第五名')
                    ->get();
                $data = array();
                foreach ($touchings as $touching) {
                    $data[] = (array)$touching;
                }
                //dd($data);
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }
}
