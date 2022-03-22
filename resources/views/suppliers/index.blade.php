@extends('layouts.base.app', [
    'components' => [
        'datetimepicker',
        'datatables',
        'select2'
    ]
])

@section('title', 'Proveedores')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Proveedores',
        'icon' => 'icon-list',
        'crumbs' => [
            ['route' => route('admin.cuentas.index'), 'icon' => 'icon-list', 'text' => 'Proveedores'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
    <div class="page-inner mt--5">
        @include('flash::message')
        <div class="row">
            @can('create', new App\Models\Supplier)
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-proveedor">
                        <i class="icon-plus"></i> Nuevo Proveedor
                    </button>
                </div>
            @endcan
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                <i class="icon-menu"></i> Listado de Proveedores
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('suppliers.tables.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('create', new \App\Models\Supplier)
        @include('suppliers.modals.create')
    @endcan
@endsection

@push('scripts')
    @if(count($errors->all()) > 0)
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#modal-create-supplier').modal('show');
            });
        </script>
    @endif
@endpush
