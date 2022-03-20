<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="">Nombre Completo</label>
            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}"
                   placeholder="Nombre Completo ...">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for=""><i class="icon-envelope"></i> Correo Electrónico</label>
            <input type="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="Correo electrónico ...">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <a href="javascript:void(0);" id="pass-sugerida" class="badge badge-info pull-right" data-toggle="tooltip" data-placement="right" title="{{isset($pass_sugerida) ? $pass_sugerida : ''}}">
                Contraseña sugerida
            </a>
            <label for="">Contraseña</label>
            <div class="input-group">
                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Contraseña ...">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-primary ver-pass">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </button>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="">Reingrese Contraseña</label>
            <div class="input-group">
                <input type="password"
                       name="password_confirmation"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       placeholder="Reingrese Contraseña ...">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-primary ver-pass">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </button>
                </div>
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        @include('layouts.base.buttons._modal')
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    $(function(){
       $('.ver-pass').click(ojoLoco); //prende y apaga las contraseñas

       $('#pass-sugerida').click(function(){
           $("input[name^='password']").each(function( index ) {
               this.value = "{{isset($pass_sugerida) ? $pass_sugerida : ''}}";
           });
       });
    });
    function ojoLoco(){
        let btn = $(this)
        let icono = btn.children();
        let input = btn.parent()[0].previousElementSibling;

        input.type === 'text'
            ? input.type = 'password'
            : input.type = 'text'

        icono.toggleClass('fa-eye-slash')
        icono.toggleClass('fa-eye')

    }
</script>
@endpush
