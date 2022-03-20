@extends('layouts.base.app', [
    'components' => [
        'datatables'
    ]
])

@section('title', 'Roles')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Roles',
        'icon' => 'icon-layers',
        'subtitle' => 'Roles',
        'crumbs' => [
            ['route' => route('admin.roles.index'), 'icon' => 'icon-layers', 'text' => 'Roles'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
<div class="page-inner mt--5">
    @include('flash::message')
    <div class="row">
        @can('create', new \App\Models\Role)
        <div class="col-12 mb-3">
            <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">
                <i class="icon-plus"></i> Nuevo Rol
            </a>
        </div>
        @endcan
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            <i class="icon-menu"></i> Listado de Roles
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('roles.tables.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
