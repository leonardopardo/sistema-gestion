<fieldset class="mb-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    {{ Form::inputGroup([
                        'name' => 'razon_social',
                        'label' => 'Razón Social ó Nombre completo',
                        'placeholder' => 'Ingrese un nombre . . .',
                        'extra' => 'autocomplete=a',
                        'required' => true,
                        'maxlength' => 250,
                        'value' => old('razon_social', $cuenta->razon_social ?? ''),
                    ], $errors) }}
                </div>
                <div class="col-lg-6 col-md-12">
                    {{ Form::inputGroup([
                        'name' => 'actividad',
                        'label' => 'Actividad',
                        'placeholder' => 'Ingrese la actividad correspondiente . . .',
                        'extra' => 'autocomplete=a',
                        'maxlength' => 250,
                        'value' => old('actividad', $cuenta->actividad ?? ''),
                    ], $errors) }}
                </div>
                <div class="col-lg-4 col-md-12">
                    {{ Form::inputGroup([
                        'name' => 'documento',
                        'label' => 'N° de Identificación',
                        'placeholder' => 'Ingrese CUIT/DNI/Otro',
                        'extra' => 'autocomplete=a',
                        'required' => true,
                        'maxlength' => 250,
                        'value' => old('documento', $cuenta->documento ?? ''),
                    ], $errors) }}
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="form-group">
                        <label for="pais_id">País</label>
                        <select name="pais_id" id="pais_id" class="form-control" required >
                            <option value="">{{ no_data('Seleccione un País') }}</option>
                            @foreach($paises as $pais)
                                @isset($cuenta)
                                    @if($cuenta->pais)
                                        <option value="{{ $pais->id }}" {{ selected($pais->id, $cuenta->pais->id) }}>{{ $pais->descripcion_larga }}</option>
                                    @else
                                        <option value="{{ $pais->id }}">{{ $pais->descripcion_larga }}</option>
                                    @endif
                                @else
                                    <option value="{{ $pais->id }}" {{ selected($pais->id, 13) }}>{{ $pais->descripcion_larga }}</option>
                                @endisset
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="provincia_id">Provincia</label>
                        <select name="provincia_id" id="provincia_id" class="form-control" data-action="{{ route('admin.localidades.async') }}">
                            <option value="">{{ no_data('Seleccione una Provincia') }}</option>
                            @foreach($provincias as $provincia)
                                @isset($cuenta)
                                    @if($cuenta->provincia)
                                        <option value="{{ $provincia->id }}" {{ selected($provincia->id, $cuenta->provincia->id) }}>{{ $provincia->nombre }}</option>
                                    @else
                                        <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                    @endif
                                @else
                                    <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                @endisset
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="localidad_id">
                            Localidad
                            <i class="fas fa-cog fa-spin load-ajax d-none"></i>
                            <span class="text-danger d-none"><i class="icon-close"></i> Error al cargar</span>
                        </label>
                        <select name="localidad_id" id="localidad_id" class="form-control select2" style="width: 100%;">
                            @isset($localidades)
                                @if($cuenta->localidad)
                                    @foreach($localidades as $localidad)
                                        <option value="{{ $localidad->id }}" {{ selected($localidad->id, $cuenta->localidad->id) }}>{{ $localidad->nombre }}</option>
                                    @endforeach
                                @else
                                    <option value="">{{ no_data('Seleccione una Localidad') }}</option>
                                    @foreach($localidades as $localidad)
                                        <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
                                    @endforeach
                                @endif
                            @else
                                <option value="">{{ no_data('Seleccione una Localidad') }}</option>
                            @endisset
                        </select>
                    </div>
                </div>
                <div class="col-md-6 d-none">
                    {{ Form::inputGroup([
                        'name' => 'estado',
                        'id' => 'estado',
                        'disabled' => 'disabled',
                        'label' => 'Estado',
                        'placeholder' => 'Ingrese un estado ...',
                        'maxlength' => 191,
                        'value' => old('estado', $cuenta->estado ?? ''),
                    ], $errors) }}
                </div>
                <div class="col-md-6 d-none">
                    {{ Form::inputGroup([
                        'name' => 'ciudad',
                        'id' => 'ciudad',
                        'disabled' => 'disabled',
                        'label' => 'Ciudad',
                        'placeholder' => 'Ingrese una ciudad . . .',
                        'maxlength' => 191,
                        'value' => old('ciudad', $cuenta->ciudad ?? ''),
                    ], $errors) }}
                </div>
                <div class="col-md-10">
                    {{ Form::inputGroup([
                        'name' => 'direccion',
                        'label' => 'Dirección',
                        'placeholder' => 'Ingrese una dirección . . .',
                        'maxlength' => 250,
                        'value' => old('direccion', $cuenta->direccion ?? ''),
                    ], $errors) }}
                </div>
                <div class="col-lg-2 col-md-12">
                    {{ Form::inputGroup([
                        'name' => 'codigo_postal',
                        'label' => 'Código Postal',
                        'placeholder' => '- - - -',
                        'extra' => 'autocomplete=a',
                        'maxlength' => 10,
                        'value' => old('codigo_postal', $cuenta->codigo_postal ?? ''),
                    ], $errors) }}
                </div>
                <div class="col-lg-6 col-md-12">
                    {{ Form::inputGroup([
                        'name' => 'telefono',
                        'label' => 'Teléfono',
                        'placeholder' => '000 0000 0000',
                        'value' => old('telefono', $cuenta->telefono ?? ''),
                    ]) }}
                </div>
                <div class="col-lg-6 col-md-12">
                    {{ Form::inputGroup([
                        'type' => 'email',
                        'name' => 'email',
                        'label' => 'Email',
                        'placeholder' => 'nombre@dominio.com',
                        'value' => old('email', $cuenta->email ?? ''),
                    ]) }}
                </div>
                <div class="col-lg-6 col-md-12">
                    {{ Form::inputGroup([
                        'type' => 'text',
                        'name' => 'contacto_nombre',
                        'label' => 'Contacto',
                        'placeholder' => 'Nombre y Apellido',
                        'value' => old('email', $cuenta->contacto_nombre ?? ''),
                    ]) }}
                </div>
                <div class="col-lg-6 col-md-12">
                    {{ Form::inputGroup([
                        'name' => 'contacto_cargo',
                        'label' => 'Cargo',
                        'placeholder' => 'Cargo del Contacto',
                        'value' => old('email', $cuenta->contacto_cargo ?? ''),
                    ]) }}
                </div>
                <div class="col-lg-12 col-md-12">
                    {{ Form::textarea([
                        'name' => 'observaciones',
                        'label' => 'Observaciones',
                        'value' => old('observaciones', $cuenta->observaciones ?? ''),
                        'rows' => 3
                    ]) }}
                </div>
            </div>
        </div>
    </div>
