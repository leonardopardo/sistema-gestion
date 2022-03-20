@extends('layouts.auth.app')

@section('content')
<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="container  container-transparent animated fadeIn">

        @include('flash::message')

        @if(session('status'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-paper-plane"></i> {{ session('status') }}
            </div>
        @endif

        <div>
            <div class="card ">
                <div class="card-header"><i class="fas fa-undo-alt"></i> {{ __('Reset Password') }}</div>

                <div class="card-body">

                    {{ Form::open([ 'action' => route('password.email') ]) }}

                        {{ Form::inputGroup([
                            'id' => 'email',
                            'label' => 'Cuenta de Correo',
                            'type' => 'email',
                            'name' => 'email',
                            'required' => true

                        ], $errors) }}

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i>&nbsp; {{ __('Send Password Reset Link') }}
                                </button>
                                <a href="/" class="btn btn-info" role="button"><i class="fas fa-times"></i> Cancelar</a>
                            </div>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
