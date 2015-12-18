<?php namespace app\Http\Controllers;

use App\Http\Requests;
use App\Models\Course;
use App\Models\Project;
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

class CourseController extends Controller
{
    public function anyList()
    {
        $filter = DataFilter::source(Course::with('project'));
        //dd(Course::with('project')->get());
        $filter->add('name', '課別', 'text');
//        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '課程項目');
        $grid->add('{{ $project->name }}', '課別', 'project_id');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/course/edit', '功能', 'show|modify|delete');
        $grid->link('/admin/course/edit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        $edit = DataEdit::source(new Course());
        //dd($edit);
        $edit->link("/admin/course/list", "上一頁", "BL");
        $edit->link("/admin/course/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '課別', 'text')->rule('required');
        $edit->add('project_id', '課別', 'select')->options(Project::lists("name", "id")->all());
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(Course::with('project'));
        $grid->add('name', '課程項目');
        $grid->add('{{ $project->name }}', '課別', 'project_id');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/course/edit', '功能', 'show|modify|delete');

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
            if ($upload_name == 'course.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'course.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::selectSheets('course')->load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                Course::truncate();
                foreach ($uploads as $upload) {
                    Course::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/course/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }

    public function getDownload()
    {
        Excel::create('course', function ($excel) {
            $excel->sheet('course', function ($sheet) {
                $title = Course::all();
                //dd($data);
                $sheet->fromArray($title);
            });
        })->export('xlsx');
    }
}
