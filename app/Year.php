<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ["name", "note"];

    public function signup()
    {
        return $this->hasMany('App\Signup');
    }
}
