<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ["name", "note"];

    public function signup()
    {
        return $this->hasMany('App\Signup');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function event()
    {
        return $this->hasMany('App\Event');
    }
}
