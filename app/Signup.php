<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $fillable = ["photo_id", "year_id", "group_id", "project_id", "course_id", "event_id", "note"];

    public function year()
    {
        return $this->belongsTo('App\Year');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

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
