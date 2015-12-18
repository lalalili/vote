<?php namespace app\Http\Controllers;

use App\Http\Requests;
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

class ProjectController extends Controller
{
    public function anyList()
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

        $grid->edit('/admin/project/edit', '功能', 'show|modify|delete');

        $grid->link('/admin/project/edit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        $edit = DataEdit::source(new Project());
        //dd($edit);
        $edit->link("/admin/project/list", "上一頁", "BL");
        $edit->link("/admin/project/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '課程項目', 'text')->rule('required|min:4');
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(new Project());
        $grid->add('name', '課程項目');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/project/edit', '功能', 'show|modify|delete');

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
            if ($upload_name == 'project.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'project.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::selectSheets('project')->load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                Project::truncate();
                foreach ($uploads as $upload) {
                    Project::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/project/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }

    public function getDownload()
    {
        Excel::create('project', function ($excel) {
            $excel->sheet('project', function ($sheet) {
                $title = Project::all();
                //dd($data);
                $sheet->fromArray($title);
            });
        })->export('xlsx');
    }
}
