<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    public static $rules = [
        "name"     => "required",
        "phone"    => "required",
        "q1"       => "required",
        "q2"       => "required",
        "q3"       => "required",
        "photo_id" => "required",
        "album_id" => "required"
    ];
    public $table = "post_votes";
    public $timestamps = false;
    public $fillable = [
        "name",
        "phone",
        "q1",
        "q2",
        "q3",
        "note1",
        "note2",
        "photo_id",
        "album_id"
    ];
    protected $appends = ['album'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name"  => "string",
        "phone" => "string",
        "q1"    => "boolean",
        "q2"    => "boolean",
        "q3"    => "boolean",
        "note1" => "string",
        "note2" => "string"
    ];

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo', 'photo_id', 'id');
    }

    public function getAlbumAttribute()
    {
        //dd($this->photo->album['name']);
        return $this->photo->album['name'];
    }
}
