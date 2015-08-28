<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable = ["album_id", "album_name", "photo_id", "photo_name", "count", "rank"];
}
