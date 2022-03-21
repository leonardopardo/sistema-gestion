<?php

namespace App\Policies;

use App\Models\Supplier;
use App\Traits\SuperAdminPolicy;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierPolicy
{
    use HandlesAuthorization, SuperAdminPolicy;

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
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function view(User $user, Supplier $supplier)
    {
        return $user->hasPermissionTo('supplier.index');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('supplier.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function update(User $user, Supplier $supplier)
    {
        return $user->hasPermissionTo('supplier.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('supplier.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function restore(User $user, Supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function forceDelete(User $user, Supplier $supplier)
    {
        //
    }
}
