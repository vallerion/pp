<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
//    protected $fillable = ['user_id', 'code'];

    protected $fillable = [
        'name', 'about', 'image'
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_company');
    }
}
