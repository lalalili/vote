<?php namespace app\Http\Controllers;

use App\Http\Requests;
use App\Models\Event;
use App\Models\Course;
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

class EventController extends Controller
{
    public function anyList()
    {
        $filter = DataFilter::source(Event::with('course'));
        //dd($filter);
        $filter->add('name', '課程日期/場次', 'text');
//        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '課程日期/場次');
        $grid->add('{{ $course->name }}', '課程項目');
        $grid->add('number', '預估上課人數');
        $grid->add('area', '職級別', true);
        $grid->add('event_at', '上課時間', true);
        $grid->add('hour', '課程時數');
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/event/edit', '功能', 'show|modify|delete');

        $grid->link('/admin/event/edit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        $edit = DataEdit::source(new Event());
        //dd($edit);
        $edit->link("/admin/event/list", "上一頁", "BL");
        $edit->link("/admin/event/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '課程日期/場次', 'text')->rule('required');
        $edit->add('course_id', '課別', 'select')->options(Course::lists("name", "id")->all());
        $edit->add('number', '預估上課人數', 'text');
        $edit->add('area', '職級別', 'text');
        $edit->add('event_at', '上課時間', 'datetime')->format('d/m/Y', 'zh-TW');
        $edit->add('hour', '課程時數', 'text');

        $grid = DataGrid::source(Event::with('course'));
        $grid->add('name', '課程日期/場次');
        $grid->add('{{ $course->name }}', '課程項目');
        $grid->add('number', '預估上課人數');
        $grid->add('area', '職級別', true);
        $grid->add('event_at', '上課時間', true);
        $grid->add('hour', '課程時數');
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/event/edit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function anyUpload()
    {
        return view('admin/adv');
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
            if ($upload_name == 'event.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'event.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::selectSheets('event')->load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                Event::truncate();
                foreach ($uploads as $upload) {
                    Event::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/event/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }

    public function getDownload()
    {
        Excel::create('event', function ($excel) {
            $excel->sheet('event', function ($sheet) {
                $title = Event::all();
                //dd($data);
                $sheet->fromArray($title);
            });
        })->export('xlsx');
    }
}
