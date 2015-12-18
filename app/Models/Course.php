<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ["name", "project_id", "note"];

    public function signup()
    {
        return $this->hasMany('App\Models\Signup');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function event()
    {
        return $this->hasMany('App\Models\Event');
    }
}
