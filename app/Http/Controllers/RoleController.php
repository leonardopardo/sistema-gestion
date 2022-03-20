<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('view',new \App\Models\Role);

        return view('roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        try {

            $this->authorize('create', new \App\Models\Role);

            $group = array_unique(
                Permission::all()
                    ->pluck('group_name')
                    ->toArray()
            );

            return view('roles.create', [
                'permisos' => Permission::all(),
                'group' => $group
            ]);

        } catch (\Exception $ex){

            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }

    public function store(Request $request)
    {

        $this->authorize('create', new \App\Models\Role);

        try {

            $role = new Role;

            $role->name = trim($request->name);

            $role->save();

            $role->permissions()->detach();

            if ($request->has('permissions')) {
                $role->givePermissionTo($request->permissions);
            }

            flash(MSG_SUCCESS . "El Role <strong>{$role->name}</strong> se creó correctamente.")
                ->success()->important();

            return redirect()->route('admin.roles.edit', $role);

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();

        }
    }

    public function edit(Role $role)
    {
        try {

            $this->authorize('update',new \App\Models\Role);

            $group = array_unique(
                Permission::all()
                    ->pluck('group_name')
                    ->toArray()
            );

            return view('roles.edit', [
                'role' => $role,
                'group' => $group,
                'permisos' => Permission::all()
            ]);

        } catch (\Exception $ex) {

            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }

    public function update(Request $request, Role $role)
    {

        $this->authorize('update', new \App\Models\Role);

        try {

            $role->syncPermissions($request->permissions);

            flash(MSG_SUCCESS . "El role <strong>{$role->name}</strong> se actualizó correctamente.")
                ->success()
                ->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }
    }

    public function destroy(Role $role)
    {

        try {

            $this->authorize('delete',new \App\Models\Role);

            if ($role->id == 1)
                throw new \Exception("No se puede eliminar el rol SuperAdmin.");

            $name = $role->name;

            $role->permissions()->detach();

            $role->delete();

            flash(MSG_SUCCESS . "El role <strong>{$name}</strong> se eliminó correctamente.")
                ->success()
                ->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }
}
