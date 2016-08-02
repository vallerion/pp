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

    const priority = ["",
        "#424242", "#455a64",
        "#824444", "#0091ea",
        "#827717", "#00c853",
        "#ff6d00", "#e65100",
        "#ff5722", "#d50000"];

    protected $fillable = [
        'name', 'about', 'priority', 'mark', 'user_to_id', 'user_from_id', 'project_id'
    ];

    public function user_to(){
        return $this->belongsTo('App\User', 'user_to_id');
    }

    public function user_from(){
        return $this->belongsTo('App\User', 'user_from_id');
    }

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function getMark(){
        return empty($this->mark) ? [] : explode(",", $this->mark);
    }
}
