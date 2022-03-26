<fieldset class="mb-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    {{ Form::inputGroup([
                        'name' => 'name',
                        'label' => 'Nombre',
                        'placeholder' => 'Nombre de Categoría',
                        'extra' => 'autocomplete=a',
                        'required' => true,
                        'maxlength' => 250,
                        'value' => old('nombre', $category->name ?? ''),
                    ], $errors) }}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ Form::textarea([
                        'name' => 'description',
                        'label' => 'Descripción',
                        'value' => old('observaciones', $category->description ?? ''),
                        'rows' => 3
                    ]) }}
                </div>
            </div>
        </div>
    </div>
</fieldset>
