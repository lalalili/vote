<?php

namespace App\Http\Controllers;

use App\Course;
use App\Event;
use App\Group;
use App\Models\Photo;
use App\Project;
use App\Signup;
use App\Year;
use DataEdit;
use DataFilter;
use DataGrid;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use View;

class SignupController extends Controller
{
    public function anyYearlist()
    {
        $filter = DataFilter::source(new Year());
        //dd($filter);
        $filter->add('name', '年度', 'text');
        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '年度');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/yearedit', '功能', 'show|modify|delete');

        $grid->link('/admin/signup/yearedit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyYearedit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Year());
        //dd($edit);
        $edit->link("/admin/signup/yearlist", "上一頁", "BL");
        $edit->link("/admin/signup/yearedit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '年度', 'text')->rule('required|min:4');
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(new Year());
        $grid->add('name', '年度');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/yearedit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function anyGrouplist()
    {
        $filter = DataFilter::source(new Group());
        //dd($filter);
        $filter->add('name', '梯次', 'text');
        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '梯次');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/groupedit', '功能', 'show|modify|delete');

        $grid->link('/admin/signup/groupedit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyGroupedit()
    {
        if (Input::get('do_delete') == 1) {
            return "not the first";
        }

        $edit = DataEdit::source(new Group());
        //dd($edit);
        $edit->link("/admin/signup/grouplist", "上一頁", "BL");
        $edit->link("/admin/signup/groupedit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('name', '梯次', 'text')->rule('required|min:1');
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(new Group());
        $grid->add('name', '梯次');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/groupedit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

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
        $filter = DataFilter::source(new Course());
        //dd($filter);
        $filter->add('name', '課別', 'text');
        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '課別');
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

        $edit->add('name', '課別', 'text')->rule('required|min:4');
        $edit->add('note', '備註', 'text');

        $grid = DataGrid::source(new Course());
        $grid->add('name', '課別');
        $grid->add('note', '備註');
        $grid->add('updated_at', '更新時間', true);
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/courseedit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function anyEventlist()
    {
        $filter = DataFilter::source(new Event());
        //dd($filter);
        $filter->add('name', '課程日期/場次', 'text');
        $filter->add('note', '備註', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', '課程日期/場次');
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

        $edit->add('name', '課程日期/場次', 'text')->rule('required|min:4');
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
        $filter = DataFilter::source(Signup::with('year', 'group', 'project', 'course', 'event', 'photo'));
        //dd($filter);
        $filter->add('photo.name', '員工', 'text');
        $filter->add('course.name', '課別', 'text');
        $filter->add('event.name', '場次', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('photo.name', '姓名', true);
        $grid->add('year.name', '年度', true);
        $grid->add('group.name', '梯次', true);
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

        $edit = DataEdit::source(new Signup());
        //dd($edit);
        $edit->link("/admin/signup/list", "上一頁", "BL");
        $edit->link("/admin/signup/edit", "新增", "TR");
        $edit->label('編輯');

        $edit->add('photo_id', '姓名', 'select')->options(Photo::lists("name", "id")->all());
        $edit->add('year_id', '年度', 'select')->options(Year::lists("name", "id")->all());
        $edit->add('group_id', '梯次', 'select')->options(Group::lists("name", "id")->all());
        $edit->add('project_id', '課程項目', 'select')->options(Project::lists("name", "id")->all());
        $edit->add('course_id', '課別', 'select')->options(Course::lists("name", "id")->all());
        $edit->add('event_id', '場次', 'select')->options(Event::lists("name", "id")->all());
        $edit->add('note', '備註', 'text');
        //dd($edit);

        $grid = DataGrid::source(Signup::with('year', 'group', 'project', 'course', 'event', 'photo'));
        //dd($grid);
        $grid->add('photo.name', '姓名', true);
        $grid->add('year.name', '年度', true);
        $grid->add('group.name', '梯次', true);
        $grid->add('project.name', '課程項目', true);
        $grid->add('course.name', '課別', true);
        $grid->add('event.name', '場次', true);

        $grid->orderBy('updated_at', 'desc');
        $grid->paginate(10);

        $grid->edit('/admin/signup/edit', '功能', 'show|modify|delete');

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }

    public function getStep1()
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

    public function anyStep2()
    {
        //dd(is_null(Input::get('insert')));
        if (is_null(Input::get('insert'))) {
            $id = Input::get('show');
            $edit = DataEdit::source(new Signup());
            $edit->link("/admin/signup/list", "上一頁", "BL");
            $edit->label('報名');
            //dd(DB::table('photos')->where('id', $id)->lists('name', 'id'));
            $edit->add('photo_id', '姓名', 'select')->options(Photo::lists("name", "id")->all());
            //$edit->add('photo_id', '姓名', 'select')->options(DB::table('photos')->where('id', $id)->lists('name', 'id'));
            $edit->add('year_id', '年度', 'select')->options(Year::lists("name", "id")->all());
            $edit->add('group_id', '梯次', 'select')->options(Group::lists("name", "id")->all());
            $edit->add('project_id', '課程項目', 'select')->options(Project::lists("name", "id")->all());
            $edit->add('course_id', '課別', 'select')->options(Course::lists("name", "id")->all());
            $edit->add('event_id', '場次', 'select')->options(Event::lists("name", "id")->all());
            $edit->add('note', '備註', 'text');
            //dd($edit);

            return $edit->view('admin.step2', compact('edit'));
        } else {
            $id = Input::get('insert');
            $edit = DataEdit::source(new Signup());
            $edit->link("/admin/signup/list", "上一頁", "BL");
            $edit->label('報名');
            //dd(DB::table('photos')->where('id', $id)->lists('name', 'id'));
            //$edit->add('photo_id', '姓名', 'select')->options(Photo::lists("name", "id")->all());
            $edit->add('photo_id', '姓名', 'select')->options(DB::table('photos')->where('id', $id)->lists('name', 'id'));
            $edit->add('year_id', '年度', 'select')->options(Year::lists("name", "id")->all());
            $edit->add('group_id', '梯次', 'select')->options(Group::lists("name", "id")->all());
            $edit->add('project_id', '課程項目', 'select')->options(Project::lists("name", "id")->all());
            $edit->add('course_id', '課別', 'select')->options(Course::lists("name", "id")->all());
            $edit->add('event_id', '場次', 'select')->options(Event::lists("name", "id")->all());
            $edit->add('note', '備註', 'text');
            //dd($edit);

            return $edit->view('admin.step2', compact('edit'));
        }
    }
}
