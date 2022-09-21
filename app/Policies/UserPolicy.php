<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $project
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $user2)
    {
        if($user->admin){
            return Response::allow();
        }
        return $user->id === $user2->id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
