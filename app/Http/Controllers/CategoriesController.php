<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        try {

            $this->authorize('view', new Category);

            return view('categories.index', ['categories' => Category::all()]);

        } catch (\Exception $ex){

            flash(MSG_WARNING . $ex->getMessage() )
                ->warning()
                ->important();

            return back();
        }
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Category);

        $request->validate(Category::getRules());

        try {

            $category = Category::create($request->all());

            flash(MSG_SUCCESS . "La categoría <strong>{$category->name}</strong> se creó correctamente")
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

    public function edit(Category $category)
    {
        try {

            $this->authorize('update', $category);

            return view('categories.edit', compact('category'));

        } catch(\Exception $ex) {

            flash(MSG_WARNING . $ex->getMessage())
                ->warning()
                ->important();

            return back();
        }
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $request->validate(Category::getRules());

        try {

            $category->update($request->all());

            flash(MSG_SUCCESS . "La categoría <strong>{$category->name}</strong> se modificó correctamente")
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

    public function destroy(Category $category)
    {
        try {

            $nombre = $category->name;

            if($category->products()->count() > 0)
                throw new \Exception('No se puede eliminar esta categoría porque se encuentra asignado en 1 o varios productos.');

            $category->delete();

            flash(MSG_SUCCESS . "Eliminaste Correctamente la categoría <strong>\"{$nombre}\"</strong>.")
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
