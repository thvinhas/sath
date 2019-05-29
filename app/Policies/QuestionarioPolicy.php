<?php

namespace App\Policies;

use App\User;
use App\Questionario;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the questionario.
     *
     * @param  \App\User  $user
     * @param  \App\Questionario  $questionario
     * @return mixed
     */
    public function view(User $user, Questionario $questionario)
    {
        // Update $user authorization to view $questionario here.
        return true;
    }

    /**
     * Determine whether the user can create questionario.
     *
     * @param  \App\User  $user
     * @param  \App\Questionario  $questionario
     * @return mixed
     */
    public function create(User $user, Questionario $questionario)
    {
        // Update $user authorization to create $questionario here.
        return true;
    }

    /**
     * Determine whether the user can update the questionario.
     *
     * @param  \App\User  $user
     * @param  \App\Questionario  $questionario
     * @return mixed
     */
    public function update(User $user, Questionario $questionario)
    {
        // Update $user authorization to update $questionario here.
        return true;
    }

    /**
     * Determine whether the user can delete the questionario.
     *
     * @param  \App\User  $user
     * @param  \App\Questionario  $questionario
     * @return mixed
     */
    public function delete(User $user, Questionario $questionario)
    {
        // Update $user authorization to delete $questionario here.
        return true;
    }
}
