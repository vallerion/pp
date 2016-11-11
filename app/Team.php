<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Http\Interfaces\UserRole;

class Team extends Model //implements UserRole
 {

    protected $table = 'teams';

    protected $fillable = [
        'name', 'about', 'image', 'visible'
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_team');
    }

    public function projects(){
        return $this->belongsToMany('App\Project', 'project_team');
    }
}
