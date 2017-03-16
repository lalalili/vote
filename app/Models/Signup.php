<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $fillable = ['photo_id', 'project_id', 'course_id', 'event_id', 'note'];


    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\NewEmployee', 'identity', 'identity');
    }
}
