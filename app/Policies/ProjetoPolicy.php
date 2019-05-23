<?php

namespace App\Policies;

use App\User;
use App\Projeto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjetoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the projeto.
     *
     * @param  \App\User  $user
     * @param  \App\Projeto  $projeto
     * @return mixed
     */
    public function view(User $user, Projeto $projeto)
    {
        // Update $user authorization to view $projeto here.
        return true;
    }

    /**
     * Determine whether the user can create projeto.
     *
     * @param  \App\User  $user
     * @param  \App\Projeto  $projeto
     * @return mixed
     */
    public function create(User $user, Projeto $projeto)
    {
        // Update $user authorization to create $projeto here.
        return true;
    }

    /**
     * Determine whether the user can update the projeto.
     *
     * @param  \App\User  $user
     * @param  \App\Projeto  $projeto
     * @return mixed
     */
    public function update(User $user, Projeto $projeto)
    {
        // Update $user authorization to update $projeto here.
        return true;
    }

    /**
     * Determine whether the user can delete the projeto.
     *
     * @param  \App\User  $user
     * @param  \App\Projeto  $projeto
     * @return mixed
     */
    public function delete(User $user, Projeto $projeto)
    {
        // Update $user authorization to delete $projeto here.
        return true;
    }
}
