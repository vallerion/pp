<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model {

    protected $table = 'marks';

    public $timestamps = false;

    protected $fillable = [
        'name', 'color'
    ];
}
