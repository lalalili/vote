<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Models\Title;
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

class TitleController extends Controller
{
    public function anyList()
    {
        $filter = DataFilter::source(new Title());
        //dd($filter);
        $filter->add('name', '職稱', 'text');
        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '職稱');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('note', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/title/edit', '功能', 'show|modify');

        $grid->link('/admin/title/edit', "新增職稱", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Title());
        //dd($edit);
        $edit->link("/admin/title/list", "上一頁", "BL");
        $edit->link("/admin/title/edit", "新增職稱", "TR");
        $edit->label('職稱編輯');

        $edit->add('name', '職稱', 'text')->rule('required|min:2');
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(new Title());
        $grid->add('name', '職稱');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('note', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/title/edit', '功能', 'show|modify');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function getDownload()
    {
        Excel::create('title', function ($excel) {
            $excel->sheet('title', function ($sheet) {
                $title = Title::all();
                //dd($data);
                $sheet->fromArray($title);
            });
        })->export('xlsx');
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
            if ($upload_name == 'title.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'title.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::selectSheets('title')->load($file, function ($reader) {
                })->get()->toArray();
                //dd($uploads);
                Title::truncate();
                foreach ($uploads as $upload) {
                    Title::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                //$datas = Album::orderBy('site', 'asc')->get();
                return Redirect::to('/admin/title/list');
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('/admin/adv');
            }
        }
    }
}
