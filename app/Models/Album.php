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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "note" => "string"
    ];

    public static $rules = [
        "name" => "required"
    ];

    public function photo()
    {
        return $this->hasMany('App\Models\Photo');
    }

    public function vote()
    {
        return $this->hasManyThrough('App\Models\Vote', 'App\Models\Photo');
    }
}
