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
            ['route' => '#', 'icon' => 'icon-plus', 'text' => 'Crear']
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
                            <i class="icon-plus"></i> Crear Rol
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
                                    {{ Form::open(['action' => route('admin.roles.store'), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
                                    <input autocomplete="false" type="hidden" type="text" style="display:none;">
                                    <fieldset class="mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="col-lg-5 col-md-12">
                                                        {{ Form::inputGroup([
                                                            'name' => 'name',
                                                            'label' => 'Nombre Rol',
                                                            'placeholder' => 'no utilizar espacios',
                                                            'extra' => 'autocomplete=a',
                                                            'required' => true,
                                                            'value' => old('name')
                                                        ], $errors) }}
                                                    </div>
                                                </div>
                                                @include('roles._permissions')
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                @include('layouts.base.buttons._cancelar', ['cancelar' => route('admin.roles.index')])
                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
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

