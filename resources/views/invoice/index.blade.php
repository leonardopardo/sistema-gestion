@extends('layouts.base.app', [
    'components' => [
        'datetimepicker',
        'datatables',
        'select2'
    ]
])

@section('title', 'Cuentas')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Facturas',
        'icon' => 'icon-docs',
        'crumbs' => [
            ['route' => route('admin.cuentas.index'), 'icon' => 'icon-docs', 'text' => 'Facturas'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
    <div class="page-inner mt--5">
        @include('flash::message')
        <div class="row">
            @can('create', new App\Models\Invoice)
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-cuenta">
                        <i class="icon-plus"></i> Nueva Factura
                    </button>
                </div>
            @endcan
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                <i class="icon-menu"></i> Listado de Facturas
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('invoice.tables.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('create', new \App\Models\Invoice)
        @include('invoice.modals.create')
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
