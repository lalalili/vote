<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = ["name", "note"];

    public function photo()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
