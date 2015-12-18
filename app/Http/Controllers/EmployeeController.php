<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Event;
use App\Models\Photo;
use App\Models\Project;
use App\Models\Signup;
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

class EmployeeController extends Controller
{

    public function anyList()
    {
        $filter = DataFilter::source(Employee::with('photo'));
        //dd($filter);
        $filter->add('photo.name', '員工', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('photo.name', '姓名', true);
        $grid->add('identity', '身分證號', true);
        $grid->add('birth_year', '出生年', true);
        $grid->add('mobile', '手機號碼', true);
        $grid->add('emp_id', '工號', true);
        $grid->add('group', '菁英班梯次', true);
        $grid->add('gender', '性別', true);
        $grid->add('type', '人員別', true);
        $grid->add('level', '階層別', true);
        $grid->add('background', '最高學歷', true);
        $grid->add('food', '飲食習慣', true);
        $grid->add('updated_at', '最後更新時間', true);

        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        $grid->edit('/admin/employee/edit', '功能', 'show|modify|delete');

        $grid->link('/admin/employee/edit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
//        if (Input::get('do_delete') == 1) {
//            return "not the first";
//        }
        //dd(Signup::find(1));
        $edit = DataEdit::source(new Employee());
        //dd($edit);
        $edit->link("/admin/employee/list", "上一頁", "BL");
        $edit->link("/admin/employee/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('photo_id', '姓名', 'select')->options(Photo::lists("name", "id")->all());
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

        $grid = DataGrid::source(Employee::with('photo'));
        //dd($grid);
        $grid->add('photo.name', '姓名', true);
        $grid->add('identity', '身分證號', true);
        $grid->add('birth_year', '出生年', true);
        $grid->add('mobile', '手機號碼', true);
        $grid->add('emp_id', '工號', true);
        $grid->add('group', '菁英班梯次', true);
        $grid->add('gender', '性別', true);
        $grid->add('type', '人員別', true);
        $grid->add('level', '階層別', true);
        $grid->add('background', '最高學歷', true);
        $grid->add('food', '飲食習慣', true);

        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        $grid->edit('/admin/employee/edit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function choose()
    {
        $lists = DB::table('photos')
            ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
            ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
            ->select('photos.name as name', 'titles.name as title',
                'albums.name as album', 'albums.type as type', 'photos.id as id')
            ->orderBy('photos.album_id', 'asc')->get();
        //dd($lists);
        return view('admin.choose', compact('lists'));
    }

    public function step1(request $request, $id)
    {
        $employee = DB::table('photos')
            ->leftjoin('titles', 'photos.title_id', '=', 'titles.id')
            ->leftjoin('albums', 'photos.album_id', '=', 'albums.id')
            ->leftjoin('employees', 'photos.id', '=', 'employees.photo_id')
            ->select('photos.name as name', 'titles.name as title',
                'albums.name as album', 'albums.area as area', 'photos.id as id', 'employees.identity',
                'employees.gender', 'employees.birth_year', 'employees.level', 'employees.background',
                'employees.mobile', 'employees.food', 'employees.emp_id', 'employees.group', 'employees.type',
                'employees.id as emp')
            ->where('photos.id', '=', $id)->first();
        //dd($employee);
        return view('admin.step1', compact('employee'));
    }

    public function saveEmployee(CreateEmployeeRequest $request)
    {
        //dd(is_Null($request->emp));
        if (is_Null($request->emp)) {
            $employee = new Employee;
        } else {
            $employee = Employee::findOrNew($request->emp);
        }
        //dd($employee);
        $employee->photo_id = $request->photo_id;
        $employee->identity = $request->identity;
        $employee->gender = $request->gender;
        $employee->birth_year = $request->birth_year;
        $employee->type = $request->type;
        $employee->level = $request->level;
        $employee->background = $request->background;
        $employee->mobile = $request->mobile;
        $employee->food = $request->food;
        $employee->emp_id = $request->emp_id;
        $employee->group = $request->group;
        //dd($employee);
        $employee->save();

        return redirect('/admin/signup/step2/' . $request->photo_id);
    }
}
