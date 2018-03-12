<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relationsships
    public function projects()
    {
      return $this->belongsToMany('App\Project');
    }




    //Accessors
    public function getListOfProjectsAttribute()
    {
      if ($this->role == 1)
        return $this->projects;
        
      return Project::all();
    }



    public function getIsAdminAttribute()
    {
      return $this->role == 0;
    }

    public function getIsClientAttribute()
    {
      return $this->role == 2;

    }
}
