<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\HeadingsCongroller;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RubrosController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

Route::auth();

Route::name('admin.')
    ->middleware(['auth', 'adminUser'])
    ->group(function () {

        Route::name('main.')
            ->group(function () {

                Route::get('/', [MainController::class, 'index'])
                    ->name('index');

                Route::get('/home', [MainController::class, 'index'])
                    ->name('index');
            });

        Route::name('invoice.')
            ->group(function(){

                Route::get('/', [InvoiceController::class, 'index'])
                    ->name('index');

            });

        Route::name('cuentas.')
            ->prefix('clientes')
            ->group(function () {

                Route::get('/', [CuentaController::class, 'index'])
                    ->name('index');

                Route::post('/', [CuentaController::class, 'store'])
                    ->name('store');

                Route::post('/lista', [CuentaController::class, 'list'])
                    ->name('list');

                Route::get('/editar/{cuenta}', [CuentaController::class, 'edit'])
                    ->name('edit');

                Route::post('/actualizar/{cuenta}', [CuentaController::class, 'update'])
                    ->name('update');

                Route::post('/{cuenta}', [CuentaController::class, 'destroy'])
                    ->name('delete');

                Route::post('/{cuenta}/usuarios/vincular', [CuentaController::class, 'attachUser'])
                    ->name('user.attach');

                Route::post('/{cuenta}/usuarios/desvincular', [CuentaController::class, 'detachUser'])
                    ->name('user.detach');

                Route::post('/{cuenta}/contacto/add', [CuentaController::class, 'addContact'])
                    ->name('contact.add');

                Route::post('/{contacto}/contacto/update', [CuentaController::class, 'updateContact'])
                    ->name('contact.update');

                Route::post('/{cuenta}/contacto/delete', [CuentaController::class, 'deleteContact'])
                    ->name('contact.delete');

            });

        Route::name('suppliers.')
            ->prefix('proveedores')
            ->group(function () {

                Route::get('/', [SupplierController::class, 'index'])
                    ->name('index');

                Route::post('/', [SupplierController::class, 'store'])
                    ->name('store');

                Route::post('/lista', [SupplierController::class, 'list'])
                    ->name('list');

                Route::get('/editar/{supplier}', [SupplierController::class, 'edit'])
                    ->name('edit');

                Route::post('/actualizar/{supplier}', [SupplierController::class, 'update'])
                    ->name('update');

                Route::post('/{supplier}', [SupplierController::class, 'destroy'])
                    ->name('delete');

            });

        Route::name('usuarios.')
            ->prefix('usuarios')
            ->group(function () {

                Route::get('/listar', [UserController::class, 'index'])
                    ->name('index');

                Route::post('/store', [UserController::class, 'store'])
                    ->name('store');

                Route::get('/editar/{user}', [UserController::class, 'edit'])
                    ->name('edit');

                Route::get('/ver/{user}', [UserController::class, 'show'])
                    ->name('show');

                Route::post('/actualizar/{user}', [UserController::class, 'update'])
                    ->name('update');

                Route::post('/borrar/{user}', [UserController::class, 'destroy'])
                    ->name('delete');
            });

        Route::name('roles.')
            ->prefix('roles')
            ->group(function () {

                Route::get('/', [RoleController::class, 'index'])
                    ->name('index');

                Route::post('/store', [RoleController::class, 'store'])
                    ->name('store');

                Route::get('/editar/{role}', [RoleController::class, 'edit'])
                    ->name('edit');

                Route::get('/create', [RoleController::class, 'create'])
                    ->name('create');

                Route::post('/actualizar/{role}', [RoleController::class, 'update'])
                    ->name('update');

                Route::post('/borrar/{role}', [RoleController::class, 'destroy'])
                    ->name('delete');
            });

        Route::name('localidades.')
            ->prefix('localidades')
            ->group(function () {

                Route::post('/async', [LocalidadController::class, 'getByParent'])
                    ->name('async');
            });

        Route::name('categories.')
            ->prefix('categorias')
            ->group(function(){

                Route::get('/', [CategoriesController::class, 'index'])
                    ->name('index');

                Route::post('/', [CategoriesController::class, 'store'])
                    ->name('store');

                Route::get('/editar/{category}', [CategoriesController::class, 'edit'])
                    ->name('edit');

                Route::post('/actualizar/{category}', [CategoriesController::class, 'update'])
                    ->name('update');

                Route::post('/eliminar/{category}', [CategoriesController::class, 'destroy'])
                    ->name('delete');

            });

        Route::name('headings.')
            ->prefix('rubros')
            ->group(function(){

                Route::get('/', [HeadingsCongroller::class, 'index'])
                    ->name('index');

                Route::post('/', [HeadingsCongroller::class, 'store'])
                    ->name('store');

                Route::get('/editar/{heading}', [HeadingsCongroller::class, 'edit'])
                    ->name('edit');

                Route::post('/actualizar/{heading}', [HeadingsCongroller::class, 'update'])
                    ->name('update');

                Route::post('/eliminar/{heading}', [HeadingsCongroller::class, 'destroy'])
                    ->name('delete');

            });

        Route::name('help.')
            ->group(function () {
                Route::get('/tutoriales', [HelpController::class, 'tutoriales'])
                    ->name('tutoriales');

                Route::get('/faqs', [HelpController::class, 'faqs'])
                    ->name('faqs');

                Route::get('/faqs/ver/{id}', [HelpController::class, 'faq'])
                    ->name('faqs.ver');

                Route::get('/tutoriales/ver/{id}', [HelpController::class, 'tutorial'])
                    ->name('tutoriales.ver');
            });

    });
