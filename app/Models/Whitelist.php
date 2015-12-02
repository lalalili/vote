<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    public $table = "whitelists";


    public $fillable = [
        "name",
        "phone"
    ];
}
