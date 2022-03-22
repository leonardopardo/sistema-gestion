@extends('layouts.base.app', [
    'components' => ['select2']
])

@section('title', 'Proveedores')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Proveedores',
        'icon' => 'icon-globe',
        'crumbs' => [
            ['route' => route('admin.suppliers.index'), 'icon' => 'icon-globe', 'text' => 'Proveedores'],
            ['route' => route('admin.suppliers.edit', $supplier), 'text' => $supplier->razon_social ],
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
            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-primary">
                <i class="icon-arrow-left"></i> Ir a Listado de Proveedores
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
                            <strong>{{ $supplier->razon_social }}</strong>
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
                                    <a class="nav-link active" id="pills-compras-tab" data-toggle="pill" href="#pills-compras" role="tab" aria-controls="pills-compras" aria-selected="false">
                                        <i class="icon-drawer"></i> Compras
                                    </a>
                                </li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" id="pills-datos-tab" data-toggle="pill" href="#pills-datos" role="tab" aria-controls="pills-datos" aria-selected="false">
                                        <i class="icon-information"></i> Información de la Cuenta
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div role="tabpanel" class="tab-pane fade active show" id="pills-compras"  aria-labelledby="pills-compras-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            Ordenes de Compra
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="pills-datos"  aria-labelledby="pills-datos-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('suppliers.forms.update')
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
            {{ ModelNotes::card($supplier) }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @if(App\Models\Carpeta::showModal($errors))
        <script>
            jQuery(document).ready(function($){
                $('#modal-create-supplier').modal('show');
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
