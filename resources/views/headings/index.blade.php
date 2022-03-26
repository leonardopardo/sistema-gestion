@extends('layouts.base.app', [
    'components' => [
        'datetimepicker',
        'datatables',
        'select2'
    ]
])

@section('title', 'Rubros')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Rubros',
        'icon' => 'icon-list',
        'crumbs' => [
            ['route' => route('admin.headings.index'), 'icon' => 'icon-list', 'text' => 'Rubros'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
    <div class="page-inner mt--5">
        @include('flash::message')
        <div class="row">
            @can('create', new App\Models\Heading)
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-heading">
                        <i class="icon-plus"></i> Nuevo Rubro
                    </button>
                </div>
            @endcan
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                <i class="icon-menu"></i> Listado de Rubros
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('headings.tables.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('headings.modals.create')
@endsection

@push('scripts')
    @if(count($errors->all()) > 0)
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#modal-create-heading').modal('show');
            });
        </script>
    @endif
@endpush
