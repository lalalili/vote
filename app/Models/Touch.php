<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Touch extends Model
{
    public $table = "touches";
    public $fillable = [
        "name",
        "photo_id",
        "filename",
        "utf8_filename",
        "seq",
        "path",
        "is_display",
    ];

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }
}
