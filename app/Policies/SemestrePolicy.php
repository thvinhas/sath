<?php

namespace App\Policies;

use App\User;
use App\Semestre;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemestrePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the semestre.
     *
     * @param  \App\User  $user
     * @param  \App\Semestre  $semestre
     * @return mixed
     */
    public function view(User $user, Semestre $semestre)
    {
        // Update $user authorization to view $semestre here.
        return true;
    }

    /**
     * Determine whether the user can create semestre.
     *
     * @param  \App\User  $user
     * @param  \App\Semestre  $semestre
     * @return mixed
     */
    public function create(User $user, Semestre $semestre)
    {
        // Update $user authorization to create $semestre here.
        return true;
    }

    /**
     * Determine whether the user can update the semestre.
     *
     * @param  \App\User  $user
     * @param  \App\Semestre  $semestre
     * @return mixed
     */
    public function update(User $user, Semestre $semestre)
    {
        // Update $user authorization to update $semestre here.
        return true;
    }

    /**
     * Determine whether the user can delete the semestre.
     *
     * @param  \App\User  $user
     * @param  \App\Semestre  $semestre
     * @return mixed
     */
    public function delete(User $user, Semestre $semestre)
    {
        // Update $user authorization to delete $semestre here.
        return true;
    }
}