</fieldset>

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($){

            let provincia = $('select[name="provincia_id"]');

            let localidad = $('select[name="localidad_id"]');

            let spinner = localidad.prev('label').children('i.load-ajax');

            let errorMessage = $('#localidad_id').prev('label').children('span.text-danger');

               provincia.on('change', function(event){


                   let self = $(this);

                   if(self.val() == 0){

                       localidad.html('');
                       return;
                   }

                   errorMessage.addClass('d-none');

                   $.ajax({
                       url: self.data('action'),
                       method: 'post',
                       data:{
                           _token: $('meta[name="csrf-token"]').attr('content'),
                           id: self.val()
                       },
                       beforeSend: function(){
                           spinner.removeClass('d-none');
                       }
                   }).done(response => {

                       errorMessage.addClass('d-none');

                       localidad.html('').removeAttr('disabled');

                       if(response.length == 0)
                           localidad.attr('disabled', 'disabled');

                       localidad.append(`<option value="">-- Seleccione una Localidad --</option>`);

                       response.forEach( (element, index) => {
                           localidad.append(`<option value="${element.id}">${element.nombre}</option>`);
                       });

                   }).fail(error => {

                       errorMessage.removeClass('d-none');

                       localidad.html('');

                   }).always(response => {

                       spinner.addClass('d-none');

                   });
               });

            let id = $('#pais_id').val();
            var provincias = $('#provincia_id');
            var localidades = $('#localidad_id');
            var ciudad = $('#ciudad');
            var estado = $('#estado');

            setStatus(id, provincias, localidades, ciudad, estado);

            $('#pais_id').on('change', function() {
                let id = $(this).val();
                setStatus(id, provincias, localidades, ciudad, estado);
            });
        });

        function setStatus(id, provincias, localidades, ciudad, estado){
            if(id === '13'){ //significa que es argentina
                provincias.closest('div[class^=col]').removeClass('d-none');
                provincias.prop("disabled", false);
                localidades.closest('div[class^=col]').removeClass('d-none');
                localidades.prop("disabled", false);
                ciudad.closest('div[class^=col]').addClass('d-none');
                ciudad.attr('disabled','disabled');
                estado.closest('div[class^=col]').addClass('d-none');
                estado.attr('disabled','disabled');
            }else{
                provincias.closest('div[class^=col]').addClass('d-none')
                provincias.attr('disabled','disabled')
                localidades.closest('div[class^=col]').addClass('d-none')
                localidades.attr('disabled','disabled')
                ciudad.closest('div[class^=col]').removeClass('d-none')
                ciudad.prop("disabled", false)
                estado.closest('div[class^=col]').removeClass('d-none')
                estado.prop("disabled", false)
            }
        }
    </script>
@endpush
