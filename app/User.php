<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;
//use App\Http\Requests\Request;
use Cookie;

class User extends Authenticatable
{
    public function __construct($data = []){
        parent::__construct($data);

//        $this->current_team_id = Session::get('current_team_id', 'none');
        $this->current_team_id = Cookie::get('current_team_id', 'none');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activated', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public $current_team_id;

    public function company(){
        return $this->belongsToMany(Company::class, 'user_company')->withPivot('user_group');
    }

    public function projects(){
        return $this->belongsToMany(Project::class, 'user_project')->withPivot('user_group');
    }

    public function privilegesProjects(){
        return $this->belongsToMany(Project::class, 'user_project')->withPivot('user_group')->wherePivotIn('user_group', ['author']);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'user_team')->withPivot('user_group');
    }

    public function privilegesTeams(){
        return $this->belongsToMany(Team::class, 'user_team')->withPivot('user_group')->wherePivotIn('user_group', ['author']);
    }

    public function tasks(){
        return $this->hasMany(Task::class, 'user_to_id');
    }

//    public function tasks_in_project($project_id){
//        return $this->hasMany(Task::class, 'user_to_id')->where('project_id', $project_id);
//    }

    public function member_my_team(){
        $team = Team::where('id', $this->current_team_id)->first();
        return $team->users();
    }
}
