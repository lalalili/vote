<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    public $table = "whitelists";
    protected $fillable = ["name", "phone"];
}
