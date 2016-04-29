<?php

namespace App\Http\Controllers;

use App\Models\Story;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    public function listTitle()
    {
        $filter = DataFilter::source(DB::table('stories')->where('type', 0));

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('type', 'type', true);
        $grid->add('title', 'Title', true);
        $grid->add('updated_at', '更新時間', true);

        $grid->orderBy('id', 'desc');
        $grid->paginate(5);
        $grid->edit('/admin/touching2/edit_title', '功能', 'show|modify|delete');

        $grid->link('/admin/touching2/edit_title', "新增", "TR");
        return view('admin.list', compact('filter', 'grid'));

    }

    public function editTitle()
    {
        $edit = DataEdit::source(new Story());
        //dd($edit);
        $edit->link("/admin/touching2/list_title", "Back", "BL");
        $edit->label('Title');

        $edit->add('type', '', 'hidden')->insertValue(0);
        $edit->add('title', 'Title', 'text');

        $grid = DataGrid::source(DB::table('stories')->where('type', 0));
        $grid->add('title', 'Title', true);
        $grid->add('updated_at', '更新時間', true);

        $grid->edit('/admin/touching2/edit_title', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(5);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function list1()
    {

        $filter = DataFilter::source(DB::table('stories')->where('type', 1));
        $filter->add('store', 'store', 'text');
        $filter->add('employee', 'employee', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('type', 'type', true);
        $grid->add('slogn', 'slogn', true);
        $grid->add('store', 'store', true);
        $grid->add('employee', 'employee', true);
        $grid->add('customer', 'customer', true);
        $grid->add('date', 'date', true);
        $grid->add('story1', 'story1', true);
        $grid->add('story2', 'story2', true);
        $grid->add('story3', 'story3', true);
        $grid->add('story4', 'story4', true);
        $grid->add('story5', 'story5', true);
        $grid->add('story6', 'story6', true);
        $grid->add('story7', 'story7', true);
        $grid->add('story8', 'story8', true);
        $grid->add('story9', 'story9', true);
        $grid->add('story10', 'story10', true);
        $grid->add('thinking', 'thinking', true);
        $grid->add('touching', 'touching', true);
        $grid->add('treating', 'treating', true);
        $grid->add('timing', 'timing', true);
        $grid->add('updated_at', '更新時間', true);

        $grid->orderBy('id', 'desc');
        $grid->paginate(5);

        $grid->edit('/admin/touching2/edit_1', '功能', 'show|modify|delete');
        $grid->link('/admin/touching2/edit_1', "新增", "TR");
        return view('admin.list', compact('filter', 'grid'));

    }

    public function edit1()
    {
        $edit = DataEdit::source(new Story());
        //dd($edit);
        $edit->link("/admin/touching2/list_1", "Back", "BL");
        $edit->label('北智捷');
        $edit->add('type', '', 'hidden')->insertValue(1);
        $edit->add('slogn', 'slogn', 'text');
        $edit->add('store', 'store', 'text');
        $edit->add('employee', 'employee', 'text');
        $edit->add('customer', 'customer', 'text');
        $edit->add('date', 'date', 'date')->format('Y/m/d', 'zh-TW');
        $edit->add('story1', 'story1', 'redactor');
        $edit->add('story2', 'story2', 'redactor');
        $edit->add('story3', 'story3', 'redactor');
        $edit->add('story4', 'story4', 'redactor');
        $edit->add('story5', 'story5', 'redactor');
        $edit->add('story6', 'story6', 'redactor');
        $edit->add('story7', 'story7', 'redactor');
        $edit->add('story8', 'story8', 'redactor');
        $edit->add('story9', 'story9', 'redactor');
        $edit->add('story10', 'story10', 'redactor');
        $edit->add('thinking', 'thinking', 'textarea');
        $edit->add('touching', 'touching', 'textarea');
        $edit->add('treating', 'treating', 'textarea');
        $edit->add('timing', 'timing', 'textarea');
        $edit->add('pic1', '照片', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic2', '照片', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic3', '照片', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic4', '照片', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic5', '照片', 'image')->move('uploads/images/story')->preview(145, 160);

        $grid = DataGrid::source(DB::table('stories')->where('type', 1));
        $grid->add('type', 'type', true);
        $grid->add('slogn', 'slogn', true);
        $grid->add('store', 'store', true);
        $grid->add('employee', 'employee', true);
        $grid->add('customer', 'customer', true);
        $grid->add('date', 'date', true);
        $grid->add('story1', 'story1', true);
        $grid->add('story2', 'story2', true);
        $grid->add('story3', 'story3', true);
        $grid->add('story4', 'story4', true);
        $grid->add('story5', 'story5', true);
        $grid->add('story6', 'story6', true);
        $grid->add('story7', 'story7', true);
        $grid->add('story8', 'story8', true);
        $grid->add('story9', 'story9', true);
        $grid->add('story10', 'story10', true);
        $grid->add('thinking', 'thinking', true);
        $grid->add('touching', 'touching', true);
        $grid->add('treating', 'treating', true);
        $grid->add('timing', 'timing', true);
        $grid->add('updated_at', '更新時間', true);

        $grid->edit('/admin/touching2/edit_1', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(5);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }
}
