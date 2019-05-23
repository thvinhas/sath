<?php

namespace App\Policies;

use App\User;
use App\Turma;
use Illuminate\Auth\Access\HandlesAuthorization;

class TurmaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the turma.
     *
     * @param  \App\User  $user
     * @param  \App\Turma  $turma
     * @return mixed
     */
    public function view(User $user, Turma $turma)
    {
        // Update $user authorization to view $turma here.
        return true;
    }

    /**
     * Determine whether the user can create turma.
     *
     * @param  \App\User  $user
     * @param  \App\Turma  $turma
     * @return mixed
     */
    public function create(User $user, Turma $turma)
    {
        // Update $user authorization to create $turma here.
        return true;
    }

    /**
     * Determine whether the user can update the turma.
     *
     * @param  \App\User  $user
     * @param  \App\Turma  $turma
     * @return mixed
     */
    public function update(User $user, Turma $turma)
    {
        // Update $user authorization to update $turma here.
        return true;
    }

    /**
     * Determine whether the user can delete the turma.
     *
     * @param  \App\User  $user
     * @param  \App\Turma  $turma
     * @return mixed
     */
    public function delete(User $user, Turma $turma)
    {
        // Update $user authorization to delete $turma here.
        return true;
    }
}
