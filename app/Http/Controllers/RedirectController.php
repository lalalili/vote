<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class RedirectController extends Controller
{
    public function pdpa()
    {
        return view('pdpa');
    }

    public function thanks()
    {
        return view('success');
    }

    public function lottery()
    {
        return view('lottery');
    }

    public function tunchingThanks()
    {
        return view('touching.success');
    }

    public function adminHome()
    {
        return redirect('/admin/photo/list');
    }

    public function adv()
    {
        return view('admin.adv');
    }

    public function signupChoose()
    {
        return view('admin.choose');
    }

    public function touchingEdit()
    {
        return view('touching.adv');
    }
}
