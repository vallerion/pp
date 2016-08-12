<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskRequest extends Request
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
    public function rules()
    {

        switch ($this->method()){

            case 'GET':

                return [];

            case 'POST':

                return [
                    'name' => 'required|max:255',
                    'about' => 'max:2048',
                    'user_to_id' => 'required|integer|not_in:0',
                    'project_id' => 'integer|not_in:0'
                ];
        }
        
        

    }
}
