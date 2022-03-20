@extends(LAYOUT_AUTH)

@section('content')
<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="container  container-transparent animated fadeIn">
        @include('flash::message')
        <div class="card">
            <div class="card-header"><i class="fas fa-unlock"></i> Cambiar contraseña por primera vez </div>
            <div class="card-body">

                {{ Form::open([ 'action' => route('changePassword.changePassword') ]) }}

                    {{ Form::inputGroup([
                        'type' => 'password', 
                        'id' => 'password',
                        'label' => 'Nueva Contraseña',
                        'name' => 'password',
                        'required' => true
                    ], $errors) }}

                    {{ Form::inputGroup([
                        'type' => 'password',
                        'id' => 'password-confirm',
                        'label' => 'Confirmar Constraseña',
                        'name' => 'password_confirmation',
                        'required' => true
                    ], $errors) }}

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
