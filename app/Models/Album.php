<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Album extends Model
{
    public $table = "albums";

    public $fillable = [
        "name",
        "type",
        "area",
        "path",
        "note"
    ];

    public function photo()
    {
        return $this->hasMany('App\Models\Photo');
    }

    public function vote()
    {
        return $this->hasManyThrough('App\Models\Vote', 'App\Models\Photo');
    }

    public function postvote()
    {
        return $this->hasManyThrough('App\Models\PostVote', 'App\Models\Photo', 'album_id', 'photo_id');
    }
}