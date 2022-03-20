@extends('layouts.base.app', [
    'components' => ['select2']
])

@section('title', 'Cuentas')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Cuentas',
        'icon' => 'icon-globe',
        'crumbs' => [
            ['route' => route('admin.cuentas.index'), 'icon' => 'icon-globe', 'text' => 'Cuentas'],
            ['route' => route('admin.cuentas.edit', $cuenta), 'text' => $cuenta->razon_social ],
        ]
    ])
@endsection

@push('styles')
    <style type="text/css">
        .flat{
            box-shadow: none;
        }
    </style>
@endpush

@section('content')
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ route('admin.cuentas.index') }}" class="btn btn-primary">
                <i class="icon-arrow-left"></i> Ir a Listado de Cuentas
            </a>
        </div>
        <div class="col-12">
            @include('flash::message')
        </div>
        <div class="col-md-9">
            <div class="card shadow-none">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            <strong>{{ $cuenta->razon_social }}</strong>
                        </div>
                        <div class="card-tools">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-5">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-pills nav-primary mt--3" id="pills-tab" role="tablist">
                                <li class="nav-item submenu">
                                    <a class="nav-link active" id="pills-carpetas-tab" data-toggle="pill" href="#pills-carpetas" role="tab" aria-controls="pills-carpetas" aria-selected="false">
                                        <i class="fa fa-folder-open"></i> Carpetas
                                    </a>
                                </li>

                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-contactos-tab" data-toggle="pill" href="#pills-contactos" role="tab" aria-controls="pills-contactos" aria-selected="false">
                                        <i class="icon-call-out"></i> Contactos
                                    </a>
                                </li>

                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-usuarios-tab" data-toggle="pill" href="#pills-usuarios" role="tab" aria-controls="pills-usuarios" aria-selected="false">
                                        <i class="icon-people"></i> Usuarios Externos
                                    </a>
                                </li>

                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-datos-tab" data-toggle="pill" href="#pills-datos" role="tab" aria-controls="pills-datos" aria-selected="false">
                                        <i class="icon-information"></i> Información de la Cuenta
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div role="tabpanel" class="tab-pane fade active show" id="pills-carpetas"  aria-labelledby="pills-carpetas-tab">
                                    <div class="row">
                                        @can('create', new \App\Models\Carpeta)
                                        <div class="col-12 mb-2">
                                            <a href="{{route('admin.carpetas.create', ['cuenta_id' => $cuenta->id])}}" class="btn btn-outline-primary btn-sm">
                                                <i class="icon-folder-alt mr-2"></i> Crear nueva carpeta
                                            </a>
                                        </div>
                                        @endcan
                                        @forelse($cuenta->carpetas as $carpeta)
                                            <div class="col-sm-12 col-md-4">
                                                @include('carpetas.shows.client', ['carpeta' => $carpeta])
                                            </div>
                                        @empty
                                            <div class="col-sm-12">
                                                <p class="large text-muted">-- No existen carpetas para esta cuenta --</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="pills-datos"  aria-labelledby="pills-datos-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('cuentas.forms.update', ['paises' => $paises])
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="pills-usuarios"  aria-labelledby="pills-usuarios-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('cuentas.tables.users')
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="pills-contactos"  aria-labelledby="pills-contactos-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('cuentas.tables.contactos')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            {{ ModelNotes::card($cuenta) }}
        </div>
    </div>
</div>
@include('cuentas.modals.carpetas.delete')
@endsection

@push('scripts')
    @if(App\Models\Carpeta::showModal($errors))
        <script>
            jQuery(document).ready(function($){
                $('#modal-create-cuenta').modal('show');
            });
        </script>
    @endif
    @if(App\User::showModal($errors))
        <script>
            jQuery(document).ready(function($){
                $('#modalNewUser').modal('show');
            });
        </script>
    @endif
@endpush
