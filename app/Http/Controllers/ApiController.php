<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\CallbackDownload;
use DataEdit;
use DataFilter;
use DataGrid;
use Illuminate\Http\Request;
use View;

class ApiController extends Controller
{

    public function callbackDownload(Request $request)
    {
        $key = $request->input('k');
        //dd($key);
        if (!is_null($key)) {
            $download = new CallbackDownload;
            $download->key = $key;
            $download->save();
            return response()->json(['k' => $key, 'code' => '0', 'msg' => 'OK']);
        }
        return response()->json(['k' => $key, 'code' => '900', 'msg' => 'Key is null']);
    }

    public function callbackLists()
    {
        $filter = DataFilter::source(new CallbackDownload());
        $filter->add('key', 'Key', 'text');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('key', 'Key', true);
        $grid->add('created_at', 'Callback時間', true);

        $grid->edit('/api/callback_edit', 'Edit', 'show|modify|delete');
        $grid->orderBy('created_at', 'desc');
        $grid->paginate(10);

        $grid->link('/api/callback_edit', "新增", "TR");
        return View::make('admin.list', compact('filter', 'grid'));
    }

    public function callbackEdit()
    {
        $edit = DataEdit::source(new CallbackDownload());
        //dd($edit);
        $edit->link("/api/callback_list", "Back", "BL");
        $edit->label('API');

        $edit->add('key', 'Key', 'text');

        $grid = DataGrid::source(new CallbackDownload());
        $grid->add('key', 'Key', true);
        $grid->add('created_at', 'Callback時間', true);

        $grid->edit('/api/callback_edit', 'Edit', 'show|modify|delete');
        $grid->orderBy('created_at', 'desc');
        $grid->paginate(10);

        return $edit->view('admin.detail', compact('edit', 'grid'));
    }
}
