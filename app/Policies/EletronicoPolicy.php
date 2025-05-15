<?php

namespace App\Policies;

use App\Models\Eletronico;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EletronicoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('eletronico acessar');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Eletronico $eletronico): bool
    {
        return $user->can('acessar_eletronico');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('criar_eletronico');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Eletronico $eletronico): bool
    {
        return $user->can('editar_eletronico');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Eletronico $eletronico): bool
    {
        return $user->can('apagar_eletronico');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Eletronico $eletronico): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Eletronico $eletronico): bool
    {
        return false;
    }
}
