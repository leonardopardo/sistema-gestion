{{ Form::open(['action' => route('admin.cuentas.delete', $cuenta), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <h4 class="text-center">Está seguro que desea eliminar la cuenta <strong>{{ $cuenta->razon_social }}</strong>?</h4>
            <h3 class="text-center text-danger"><i class="icon-exclamation"></i> Esta acción no puede revertirse.</h3>
            @include('layouts.base.buttons._delete')
        </div>
    </div>
</div>
{{ Form::close() }}
