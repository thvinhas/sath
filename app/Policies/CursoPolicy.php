<?php

namespace App\Policies;

use App\User;
use App\Curso;
use Illuminate\Auth\Access\HandlesAuthorization;

class CursoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function view(User $user, Curso $curso)
    {
        // Update $user authorization to view $curso here.
        return true;
    }

    /**
     * Determine whether the user can create curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function create(User $user, Curso $curso)
    {
        // Update $user authorization to create $curso here.
        return true;
    }

    /**
     * Determine whether the user can update the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function update(User $user, Curso $curso)
    {
        // Update $user authorization to update $curso here.
        return true;
    }

    /**
     * Determine whether the user can delete the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function delete(User $user, Curso $curso)
    {
        // Update $user authorization to delete $curso here.
        return true;
    }
}
