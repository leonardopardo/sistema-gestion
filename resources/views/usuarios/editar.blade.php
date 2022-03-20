@extends('layouts.base.app', [
    'components' => [
        'datatables'
    ]
])

@section('title', 'Editar '.$user->email)

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Usuarios',
        'icon' => 'icon-user-following',
        'subtitle' => $user->name,
        'crumbs' => [
            ['route' => route('admin.usuarios.index'), 'icon' => 'icon-user-following', 'text' => 'Usuarios'],
            ['route' => '#', 'icon' => 'icon-pencil', 'text' => 'Editar']
        ],
        'links' => []
    ])
@endsection

@section('content')
<div class="page-inner mt--5">
    @include('flash::message')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <ul class="list-unstyled">
                    <li><i class="icon-ban"></i> {{ $error }}</li>
                </ul>
            @endforeach
        </div>
    @endif
    <div class="row">
        @can('view', new \App\User)
        <div class="col-12 mb-3">
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-primary">
                <i class="icon-arrow-left"></i> Ir al Listado de Usuarios
            </a>
        </div>
        @endcan
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            {{ $user->name }}
                        </div>
                        <div class="card-tools">
                            @can('update', $user)
                                @if($user->email != auth()->user()->email)
                                    {{ UserPersonification::loginForm($user->id) }}
                                @endif
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::open(['action' => route('admin.usuarios.update', $user)]) }}

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nombre Completo</label>
                                <input type="text"
                                       name="name"
                                       value="{{ $user->name }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nombre Completo">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Correo Eléctronico</label>
                                <input type="email"
                                       name="email"
                                       value="{{ $user->email }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Correo electrónico">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Contraseña *</label>
                                <input type="password"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Contraseña">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Reingrese Contraseña</label>
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       placeholder="Reingrese Contraseña">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                @can('assign', new \App\Models\Role)
                                    @include('usuarios._roles',$roles)
                                @else
                                    <ul class="list-group">
                                    @forelse ($user->roles as $role)
                                        <li class="list-group-item">
                                            {{ $role->name }}
                                        </li>
                                    @empty
                                        <li class="list-group-item">No tiene roles asignados</li>
                                    @endforelse
                                    </ul>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="form-group">
                                @can('view', new \App\User)
                                    @include('layouts.base.buttons._cancelar', ['cancelar' => route('admin.usuarios.index') ])
                                @else
                                    @include('layouts.base.buttons._cancelar', ['cancelar' => route('admin.main.index') ])
                                @endcan
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                    <small>(*) La contraseña debe contener 12 caracteres, mayúsculas, minúsculas, números y caracteres especiales</small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
