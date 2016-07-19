<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name', 'about', 'image', 'visible'
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_team');
    }
}
