<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    const marks = [
        "dev" => "#3c8dbc",
        "test" => "#d84315",
        "design" => "#00695c"];

    protected $fillable = [
        'name', 'about', 'priority', 'mark', 'user_to_id', 'user_from_id', 'team_id'
    ];

    public function users_to(){
        return $this->belongsTo('App\User', 'user_to_id');
    }

    public function users_from(){
        return $this->belongsTo('App\User', 'user_from_id');
    }
}
