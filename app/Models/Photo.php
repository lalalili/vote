<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Photo extends Model
{
    public $table = "photos";
    

    public $fillable = [
        "name",
        "title",
        "filename",
        "utf8_filename",
        "seq",
        "path",
        "is_display",
        "album_id"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "title" => "string",
        "filename" => "string",
        "utf8_filename" => "string",
        "seq" => "integer",
        "path" => "string",
        "is_display" => "boolean",
        "album_id" => "integer",
    ];

    public static $rules = [
        "name" => "required",
        "title" => "required",
//		"filename" => "required",
//		"utf8_filename" => "required",
//		"seq" => "required",
//		"path" => "required",
        "album_id" => "required"
    ];

    public function album()
    {
        return $this->belongsTo('App\Models\Album');
    }

    public function vote()
    {
        return $this->hasMany('App\Models\Vote');
    }

    public function title()
    {
        return $this->belongsTo('App\Models\Title');
    }
}
