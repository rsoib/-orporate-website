<?php

namespace Corp\Policies;

use Corp\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function create(User $user){

        return $user->canDo('EDIT_USERS');
    }

    public function edit(User $user){

        return $user->canDo('EDIT_USERS');
    }

}
