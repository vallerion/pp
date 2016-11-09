<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model {

    protected $primaryKey = 'code'; // for routing use Route::get('/activate/{code}' ...

    protected $table = 'codes';

    protected $fillable = ['user_id', 'code'];

}
