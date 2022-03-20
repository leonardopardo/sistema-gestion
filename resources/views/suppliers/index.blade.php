@extends('layouts.base.app', [
    'components' => [
        'datetimepicker',
        'datatables',
        'select2'
    ]
])

@section('title', 'Clientes')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Clientes',
        'icon' => 'icon-notebook',
        'crumbs' => [
            ['route' => route('admin.cuentas.index'), 'icon' => 'icon-notebook', 'text' => 'Clientes'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
    <div class="page-inner mt--5">
        @include('flash::message')
        <div class="row">
            @can('create', new App\Models\Cuenta)
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-cuenta">
                        <i class="icon-plus"></i> Nuevo Cliente
                    </button>
                </div>
            @endcan
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                <i class="icon-menu"></i> Listado de Cuentas
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('cuentas.tables.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('create', new \App\Models\Cuenta)
        @include('cuentas.modals.create')
    @endcan
@endsection

@push('scripts')
    @if(count($errors->all()) > 0)
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#modal-create-cuenta').modal('show');
            });
        </script>
    @endif
@endpush
