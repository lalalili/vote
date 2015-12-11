<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ["name", "note"];

    public function signup()
    {
        return $this->hasMany('App\Signup');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
