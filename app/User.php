<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;
//use App\Http\Requests\Request;
use Cookie;

class User extends Authenticatable {

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

    public static function create (array $data = []) {
        return parent::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'image' => '/img/user_avatars/' .rand(1, 3). '.png',
        ]);
    }

//    public function company(){
//        return $this->belongsToMany(Company::class, 'user_company')->withPivot('user_group');
//    }
//
//    public function projects(){
//        return $this->belongsToMany(Project::class, 'user_project')->withPivot('user_group');
//    }
//
//    public function privilegesProjects(){
//        return $this->belongsToMany(Project::class, 'user_project')->withPivot('user_group')->wherePivotIn('user_group', ['author']);
//    }
//
//    public function teams(){
//        return $this->belongsToMany(Team::class, 'user_team')->withPivot('user_group');
//    }
//
//    public function privilegesTeams(){
//        return $this->belongsToMany(Team::class, 'user_team')->withPivot('user_group')->wherePivotIn('user_group', ['author']);
//    }
//
//    public function tasks(){
//        return $this->hasMany(Task::class, 'user_to_id');
//    }
//
////    public function tasks_in_project($project_id){
////        return $this->hasMany(Task::class, 'user_to_id')->where('project_id', $project_id);
////    }
//
//    public function member_my_team(){
//        $team = Team::where('id', $this->current_team_id)->first();
//        return $team->users();
//    }
}
