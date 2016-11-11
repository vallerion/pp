<?php

namespace App\Http\Controllers\Validators;

use Validator;

class AuthValidator {

    public static function register(array $data) {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    public static function passwordReset(array $data) {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
        ]);
    }

    public static function login(array $data) {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
    }

}