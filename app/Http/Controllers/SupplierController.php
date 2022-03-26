<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Heading;
use App\Models\Localidad;
use App\Models\Provincia;
use App\Models\Supplier;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Supplier::all();
            return response()->json($data, 200);
        }

        try {

            $this->authorize('view', new Supplier);

            return view('suppliers.index', [
                'provincias' => Provincia::all()->sortBy('nombre'),
                'headings' => Heading::all()
            ]);

        } catch (\Exception $ex) {

            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }

    public function list() {

        $data = Supplier::with('heading')->orderBy('razon_social');

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
                return (string) view('suppliers.tables.actions', ['supplier' => $b]);
            })
            ->rawColumns(['actions'])
            ->make();
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Supplier);

        try {

            $supplier = Supplier::create($request->all());

            flash(MSG_SUCCESS . "El Proveedor <strong>{$supplier->razon_social}</strong> se creó correctamente.")
                ->success()
                ->important();

            return redirect()
                ->route('admin.cuentas.edit', $supplier);

        } catch (\Exception $ex) {

            flash(MSG_ERROR . $ex->getMessage())
                ->error()
                ->important();

            return back();
        }
    }

    public function edit(Supplier $supplier)
    {
        try {

            $this->authorize('view', $supplier);

            $localidades = [];

            if ($supplier->provincia)
                $localidades = Localidad::whereProvinciaCodigo($supplier->provincia->codigo)->get();

            return view('suppliers.edit', [
                'users' => User::all(),
                'supplier' => $supplier,
                'headings' => Heading::all(),
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

    public function update(Request $request, Supplier $supplier)
    {
        $this->authorize('update', $supplier);

        try {

            $supplier->update($request->all());

            flash(MSG_SUCCESS . "El Proveedor <strong>{$supplier->razon_social}</strong> se actualizadó correctamente.")
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

    public function destroy(Supplier $supplier)
    {
        $this->authorize('delete', $supplier);

        try {

            $nombre = $supplier->razon_social;

            $supplier->delete();

            flash(MSG_SUCCESS . "El Proveedor <strong>{$nombre}</strong> se eliminó correctamente.")
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
}
