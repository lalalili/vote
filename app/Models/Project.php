<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ["name", "note"];

    public function signup()
    {
        return $this->hasMany('App\Models\Signup');
    }

    public function course()
    {
        return $this->hasMany('App\Models\Course');
    }
}
