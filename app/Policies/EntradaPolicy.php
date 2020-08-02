<?php

namespace App\Policies;

use App\Models\Entrada;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntradaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Entrada  $entrada
     * @return mixed
     */
    public function view(User $user, Entrada $entrada)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Entrada  $entrada
     * @return mixed
     */
    public function update(User $user, Entrada $entrada)
    {
              return $user->id == $entrada->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Entrada  $entrada
     * @return mixed
     */
    public function delete(User $user, Entrada $entrada)
    {
       /*Si el Id de ese User que estoy recibiendo es igual al User id de la Entrada
       Significa que el usuario si puede eliminar esa entrada
      me retorna un True.
      si el usuario no es igual retorna un falase
       */
        return $user->id == $entrada->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Entrada  $entrada
     * @return mixed
     */
    public function restore(User $user, Entrada $entrada)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Entrada  $entrada
     * @return mixed
     */
    public function forceDelete(User $user, Entrada $entrada)
    {
        //
    }
}
