<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class PostSummary extends Model
{
    public $table = "post_summaries";
    protected $fillable = ["album_id", "album_name", "photo_id", "photo_name", "count", "rank"];
}
