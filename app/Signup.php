<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $fillable = ["photo_id", "year_id", "group_id", "project_id", "course_id", "event_id", "note"];


    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }
}
