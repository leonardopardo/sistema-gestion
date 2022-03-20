@extends('layouts.base.app', [
    'components' => [
        'bootstrap_toggle'
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
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Editar']
        ],
        'links' => []
    ])
@endsection

@section('content')
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">
                <i class="icon-arrow-left"></i> Volver
            </a>
        </div>
        <div class="col-12">
            @include('flash::message')
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            <i class="icon-pencil"></i> Editar Rol :: <strong> {{ $role->name }} </strong> ::
                        </div>
                        <div class="card-tools">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-datos" role="tabpanel" aria-labelledby="pills-datos-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('roles.forms.edit', ['role' => $role])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

