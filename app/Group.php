<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ["name", "note"];

    public function signup()
    {
        return $this->hasMany('App\Signup');
    }
}
