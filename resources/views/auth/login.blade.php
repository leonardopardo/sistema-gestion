@extends('layouts.auth.app')

@section('content')

<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="container container-login container-transparent animated fadeIn">
        <h3 class="text-center">
            <i class="icon-social-dropbox"></i> Gestión <pre>v1.0</pre>
        </h3>
        {{ Form::open(['action' => route('login')]) }}
            <div class="login-form">
                {{-- Usuario --}}
                {{ Form::inputGroup([
                    'name' => 'email',
                    'label' => 'Usuario',
                    'value' => (env('APP_ENV') == 'local') ? 'leonardo@mail.com' : '',
                    ], $errors) }}

                {{-- Contraseña--}}
                {{ Form::inputGroup([
                    'name' => 'password',
                    'label' => 'Contraseña',
                    'type' => 'password',
                    'value' => (env('APP_ENV') == 'local') ? '123123' : '',
                    ], $errors) }}

                <div class="form-group form-action-d-flex mb-3">
                    {{-- Rememberme --}}
                    {{ Form::checkbox([
                        'name' => 'remember',
                        'id' => 'remember',
                        'checked' => old('remember') ? true : false,
                        'text' => 'Recordarme'
                        ], $errors) }}

                    {{-- Submit --}}
                    @include('layouts.base.buttons._ingresar')
                </div>

            </div>
        {{ Form::close() }}
        {{-- Help --}}
        <div class="login-account">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</div>

@endsection
