<?php

namespace App\Http\Controllers;

use App\Course;
use App\Event;
use App\Http\Requests\CreateSignupRequest;
use App\Models\Photo;
use App\Project;
use App\Signup;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Session;
use View;

class SignupController extends Controller
{

    public function anyProjectlist()
    {
        $filter = DataFilter::source(new Project());
        //dd($filter);
        $filter->add('name', '課程項目', 'text');
        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '課程項目');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/projectedit', '功能', 'show|modify|delete');

        $grid->link('/admin/signup/projectedit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyProjectedit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Project());
        //dd($edit);
        $edit->link("/admin/signup/projectlist", "上一頁", "BL");
        $edit->link("/admin/signup/projectedit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '課程項目', 'text')->rule('required|min:4');
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(new Project());
        $grid->add('name', '課程項目');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/projectedit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function anyCourselist()
    {
        $filter = DataFilter::source(Course::with('project'));
        //dd($filter);
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

        $grid->edit('/admin/signup/courseedit', '功能', 'show|modify|delete');
        $grid->link('/admin/signup/courseedit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyCourseedit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Course());
        //dd($edit);
        $edit->link("/admin/signup/courselist", "上一頁", "BL");
        $edit->link("/admin/signup/courseedit", "新增", "TR");
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

        $grid->edit('/admin/signup/courseedit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function anyEventlist()
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
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/eventedit', '功能', 'show|modify|delete');

        $grid->link('/admin/signup/eventedit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEventedit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Event());
        //dd($edit);
        $edit->link("/admin/signup/eventlist", "上一頁", "BL");
        $edit->link("/admin/signup/eventedit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '課程日期/場次', 'text')->rule('required');
        $edit->add('course_id', '課別', 'select')->options(Course::lists("name", "id")->all());
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(new Event());
        $grid->add('name', '課程日期/場次');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/eventedit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function anyList()
    {
        $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'photo'));
        //dd($filter);
        $filter->add('photo.name', '員工', 'text');
        $filter->add('course.name', '課別', 'text');
        $filter->add('event.name', '場次', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('photo.name', '姓名', true);
        $grid->add('project.name', '課程項目', true);
        $grid->add('course.name', '課別', true);
        $grid->add('event.name', '場次', true);

        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/edit', '功能', 'show|modify|delete');

        $grid->link('/admin/signup/edit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }
        //dd(Signup::find(1));
        $edit = DataEdit::source(new Signup());
        //dd($edit);
        $edit->link("/admin/signup/list", "上一頁", "BL");
        $edit->link("/admin/signup/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('photo_id', '姓名', 'select')->options(Photo::lists("name", "id")->all());
        $edit->add('project_id', '課程項目', 'select')->options(Project::lists("name", "id")->all());
        $edit->add('course_id', '課別', 'select')->options(Course::lists("name", "id")->all());
        $edit->add('event_id', '場次', 'select')->options(Event::lists("name", "id")->all());
        $edit->add('identity', '身分證號', 'text');
        $edit->add('birth_year', '出生年', 'text');
        $edit->add('mobile', '手機號碼', 'text');
        $edit->add('emp_id', '工號', 'text');
        $edit->add('group', '菁英班梯次', 'text');
        $edit->add('gender', '性別', 'text');
        $edit->add('type', '人員別', 'text');
        $edit->add('level', '階層別', 'text');
        $edit->add('background', '最高學歷', 'text');
        $edit->add('food', '飲食習慣', 'text');
        $edit->add('note', '備註', 'text');
        //dd($edit);

        $grid = DataGrid::source(Signup::with('project', 'course', 'event', 'photo'));
        //dd($grid);
        $grid->add('photo.name', '姓名', true);
        $grid->add('project.name', '課程項目', true);
        $grid->add('course.name', '課別', true);
        $grid->add('event.name', '場次', true);

        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/edit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function anyStep1()
    {
        $lists = DB::table('photos')
            ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
            ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
            ->select('photos.id as id', 'photos.name as name', 'titles.name as title',
                'albums.name as album')
            ->orderBy('photos.id', 'asc')->get();
        //dd($lists);
        return view('admin.step1', compact('lists'));
    }

    public function step2(Request $request, $id)
    {
        //dd($id);
        if ($id == "project") {
            $id = $request->session()->get('id');
            Session::forget('project_id');
            return redirect("/admin/signup/step2/$id");
        } elseif ($id == "course") {
            $project_id = $request->session()->get('project_id');
            Session::forget('course_id');
            return redirect("/admin/signup/step2/project/$project_id");
        } elseif ($id == "event") {
            $course_id = $request->session()->get('course_id');
            Session::forget('event_id');
            return redirect("/admin/signup/step2/course/$course_id");
        } else {
            $employee = Photo::findOrFail($id);
            //dd($employee);
            $projects = Project::all();
            //dd($projects);
            Session::forget(['project_id', 'course_id', 'event_id']);
            Session::put('id', $id);

            return view('admin.step2', compact('employee', 'projects'));
        }
    }

    public function step2Project(Request $request, $project_id)
    {

        $id = $request->session()->get('id');
        //dd($id);
        $employee = Photo::findOrFail($id);
        //dd($project_id);
        $projects = Project::where('id', $project_id)->get();
        $courses = Course::where('project_id', $project_id)->get();
        //dd($courses);
        Session::put('project_id', $project_id);
        return view('admin.step2', compact('employee', 'projects', 'courses'));
    }

    public function step2Course(Request $request, $course_id)
    {

        $id = $request->session()->get('id');
        //dd($course_id);
        $employee = Photo::findOrFail($id);
        //dd($employee);
        //$project_id = $request->session()->get('project_id');
        $projects = Project::all();
        //dd($projects);
        $courses = Course::all();
        $events = Event::where('course_id', $course_id)->get();
        //dd($events);
        Session::put('course_id', $course_id);
        return view('admin.step2', compact('employee', 'projects', 'courses', 'events'));
    }

    public function step2Event(Request $request, $event_id)
    {

        $id = $request->session()->get('id');

        //dd($course_id);
        $employee = Photo::findOrFail($id);
        //dd($employee);
        //$project_id = $request->session()->get('project_id');
        $projects = Project::all();
        //dd($projects);
        $courses = Course::all();
        $course_id = $request->session()->get('course_id');
        $events = Event::where('course_id', $course_id)->get();
        //dd($events);
        if ($event_id == 0) {
            //dd($projects);
            Session::forget('event_id');
            return view('admin.step2', compact('employee', 'projects', 'courses', 'events'));
        } else {
            Session::put('event_id', $event_id);
            return view('admin.step2', compact('employee', 'projects', 'courses', 'events'));
        }
    }

    public function step3(CreateSignupRequest $request)
    {

        //dd($request->group);
        $signup = new Signup;
        $signup->photo_id = $request->photo_id;
        $signup->identity = $request->identity;
        $signup->gender = $request->gender;
        $signup->birth_year = $request->birth_year;
        $signup->type = $request->type;
        $signup->level = $request->level;
        $signup->background = $request->background;
        $signup->mobile = $request->mobile;
        $signup->food = $request->food;
        $signup->emp_id = $request->emp_id;
        $signup->group = $request->group;
        $signup->project_id = $request->project_id;
        $signup->course_id = $request->course_id;
        $signup->event_id = $request->event_id;
        $signup->save();

        return redirect('/admin/signup/list');
    }
}
