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
}
