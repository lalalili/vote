<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Models\Album;
use App\Models\NewEmployee;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Excel;
use Flash;
use Redirect;
use Request;
use Validator;
use View;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->area = ['北智捷' => '北智捷', '桃智捷' => '桃智捷', '中智捷' => '中智捷', '南智捷' => '南智捷', '高智捷' => '高智捷'];
        $this->type = ['服務廠' => '服務廠', '生活館' => '生活館'];
        $this->title = ['行政專員' => '行政專員', '行政組長' => '行政組長', '服務專員' => '服務專員', '銷售顧問' => '銷售顧問'];
        $this->gender = ['男' => '男', '女' => '女'];
        $this->food = ['葷' => '葷', '素' => '素'];
        $this->level = ['基層員工' => '基層員工'];
        $this->background = ['國中' => '國中', '專科' => '專科', '高中職' => '高中職', '大專' => '大專', '大學' => '大學', '碩士' => '碩士'];

    }

    public function lists()
    {
        $data = $this->getData();
        $filter = DataFilter::source($data);
        //dd($filter);
        $filter->add('name', '員工', 'text');
        $filter->add('emp_id', '工號', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '姓名', 'photo_id');
        $grid->add('area', '經銷商', true);
        $grid->add('type', '人員別', true);
        $grid->add('location', '據點', true);
        $grid->add('title', '職稱', true);
        $grid->add('emp_id', '工號', true);
        $grid->add('mobile', '手機號碼', true);
        $grid->add('group', '菁英班梯次', true);
        $grid->add('gender', '性別', true);
        $grid->add('level', '階層別', true);
        $grid->add('food', '飲食習慣', true);
        $grid->add('updated_at', '最後更新時間', true);

        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        $grid->edit('/admin/employee/edit', '功能', 'show|modify|delete');

        $grid->link('/admin/employee/edit', "新增", "TR");
        $grid->link('/admin/signup/choose/all', "報名", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function edit()
    {
        $edit = DataEdit::source(new NewEmployee());
        $edit->link("/admin/employee/list", "上一頁", "BL");
        $edit->link("/admin/employee/edit", "新增", "TR");
        $edit->link("/admin/signup/choose/all", "報名", "TR");
        $edit->label('編輯');
        $edit->add('identity', '身分證號', 'text');
        $edit->add('name', '姓名', 'text');
        $edit->add('area', '經銷商', 'select')->options($this->area);
        $edit->add('type', '人員別', 'select')->options($this->type);
        $edit->add('location', '據點', 'select')->options(Album::lists('name', 'name')->all());
        $edit->add('title', '職稱', 'select')->options($this->title);
        $edit->add('emp_id', '工號', 'text');
        $edit->add('gender', '性別', 'select')->options($this->gender);
        $edit->add('birth_year', '出生年', 'text');
        $edit->add('level', '階層別', 'select')->options($this->level);
        $edit->add('background', '最高學歷', 'select')->options($this->background);
        $edit->add('mobile', '手機號碼', 'text');
        $edit->add('food', '飲食習慣', 'select')->options($this->food);
        $edit->add('group', '菁英班梯次', 'text');
        $edit->add('tax_id', '統編', 'text');
        $edit->add('duty_date', '到職日','date')->format('Y-m-d', 'zh-TW');
        return $edit->view('admin.detail', compact('edit'));
    }

    public function step1(request $request, $id)
    {
        $employee = DB::table('new_employees')
            ->where('identity', '=', $id)->first();
        //dd($employee);
        return view('admin.step1', compact('employee'));
    }

    public function saveEmployee(CreateEmployeeRequest $request)
    {
        $employee = NewEmployee::findOrFail($request->identify);
        $employee->emp_id = $request->emp_id;
        $employee->gender = $request->gender;
        $employee->birth_year = $request->birth_year;
        $employee->level = $request->level;
        $employee->background = $request->background;
        $employee->mobile = $request->mobile;
        $employee->food = $request->food;
        $employee->group = $request->group;
        $employee->tax_id = $request->tax_id;
        $employee->duty_date = $request->duty_date;
        $employee->save();
        return redirect('/admin/signup/step2/' . $request->identify);
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
            if ($upload_name == 'employee.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'employee.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                //$uploads = Excel::selectSheets('employee')->load($file, function ($reader) {
                $uploads = Excel::load($file, function ($reader) {
                    //$reader->ignoreEmpty();
                })->get()->toArray();
                //dd($uploads);
                NewEmployee::truncate();
                foreach ($uploads as $upload) {
                    NewEmployee::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/employee/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }

    public function download()
    {
        Excel::create('employee', function ($excel) {
            $excel->sheet('employee', function ($sheet) {
                $employee = Employee::all();
                $sheet->fromArray($employee);
            });
        })->export('xlsx');
    }

    public function getData()
    {
        switch (auth()->user()->name) {
            case 'LA':
                $area = '北智捷';
                break;
            case 'LB':
                $area = '桃智捷';
                break;
            case 'LC':
                $area = '中智捷';
                break;
            case 'LD':
                $area = '南智捷';
                break;
            case 'LE':
                $area = '高智捷';
                break;
            case 'LUXGEN':
                $area = '納智捷汽車';
                break;
        }
        if (isset($area)) {
            $data = NewEmployee::where('area', $area);
        } else {
            $data = new NewEmployee();
        }

        return $data;
    }
}
