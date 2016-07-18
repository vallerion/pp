<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    public function __construct(){
        parent::__construct();

        $this->current_team_id = Session::get('current_team_id', 'none');
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
        return $this->belongsToMany('App\Company', 'user_company')->withPivot('user_group');
    }

    public function projects(){
        return $this->belongsToMany('App\Project', 'user_project')->withPivot('user_group');
    }

    public function teams(){
        return $this->belongsToMany('App\Team', 'user_team')->withPivot('user_group');
    }

    public function member_my_team(){
        $team = Team::where('id', $this->current_team_id)->first();
        return $team->users();
    }
}
