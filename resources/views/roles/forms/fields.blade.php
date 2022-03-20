<input autocomplete="false" type="hidden" type="text" style="display:none;">
<fieldset class="mb-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    {{ Form::inputGroup([
                        'disabled' => true,
                        'name' => 'name',
                        'label' => 'Nombre Rol',
                        'placeholder' => 'no utilizar espacios',
                        'extra' => 'autocomplete=a',
                        'required' => true,
                        'value' => old('name', $role->name ?? '')
                    ], $errors) }}
                </div>
            </div>
            @include('roles._permissions', ['role', $role])
        </div>
    </div>
</fieldset>
