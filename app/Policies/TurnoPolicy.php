<?php

namespace App\Policies;

use App\User;
use App\Turno;
use Illuminate\Auth\Access\HandlesAuthorization;

class TurnoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the turno.
     *
     * @param  \App\User  $user
     * @param  \App\Turno  $turno
     * @return mixed
     */
    public function view(User $user, Turno $turno)
    {
        // Update $user authorization to view $turno here.
        return true;
    }

    /**
     * Determine whether the user can create turno.
     *
     * @param  \App\User  $user
     * @param  \App\Turno  $turno
     * @return mixed
     */
    public function create(User $user, Turno $turno)
    {
        // Update $user authorization to create $turno here.
        return true;
    }

    /**
     * Determine whether the user can update the turno.
     *
     * @param  \App\User  $user
     * @param  \App\Turno  $turno
     * @return mixed
     */
    public function update(User $user, Turno $turno)
    {
        // Update $user authorization to update $turno here.
        return true;
    }

    /**
     * Determine whether the user can delete the turno.
     *
     * @param  \App\User  $user
     * @param  \App\Turno  $turno
     * @return mixed
     */
    public function delete(User $user, Turno $turno)
    {
        // Update $user authorization to delete $turno here.
        return true;
    }
}
