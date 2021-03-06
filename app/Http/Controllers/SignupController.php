<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateSignupRequest;
use App\Models\Course;
use App\Models\Event;
use App\Models\NewEmployee;
use App\Models\Project;
use App\Models\Signup;
use Auth;
use Carbon\Carbon;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Excel;
use Flash;
use Luxgen\Repository\SignupRepository;
use Redirect;
use Request;
use Session;
use Validator;
use View;

class SignupController extends Controller
{

    protected $signupRepository;

    public function __construct(SignupRepository $signupRepository)
    {
        $this->signupRepository = $signupRepository;
    }

    public function lists()
    {
        //dd(Signup::with('project', 'course', 'event', 'photo')->where('note', 'LA'));
        $filterEvents = Event::where('event_at', '>', Carbon::now('Asia/Taipei')->addDay(3))->get()->pluck('id')->all();
        //$filterEvents = Event::get()->pluck('id')->all();
        //dd($filterEvents);

        if (Auth::user()->hasRole('la-owner')) {
            $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'employee')->where('note',
                'LA')->whereIn('event_id', $filterEvents));
        } elseif (Auth::user()->hasRole('lb-owner')) {
            $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'employee')->where('note',
                'LB')->whereIn('event_id', $filterEvents));
        } elseif (Auth::user()->hasRole('lc-owner')) {
            $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'employee')->where('note',
                'LC')->whereIn('event_id', $filterEvents));
        } elseif (Auth::user()->hasRole('ld-owner')) {
            $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'employee')->where('note',
                'LD')->whereIn('event_id', $filterEvents));
        } elseif (Auth::user()->hasRole('le-owner')) {
            $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'employee')->where('note',
                'LE')->whereIn('event_id', $filterEvents));
        } elseif (Auth::user()->hasRole('luxgen-owner')) {
            $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'employee')->where('note',
                'luxgen')->whereIn('event_id', $filterEvents));
        } else {
            $filter = DataFilter::source(Signup::with('project', 'course', 'event', 'employee'));
        }

        //dd($filter);
        $filter->add('employee.name', '員工', 'text');
        $filter->add('course.name', '課別', 'text');
        $filter->add('event.name', '場次', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('employee.name', '姓名', 'identity');
        $grid->add('project.name', '課程項目', 'project_id');
        $grid->add('course.name', '課別', 'course_id');
        $grid->add('event.name', '場次', 'event_id');
        $grid->add('note', '報名者', true);
        $grid->add('updated_at', '報名日期', true);

        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        //$grid->edit('/admin/signup/edit', '功能', 'show|modify|delete');
        $grid->edit('/admin/signup/edit', '功能', 'modify|show|delete');

        $grid->link('/admin/signup/downloadAll', "下載報名列表", "TR");
        return View::make('admin.signup', compact('filter', 'grid'));
    }

    public function edit()
    {
        $edit = DataEdit::source(new Signup());
        //dd($edit);
        $edit->link("/admin/signup/list", "上一頁", "BL");
        $edit->link("/admin/signup/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('identity', '姓名', 'select')->options(NewEmployee::all()->pluck("name", "identity")->all());
        $edit->add('project_id', '課程項目', 'select')->options(Project::all()->pluck("name", "id")->all());
        $edit->add('course_id', '課別', 'select')->options(Course::all()->pluck("name", "id")->all());
        $edit->add('event_id', '場次', 'select')->options(Event::all()->pluck("name", "id")->all());

        return $edit->view('admin.detail', compact('edit'));
    }

    public function step2(Request $request, $id)
    {
        if ($id == "project") {
            $id = Session::get('id');
            Session::forget('project_id');
            return redirect("/admin/signup/step2/$id");
        } elseif ($id == "course") {
            $project_id = Session::get('project_id');
            Session::forget('course_id');
            return redirect("/admin/signup/step2/project/$project_id");
        } elseif ($id == "event") {
            $course_id = Session::get('course_id');
            Session::forget('event_id');
            return redirect("/admin/signup/step2/course/$course_id");
        } else {
            $employee = NewEmployee::findOrFail($id);
            $projects = Project::all();
            Session::forget(['project_id', 'course_id', 'event_id']);
            Session::put('id', $id);

            //dd($employee);
            //dd($projects);
            return view('admin.step2', compact('employee', 'projects'));
        }
    }

    public function step2Project(Request $request, $project_id)
    {
        $id = Session::get('id');
        //dd($id);
        $employee = NewEmployee::findOrFail($id);
        //dd($project_id);
        $projects = Project::where('id', $project_id)->get();
        $type = NewEmployee::findOrFail(Session::get('id'))->type;
        //dd($type);
        if ($type == '生活館') {
            $courses = Course::where('project_id', $project_id)->where('type', '<>', '服務廠')->get();
        } elseif ($type == '服務廠') {
            $courses = Course::where('project_id', $project_id)->where('type', '<>', '生活館')->get();
        } else {
            $courses = Course::where('project_id', $project_id)->get();
        }

        //dd($courses);
        Session::put('project_id', $project_id);
        return view('admin.step2', compact('employee', 'projects', 'courses'));
    }

    public function step2Course(Request $request, $course_id)
    {
        $id = Session::get('id');
        $employee = NewEmployee::findOrFail($id);
//        $project_id = Session::get('project_id');
//        $projects = Project::where('id', $project_id)->get();
        $projects = Project::all();
        //$courses = Course::where('id', $course_id)->get();
        $courses = Course::all();
        //dd(Carbon::now('Asia/Taipei')->subDay(1));
        //dd(Photo::findOrFail(Session::get('id'))->album->type);
        if (Auth::user()->hasRole('admin')) {
//            $events = Event::where('course_id', $course_id)->where('event_at', '>',
//                Carbon::now('Asia/Taipei'))->get();
            $events = Event::where('course_id', $course_id)->get();
        } else {
            $events = Event::where('course_id', $course_id)->where('event_at', '>',
                Carbon::now('Asia/Taipei')->addDay(6))->get();
        }
        //dd($events);
        Session::put('course_id', $course_id);
        return view('admin.step2', compact('employee', 'projects', 'courses', 'events'));
    }

    public function step2Event(Request $request, $event_id)
    {
        $id = Session::get('id');

        //dd($course_id);
        $employee = NewEmployee::findOrFail($id);
        //dd($employee);
        //$project_id = Session::get('project_id');
//        $project_id = Session::get('project_id');
//        $projects = Project::where('id', $project_id)->get();
        $course_id = Session::get('course_id');
//        $courses = Course::where('id', $course_id)->get();
        $projects = Project::all();
        $courses = Course::all();
        $events = Event::where('course_id', $course_id)->get();

        //dd($events);
        if ($event_id == 0) {
            //dd($projects);
            Session::forget('event_id');
            return view('admin.step2', compact('employee', 'projects', 'courses', 'events'));
        } else {
            Session::put('event_id', $event_id);
            $number = Event::where('id', $event_id)->first()->number;
            $signed = Signup::where('event_id', $event_id)->count();
            //dd($number);
            return view('admin.step2', compact('employee', 'projects', 'courses', 'events', 'number', 'signed'));
        }
    }

    public function step3(CreateSignupRequest $request)
    {

        //dd($request->group);
        $signup = new Signup;
        $signup->identity = $request->identity;
        $signup->project_id = $request->project_id;
        $signup->course_id = $request->course_id;
        $signup->event_id = $request->event_id;
        //dd(Auth::user()->name);
        $signup->note = Auth::user()->name;
        $signup->save();

        return redirect('/admin/signup/list');
    }

    public function download()
    {
        Excel::create('signup', function ($excel) {
            $excel->sheet('signup', function ($sheet) {
                $employee = Signup::all();
                $sheet->fromArray($employee);
            });
        })->export('xlsx');
    }

    public function downloadAll()
    {
        $date = Carbon::now('Asia/Taipei')->format('YmdHis');
        //dd($date);
        $filename = 'signup_' . $date;
        //dd($filename);
        Excel::create($filename, function ($excel) {
            $excel->sheet('all', function ($sheet) {
                $signups = DB::table('signups')
                    ->leftjoin('new_employees', 'signups.identity', '=', 'new_employees.identity')
                    ->leftjoin('projects', 'signups.project_id', '=', 'projects.id')
                    ->leftjoin('courses', 'signups.course_id', '=', 'courses.id')
                    ->leftjoin('events', 'signups.event_id', '=', 'events.id')
                    ->select('signups.id as sno', 'new_employees.area as area', 'new_employees.type as type', 'new_employees.location as location',
                        'new_employees.title as title', 'new_employees.emp_id', 'new_employees.name as name', 'new_employees.identity',
                        'new_employees.gender', 'new_employees.birth_year', 'new_employees.level', 'new_employees.background',
                        'new_employees.mobile', 'new_employees.food', 'new_employees.group', 'new_employees.tax_id',
                        'new_employees.duty_date', 'projects.name as project',
                        'courses.name as course', 'events.name as event');

                //dd($signups);
                if (Auth::user()->hasRole('la-owner')) {
                    $ruleData = $signups->where('area', '北智捷');
                } elseif (Auth::user()->hasRole('lb-owner')) {
                    $ruleData = $signups->where('area', '桃智捷');
                } elseif (Auth::user()->hasRole('lc-owner')) {
                    $ruleData = $signups->where('area', '中智捷');
                } elseif (Auth::user()->hasRole('ld-owner')) {
                    $ruleData = $signups->where('area', '南智捷');
                } elseif (Auth::user()->hasRole('le-owner')) {
                    $ruleData = $signups->where('area', '高智捷');
//                } elseif (Auth::user()->hasRole('luxgen-owner')) {
//                    $ruleData = $signups->where('note', 'LA')->where('area', '北智捷');
                } else {
                    $ruleData = $signups;
                }

                $signups = $ruleData->orderBy('signups.id', 'asc')->get();
                $data = array();
                foreach ($signups as $signup) {
                    $data[] = (array)$signup;
                }
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }

    public function resetSignups()
    {
        Signup::truncate();
        return redirect('/admin/signup/list');
    }

    public function batch()
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
            if ($upload_name == 'signup.csv') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'signup.csv';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                //$uploads = Excel::selectSheets('new')->load($file, function ($reader) {
                $uploads = Excel::load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                //Signup::truncate();
                foreach ($uploads as $upload) {
                    Signup::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/signup/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }
}
