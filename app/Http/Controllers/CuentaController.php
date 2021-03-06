<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuentaStoreRequest;
use App\Http\Requests\CuentaUpdateRequest;
use App\Http\Requests\RequestUsuariosStore;
use App\Models\Contacto;
use App\Models\Cuenta;
use App\Models\Localidad;
use App\Models\Pais;
use App\Models\Provincia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CuentaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Cuenta::with('cuentas')->get();
            return response()->json($data, 200);
        }

        try {

            $this->authorize('view', new Cuenta);

            return view('cuentas.index', [
                'provincias' => Provincia::all()->sortBy('nombre'),
            ]);

        } catch (\Exception $ex) {

            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }

    function list() {
        $data = Cuenta::all();

        return DataTables::of($data)
            ->editColumn('telefono', function ($data) {
                return is_null($data->telefono) || empty($data->telefono)
                ? no_data()
                : $data->telefono;
            })
            ->editColumn('email', function ($data) {
                return is_null($data->email) || empty($data->email)
                ? no_data()
                : $data->email;
            })
            ->editColumn('provincia_id', function ($data) {
                return is_null($data->provincia)
                ? no_data()
                : $data->provincia->nombre;
            })
            ->editColumn('localidad_id', function ($data) {
                return is_null($data->localidad)
                ? no_data()
                : $data->localidad->nombre;
            })
            ->addColumn('actions', function ($b) {
                return (string) view('cuentas.tables.actions', ['cuenta' => $b]);
            })
            ->rawColumns(['actions'])
            ->make();
    }

    public function store(CuentaStoreRequest $request)
    {
        $this->authorize('create', new Cuenta);

        try {

            $cuenta = Cuenta::create($request->all());

            flash(MSG_SUCCESS . "La cuenta <strong>{$cuenta->razon_social}</strong> se cre?? correctamente.")
                ->success()
                ->important();

            return redirect()
                ->route('admin.cuentas.edit', $cuenta);

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }
    }

    public function edit(Cuenta $cuenta)
    {
        try {

            $this->authorize('view', $cuenta);

            $localidades = [];

            if ($cuenta->provincia)
                $localidades = Localidad::whereProvinciaCodigo($cuenta->provincia->codigo)->get();

            return view('cuentas.edit', [
                'users' => User::all(),
                'cuenta' => $cuenta,
                'provincias' => Provincia::all(),
                'localidades' => $localidades,
            ]);

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }
    }

    public function update(CuentaUpdateRequest $request, Cuenta $cuenta)
    {
        $this->authorize('update', $cuenta);

        try {

            $cuenta->update($request->all());

            flash(MSG_SUCCESS . "La cuenta <strong>{$cuenta->razon_social}</strong> se actualizad?? correctamente.")
                ->success()
                ->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back()
                ->withInput(Request::all());
        }
    }

    public function destroy(Cuenta $cuenta)
    {
        $this->authorize('delete', $cuenta);

        try {

            $nombre = $cuenta->razon_social;

            $cuenta->delete();

            flash(MSG_SUCCESS . "La cuenta <strong>{$nombre}</strong> se elimin?? correctamente.")
                ->success()
                ->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back()->withInput(Request::all());
        }
    }

    public function attachUser(Request $request, Cuenta $cuenta)
    {
        try {
            if ($request->userExist) {
                $user = User::find($request->user);
            } else {
                $request->validate(User::getRules());
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }

            $cuenta->users()->attach($user->id);

            flash(MSG_SUCCESS . "El usuarios {$user->email} se agreg?? correctamente.")
                ->success()->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()->important();

            return back()->withInput(\request()->all());
        }
    }

    public function detachUser(Request $request, Cuenta $cuenta)
    {
        try {

            $user = User::find($request->userId);

            $cuenta
                ->users()
                ->detach($request->userId);

            flash(MSG_SUCCESS . "El usuarios {$user->email} se desvincul?? correctamente.")
                ->success()->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()->important();

            return back()->withInput(Request::all());
        }
    }

    public function addContact(Request $request, Cuenta $cuenta)
    {
        $this->validate($request, [
            'name' => 'required | max:100',
            'lastname' => 'required | max:100',
            'email' => 'required | max:100 | email',
            'phone' => 'required | max:100',
            'notes' => 'required | max:200',
        ]);

        try {

            $contacto = Contacto::create([
                'cuenta_id' => $cuenta->id,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'notes' => $request->notes,
            ]);

            flash(MSG_SUCCESS . "El contacto <strong>{$contacto->name} {$contacto->lastname}</strong> se agend?? correctamente.")
                ->success()->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()->important();

            return back();
        }
    }

    public function updateContact(Request $request, Contacto $contacto)
    {
        $this->validate($request, [
            'name' => 'required | max:100',
            'lastname' => 'required | max:100',
            'email' => 'required | max:100 | email',
            'phone' => 'required | max:100',
            'notes' => 'required | max:200',
        ]);

        try {

            $contacto->name = $request->name;
            $contacto->lastname = $request->lastname;
            $contacto->phone = $request->phone;
            $contacto->email = $request->email;
            $contacto->notes = $request->notes;

            $contacto->update();

            flash(MSG_SUCCESS . "El contacto se actualiz?? correctamente.")
                ->success()->important();

            return back();

        } catch (\Exception $ex) {
            flash(MSG_ERROR . $ex->getMessage())
                ->error()->important();
            return back();
        }
    }

    public function deleteContact(Request $request, Cuenta $cuenta)
    {
        try {

            $contacto = Contacto::where('cuenta_id', $cuenta->id)
                ->where('id', $request->contact)
                ->first();

            $contacto->delete();

            flash(MSG_SUCCESS . "El contacto <strong>{$contacto->name} {$contacto->lastname}</strong> se elimin?? correctamente.")
                ->success()->important();

            return back();

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()->important();

            return back();
        }
    }
}
