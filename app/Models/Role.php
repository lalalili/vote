<?php namespace app\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ["name", "note"];

    public function signup()
    {
        return $this->hasMany('App\Models\Signup');
    }
}
