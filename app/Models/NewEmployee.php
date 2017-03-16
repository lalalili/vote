<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewEmployee extends Model
{
    protected $primaryKey = 'identity'; // or null
    public $incrementing = false;
    protected $fillable = [
        "identity",
        "area",
        "type",
        "location",
        "title",
        "emp_id",
        "name",
        "gender",
        "birth_year",
        "type",
        "level",
        "background",
        "mobile",
        "food",
        "group",
        "tax_id",
        "duty_date",
        "note1",
        "note2",
        "note3",
        "note4",
        "note5",
    ];
}
