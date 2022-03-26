<?php

namespace App\Http\Controllers;

use App\Models\Heading;
use Illuminate\Http\Request;

class HeadingsCongroller extends Controller
{
    public function index()
    {
        try {

            $this->authorize('view', new Heading);

            return view('headings.index', ['headings' => Heading::all()]);

        } catch (\Exception $ex){

            flash(MSG_WARNING . $ex->getMessage() )
                ->warning()
                ->important();

            return back();
        }
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Heading);

        $request->validate(Heading::getRules());

        try {

            $heading = Heading::create($request->all());

            flash(MSG_SUCCESS . "El rubro <strong>{$heading->name}</strong> se creó correctamente")
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

    public function edit(Heading $heading)
    {
        try {

            $this->authorize('update', $heading);

            return view('headings.edit', compact('heading'));

        } catch(\Exception $ex) {

            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }

    public function update(Request $request, Heading $heading)
    {
        $this->authorize('update', $heading);

        $request->validate(Heading::getRules());

        try {

            $heading->update($request->all());

            flash(MSG_SUCCESS . "El Rubro <strong>{$heading->name}</strong> se modificó correctamente")
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

    public function destroy(Heading $heading)
    {
        try {

            $nombre = $heading->name;

            if($heading->suppliers()->count() > 0)
                throw new \Exception('No se puede eliminar este rubro porque se encuentra asignado en 1 o varios proveedores.');

            $heading->delete();

            flash(MSG_SUCCESS . "Eliminaste Correctamente el rubro <strong>\"{$nombre}\"</strong>.")
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
}
