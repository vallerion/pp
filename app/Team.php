<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'user_team');
    }
}
