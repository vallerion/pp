<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class CodeController extends Controller {

    public static $activateUrl = '/activate/';

    public static function generateCode($length, $unique){

        $num = range(0, 9);
        $alf = range('a', 'z');
        $_alf = range('A', 'Z');
        $unique = str_split($unique);

        $symbols = array_merge($num, $alf, $_alf, $unique);
        shuffle($symbols);
        
        $code_array = array_slice($symbols, 0, (int)$length);
        $code = implode("", $code_array);

        return $code;
    }
}
