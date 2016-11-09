<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        switch($this->method()) {

            case 'GET':
            case 'DELETE':
                return [];

            case 'POST':
//                return [];
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6'
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|max:255'
                ];

            default:
                return [];
        }
    }

    public function messages() {
        return [
            'email.required' => 'message'
        ];
    }

    protected function formatErrors(Validator $validator) {

//        dd($validator->errors()->all());

        return $validator->errors()->all();
    }
}
