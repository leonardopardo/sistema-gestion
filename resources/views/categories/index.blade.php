@extends('layouts.base.app', [
    'components' => [
        'datetimepicker',
        'datatables',
        'select2'
    ]
])

@section('title', 'Categorías')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Categorías',
        'icon' => 'icon-list',
        'crumbs' => [
            ['route' => route('admin.categories.index'), 'icon' => 'icon-list', 'text' => 'Categorías'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
    <div class="page-inner mt--5">
        @include('flash::message')
        <div class="row">
            @can('create', new App\Models\Category)
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
                        <i class="icon-plus"></i> Nueva Categoría
                    </button>
                </div>
            @endcan
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                <i class="icon-menu"></i> Listado de Categorías
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('categories.tables.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('categories.modals.create')
@endsection

@push('scripts')
    @if(count($errors->all()) > 0)
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#modal-create-category').modal('show');
            });
        </script>
    @endif
@endpush
