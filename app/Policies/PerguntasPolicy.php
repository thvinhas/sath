<?php

namespace App\Policies;

use App\User;
use App\Perguntas;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerguntasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the perguntas.
     *
     * @param  \App\User  $user
     * @param  \App\Perguntas  $perguntas
     * @return mixed
     */
    public function view(User $user, Perguntas $perguntas)
    {
        // Update $user authorization to view $perguntas here.
        return true;
    }

    /**
     * Determine whether the user can create perguntas.
     *
     * @param  \App\User  $user
     * @param  \App\Perguntas  $perguntas
     * @return mixed
     */
    public function create(User $user, Perguntas $perguntas)
    {
        // Update $user authorization to create $perguntas here.
        return true;
    }

    /**
     * Determine whether the user can update the perguntas.
     *
     * @param  \App\User  $user
     * @param  \App\Perguntas  $perguntas
     * @return mixed
     */
    public function update(User $user, Perguntas $perguntas)
    {
        // Update $user authorization to update $perguntas here.
        return true;
    }

    /**
     * Determine whether the user can delete the perguntas.
     *
     * @param  \App\User  $user
     * @param  \App\Perguntas  $perguntas
     * @return mixed
     */
    public function delete(User $user, Perguntas $perguntas)
    {
        // Update $user authorization to delete $perguntas here.
        return true;
    }
}
