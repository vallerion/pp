<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Team;
use App\User;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {

    }

    public function update(User $user, Team $team) {

//        $tt = $team->users()->withPivot('user_group')->wherePivotIn('user_group', [ 'author' ])->where('id', '=', $user->id)->first();

//        dd($tt);

        return true;
    }
}
