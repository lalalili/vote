<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Vote;
use DataEdit;
use DataFilter;
use DataGrid;
use Input;
use View;

class VoteController extends Controller
{

    public function anyList()
    {
        $filter = DataFilter::source(Photo::with('album', 'vote'));
        //dd($filter);
        $filter->add('album.name', '據點', 'text');
        $filter->add('title', '職稱', 'text');
        $filter->add('name', '姓名', 'text');

        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);

        $grid->add('{{ album->name }}', 'Album', 'album_id');
        $grid->add('title', '職稱');
        $grid->add('name', '姓名');
        $grid->add('updated_at', 'Last Updated');

        $grid->edit('/version/edit', 'Edit', 'show|modify');
        $grid->link('/version/editsite', "新增Site", "TR");
        $grid->link('/version/editregular', "新增Regular", "TR");
        $grid->link('/version/editsvn', "新增SVN", "TR");
        $grid->link('/version/edit', "新增Patch", "TR");
        $grid->orderBy('site_id', 'asc');
        $grid->paginate(10);


        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Photo());
        //dd($edit);
        $edit->link("/version/list", "Back", "BL");
        $edit->link("/version/editsite", "New", "TR");
        $edit->label('Edit Patch');

        $edit->add('site_id', 'Site', 'select')->options(Site::lists("name", "id")->all());
        $edit->add('regular_id', 'Version', 'select')->options(Regular::lists("name", "id")->all());
        $svn = Svn::lists("name", "id")->all();
        asort($svn);
        //dd($a);
        $edit->add('svn', 'SVN', 'checkboxgroup')->options($svn);
        //dd(Svn::lists("name", "id"));

        $grid = DataGrid::source(Photo::with('site', 'regular', 'svn'));
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('{{ $site->name }}', 'Site', 'site_id');
        $grid->add('{{ $regular->name }}', 'Regular', 'regular_id');
        $grid->add('{{ implode(", ", $svn->lists("name")->all()) }}', 'SVN');
        $grid->add('updated_at', 'Last Updated');

        $grid->edit('/version/edit', 'Edit', 'show|modify');
        $grid->orderBy('site_id', 'asc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }
}
