<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Story;
use Carbon\Carbon;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;

class StoryController extends Controller
{
    public function listTitle()
    {
        $filter = DataFilter::source(DB::table('stories')->where('type', 1));

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('type', 'type', true);
        $grid->add('title1', 'Title1', true);
        $grid->add('title2', 'Title2', true);
        $grid->add('title3', 'Title3', true);
        $grid->add('order', 'Order', true);
        $grid->add('is_display', 'is_display', true);

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

        $edit->add('type', '', 'hidden')->insertValue(1);
        $edit->add('title1', 'title1(2016年)', 'text')->insertValue('年');
        $edit->add('title2', 'title2(4月)', 'text')->insertValue('月');
        $edit->add('title3', 'title3(感動服務)', 'text')->insertValue('感動服務');
        $edit->add('order', '', 'hidden')->insertValue(1);
        $edit->add('is_display', '', 'hidden')->insertValue(1);

        $grid = DataGrid::source(DB::table('stories')->where('type', 1));
        $grid->add('type', 'type', true);
        $grid->add('title1', 'Title1', true);
        $grid->add('title2', 'Title2', true);
        $grid->add('title3', 'Title3', true);
        $grid->add('order', 'Order', true);
        $grid->add('is_display', 'is_display', true);

        $grid->edit('/admin/touching2/edit_title', 'Edit', 'show|modify|delete');
        $grid->orderBy('id', 'desc');
        $grid->paginate(5);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function lists()
    {
        $filter = DataFilter::source(DB::table('stories')->where('type', '<>', 1));
        $filter->add('store', 'store', 'text');
        $filter->add('employee', 'employee', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('type', '類別', true);
        $grid->add('order', '順序', true);
        $grid->add('area', '區域', true);
        $grid->add('slogn', 'slogn', true);
        $grid->add('store1', 'store1', true);
        $grid->add('store2', 'store2', true);
        $grid->add('employee1', 'employee1');
        $grid->add('employee2', 'employee2');
        $grid->add('customer1', 'customer1');
        $grid->add('customer2', 'customer2');
        $grid->add('date1', 'date1');
        $grid->add('date2', 'date2');
        $grid->add('note1', '月份');
        $grid->add('is_diaplay', '是否顯示', true);
        $grid->add('updated_at', '更新時間', true);

        $grid->orderBy('type', 'desc');
        $grid->paginate(12);

        $grid->edit('/admin/touching2/edit', '功能', 'show|modify|delete');
        $grid->link('/admin/touching2/edit', "新增", "TR");
        return view('admin.list', compact('filter', 'grid'));

    }

    public function edit()
    {
        $type = ['2' => '每月', '3' => '年度'];
        $order = [
            '1'  => '1',
            '2'  => '2',
            '3'  => '3',
            '4'  => '4',
            '5'  => '5',
            '6'  => '6',
            '7'  => '7',
            '8'  => '8',
            '9'  => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13'
        ];
        $area = ['北智捷' => '北智捷', '桃智捷' => '桃智捷', '中智捷' => '中智捷', '南智捷' => '南智捷', '高智捷' => '高智捷'];
        $edit = DataEdit::source(new Story());
        //dd($edit);
        $edit->link("/admin/touching2/lists", "Back", "BL");
        $edit->label('感動服務');
        $edit->add('type', '類別(每月/年度)', 'select')->options($type);
        $edit->add('order', '順序(1=>最前面 13=>最後)', 'select')->options($order);

        $edit->add('area', '區域(北桃中南高)', 'select')->options($area);
        $edit->add('slogn', 'slogn(LUXGEN ! 使命必達 !)', 'text');
        $edit->add('store1', 'store1(板橋生活館)', 'text');
        $edit->add('store2', 'store2(板橋生活館)', 'text');
        $edit->add('store3', 'store3(板橋生活館)', 'text');
        $edit->add('employee1', 'employee1(銷售顧問 林祐聰)', 'text');
        $edit->add('employee2', 'employee2', 'text');
        $edit->add('employee3', 'employee3', 'text');
        $edit->add('employee4', 'employee4', 'text');
        $edit->add('employee5', 'employee5', 'text');
        $edit->add('customer1', 'customer1', 'text');
        $edit->add('customer2', 'customer2', 'text');
        $edit->add('customer3', 'customer3', 'text');
        $edit->add('customer4', 'customer4', 'text');
        $edit->add('customer5', 'customer5', 'text');
        $edit->add('date1', 'date1', 'date')->format('Y/m/d', 'zh-TW');
        $edit->add('date2', 'date2', 'date')->format('Y/m/d', 'zh-TW');
        $edit->add('date3', 'date3', 'date')->format('Y/m/d', 'zh-TW');
        $edit->add('story1', 'story1', 'textarea');
        $edit->add('story2', 'story2', 'textarea');
        $edit->add('story3', 'story3', 'textarea');
        $edit->add('story4', 'story4', 'textarea');
        $edit->add('story5', 'story5', 'textarea');
        $edit->add('story6', 'story6', 'textarea');
        $edit->add('story7', 'story7', 'textarea');
        $edit->add('story8', 'story8', 'textarea');
        $edit->add('story9', 'story9', 'textarea');
        $edit->add('story10', 'story10', 'textarea');
        $edit->add('thinking', 'thinking(預先設想)', 'textarea');
        $edit->add('touching', 'touching(超越期待)', 'textarea');
        $edit->add('treating', 'treating(同理心)', 'textarea');
        $edit->add('timing', 'timing(感動關鍵時刻)', 'textarea');
        $edit->add('summary', 'Summary(投票故事簡介)', 'textarea');
        $edit->add('pic1', '照片1', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic1_note', '照片1說明', 'textarea');
        $edit->add('pic2', '照片2', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic2_note', '照片2說明', 'textarea');
        $edit->add('pic3', '照片3', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic3_note', '照片3說明', 'textarea');
        $edit->add('pic4', '照片4', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic4_note', '照片4說明', 'textarea');
        $edit->add('pic5', '照片5', 'image')->move('uploads/images/story')->preview(145, 160);
        $edit->add('pic5_note', '照片5說明', 'textarea');
        $edit->add('note1', '故事月份', 'text')->insertValue(Carbon::now('Asia/Taipei')->month . '月');
        $edit->add('is_display', '是否顯示', 'checkbox')->insertValue(1);

        $grid = DataGrid::source(DB::table('stories')->where('type', '<>', 1));
        $grid->add('type', '類別', true);
        $grid->add('order', '順序', true);
        $grid->add('area', '區域', true);
        $grid->add('slogn', 'slogn', true);
        $grid->add('store1', 'store1', true);
        $grid->add('store2', 'store2', true);
        $grid->add('employee1', 'employee1');
        $grid->add('employee2', 'employee2');
        $grid->add('customer1', 'customer1');
        $grid->add('customer2', 'customer2');
        $grid->add('date1', 'date1');
        $grid->add('date2', 'date2');
        $grid->add('note1', '月份');
        $grid->add('is_diaplay', '是否顯示', true);
        $grid->add('updated_at', '更新時間', true);

        $grid->edit('/admin/touching2/edit', 'Edit', 'show|modify|delete');
        $grid->orderBy('type');
        $grid->paginate(5);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function show()
    {
        $title = DB::table('stories')->where('type', 1)->get();
        $stories = DB::table('stories')->where('type', '<>', 1)->where('is_display', '=', '1')->orderBy('order')->get();
        //dd($title[0]->title1);
        //dd($stories);
        return view('touching2.index', compact('title', 'stories'));
    }
}
