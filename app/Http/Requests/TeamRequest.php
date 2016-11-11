<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Request;
use App\Team;

class TeamRequest extends Request {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        $team = $this->route('team');

        $user = Auth::user();

        $user = $team->users()->withPivot('user_id', 'user_group')->wherePivot('user_id', '=', $user->id)->first();

        if ( ! is_null($user))
            return true;
        else if ($team->visible == 1)
            return true;


        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        switch($this->method()) {

            case 'GET':
                return [];
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
                return [];
        }
    }
}
