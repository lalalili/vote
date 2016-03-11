<?php

namespace Luxgen\Repository;

use App\Models\Photo;
use App\Models\Signup;
use DB;

class SignupRepository
{

    protected $signup;

    /**
     * EmployeeRepository constructor.
     * @param Signup $signup
     */
    public function __construct(Signup $signup)
    {
        $this->signup = $signup;
    }

    public function cleaning()
    {
        $photo_id = Photo::all()->pluck('id')->all();
        //dd(DB::table('signups')->whereNotIn('photo_id', $photo_id)->get());
        DB::table('signups')->whereNotIn('photo_id', $photo_id)->delete();
        return $this->signup->get();
    }
}
