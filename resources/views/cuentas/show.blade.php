<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Razón Social ó Nombre completo</label>
                    <div class="form-control">
                        {{ $cuenta->razon_social ?? no_data()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Actividad</label>
                    <div class="form-control">
                        {{ $cuenta->actividad ?? no_data()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="form-group">
                    <label>N° de Identificación</label>
                    <div class="form-control">
                        {{ cuit_format($cuenta->documento) ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group">
                    <label>Provincia</label>
                    <div class="form-control">
                        {{ $cuenta->provincia->nombre ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="form-group">
                    <label>Localidad</label>
                    <div class="form-control">
                        {{ $cuenta->localidad->nombre ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-12">
                <div class="form-group">
                    <label>Direccion</label>
                    <div class="form-control">
                        {{ $cuenta->direccion ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-12">
                <div class="form-group">
                    <label>Código Postal</label>
                    <div class="form-control">
                        {{ $cuenta->codigo_postal ?? no_data('????') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Teléfono</label>
                    <div class="form-control">
                        {{ $cuenta->telefono ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for=""><i class="icon-envelope"></i> Email</label>
                    <div class="form-control">
                        {{ $cuenta->email ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for="">Contacto</label>
                    <div class="form-control">
                        {{ $cuenta->contacto_nombre ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for="">Cargo</label>
                    <div class="form-control">
                        {{ $cuenta->contacto_cargo ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label for="">Observaciones</label>
                    <div class="form-control">
                        {{ $cuenta->observaciones ?? no_data() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            @can('update', $cuenta)
                <a href="{{ route('admin.cuentas.edit', $cuenta) }}" class="btn btn-primary pull-right"><i class="icon-arrow-right-circle"></i> Acceder</a>
            @endcan
            <button type="button" class="btn btn-info pull-right mr-2" data-dismiss="modal"><i class="icon-close"></i> Cerrar</button>
        </div>
    </div>
</div>

