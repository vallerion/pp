<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TeamRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
                return [
                    'id' => 'required|integer'
                ];

            case 'POST':
                return [
                    'name' => 'required|max:255',
                    'about' => 'max:1024'
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|max:255',
                    'about' => 'max:1024'
                ];

            default:
                break;
        }
    }
}
