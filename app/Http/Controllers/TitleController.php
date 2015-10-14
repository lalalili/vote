<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Models\Title;
use DataEdit;
use DataFilter;
use DataGrid;
use Input;
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
        $grid->orderBy('id', 'asc');
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
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/title/edit', '功能', 'show|modify');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }
}
