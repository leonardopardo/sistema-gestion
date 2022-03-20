<?php

namespace App\Policies;

use App\Models\Cuenta;
use App\Traits\SuperAdminPolicy;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CuentaPolicy
{
    use HandlesAuthorization, SuperAdminPolicy;

    /**
     * Determine whether the user can view any beneficiarios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the beneficiario.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenta  $cuenta
     * @return mixed
     */
    public function view(User $user, Cuenta $cuenta)
    {
        return $user->hasPermissionTo('cuenta.index');
    }

    /**
     * determinan si se pueden crear usuarios en la cuenta.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenta  $cuenta
     * @return mixed
     */
    public function adminUser(User $user, Cuenta $cuenta)
    {
        return $user->hasPermissionTo('cuenta.users');
    }

    /**
     * determinan si se pueden crear usuarios en la cuenta.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenta  $cuenta
     * @return mixed
     */
    public function adminContacts(User $user, Cuenta $cuenta)
    {
        return $user->hasPermissionTo('cuenta.contacts');
    }

    /**
     * Determine whether the user can create beneficiarios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('cuenta.create');
    }

    /**
     * Determine whether the user can update the beneficiario.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenta  $cuenta
     * @return mixed
     */
    public function update(User $user, Cuenta $cuenta)
    {
        return $user->hasPermissionTo('cuenta.edit');
    }

    /**
     * Determine whether the user can delete the beneficiario.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenta  $cuenta
     * @return mixed
     */
    public function delete(User $user, Cuenta $cuenta)
    {
        return $user->hasPermissionTo('cuenta.delete');
    }

    /**
     * Determine whether the user can restore the beneficiario.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenta  $cuenta
     * @return mixed
     */
    public function restore(User $user, Cuenta $cuenta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the beneficiario.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenta  $cuenta
     * @return mixed
     */
    public function forceDelete(User $user, Cuenta $cuenta)
    {
        //
    }
}
