<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        "photo_id",
        "identity",
        "gender",
        "birth_year",
        "type",
        "level",
        "background",
        "mobile",
        "food",
        "emp_id",
        "group",
        "note1",
        "note2",
        "note3",
        "note4",
        "note5",
        "tax_id",
        "duty_day"
    ];


    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }
}
