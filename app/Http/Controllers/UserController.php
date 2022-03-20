<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUsuariosStore;
use App\Http\Requests\RequestUsuariosUpdate;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view', new User);

        $users = User::all();
        return view('usuarios.index', compact(
            'users',
        ));
    }

    public function store(RequestUsuariosStore $request)
    {
        $this->authorize('create', new User);

        try
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $message = "El usuario {$user->name} ha sido creado con éxito.
                        Asignale roles o permisos para usar el sistema en caso de que sea administrador. <br>
                        Tome nota de la contraseña la misma no se volverá a mostrar.
                        Contraseña: <strong>{$request->password}</strong>";

            flash(MSG_SUCCESS . $message)
                ->success()
                ->important();

            return redirect()
                ->route('admin.usuarios.edit', $user);

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }

    }

    public function edit(User $user)
    {
        try
        {
            if(!$user->is(\auth()->user()))
                $this->authorize('update', $user);

            return view('usuarios.editar', [
                'permissions' => Permission::all(),
                'roles' => Role::all(),
                'user' => $user,
            ]);

        } catch (\Exception $ex) {
            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }

    public function update(RequestUsuariosUpdate $request, User $user)
    {

        try
        {
            if(!$user->is(\auth()->user())) {

                $this->authorize('update', $user);

                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];

                if ($request->filled('password')) {
                    $data['password'] = Hash::make($request->password);
                }

                $user->update($data);

                $user->syncRoles($request->roles);

                flash(MSG_SUCCESS . "El usuario << <strong>{$user->email}</strong> >> se actualizó correctamente.")
                    ->success()
                    ->important();

            } else {

                if ($request->filled('password')) {

                    $data['password'] = Hash::make($request->password);

                    $user->update($data);

                    flash(MSG_SUCCESS . "El usuario << <strong>{$user->email}</strong> >> actualizó correctamente sus contraseñas.")
                        ->success()
                        ->important();

                } else {

                    flash("<strong>Atención!</strong> El usuario << <strong>{$user->email}</strong> >> no realizó ninguna modificación.")
                        ->info()
                        ->important();

                }
            }

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        try
        {
            if ($user->hasRole('SuperAdmin') && !Auth::user()->hasRole('SuperAdmin')) {
                flash("No se puede eliminar a un SuperAdmin a menos que tengas el mismo rol.")
                    ->warning()
                    ->important();

            } else {

                $user->delete();

                flash(MSG_SUCCESS . "El usuario << <strong>{$user->name}</strong> >> se eliminó correctamente.")
                    ->success()
                    ->important();
            }

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }
    }

    public function restore($id)
    {
        try
        {
            User::withTrashed()
                ->where('id', $id)
                ->restore();

            flash(MSG_SUCCESS . "El usuario se restaruró correctamente.")
                ->success()
                ->important();

            return back();

        } catch (\Exception $ex) {

            flash(MGS_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }
    }
}
