<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ["name", "area", "course_id", "number", "event_at", "hour", "note"];

    public function signup()
    {
        return $this->hasMany('App\Models\Signup');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
