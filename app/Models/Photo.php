<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $table = "photos";
    public $fillable = [
        "name",
        "album_id",
        "title_id",
        "filename",
        "utf8_filename",
        "seq",
        "path",
        "is_display",
    ];

    public function album()
    {
        return $this->belongsTo('App\Models\Album');
    }

    public function title()
    {
        return $this->belongsTo('App\Models\Title');
    }

    public function vote()
    {
        return $this->hasMany('App\Models\Vote');
    }

    public function postvote()
    {
        return $this->hasMany('App\Models\PostVote', 'id', 'photo_id');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function signup()
    {
        return $this->hasMany('App\Models\Signup');
    }

    public function touch()
    {
        return $this->hasMany('App\Models\Touch');
    }
}
