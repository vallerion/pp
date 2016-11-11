<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\UserRole;

class Project extends Model implements UserRole
{
    protected $table = 'projects';

    protected $fillable = [
        'name', 'about', 'image', 'visible'
    ];
    


    public function users(){
        return $this->belongsToMany('App\User', 'user_project');
    }

    public function teams(){
        return $this->belongsToMany('App\Team', 'project_team');
    }

    public function tasks(){
        return $this->hasMany('App\Task', 'project_id');
    }
}
