<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name', 'about', 'image', 'visible'
    ];
    


    public function users(){
        return $this->belongsToMany('App\User', 'user_project');
    }

    public function teams(){
        return $this->belongsToMany('App\Team', 'company_team_project');
    }

    public function tasks(){
        return $this->hasMany('App\Task', 'project_id');
    }
}
