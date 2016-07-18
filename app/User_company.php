<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_company extends Model
{
    protected $table = 'user_company';
    protected $fillable = ['user_id', 'company_id'];
}
