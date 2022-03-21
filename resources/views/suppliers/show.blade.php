<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Razón Social ó Nombre completo</label>
                    <div class="form-control">
                        {{ $supplier->razon_social ?? no_data()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Rubro</label>
                    <div class="form-control">
                        {{ $supplier->heading_id ?? no_data()}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group">
                    <label>N° de Identificación</label>
                    <div class="form-control">
                        {{ cuit_format($supplier->documento) ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Provincia</label>
                    <div class="form-control">
                        {{ $supplier->provincia->nombre ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Localidad</label>
                    <div class="form-control">
                        {{ $supplier->localidad->nombre ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-12">
                <div class="form-group">
                    <label>Direccion</label>
                    <div class="form-control">
                        {{ $supplier->direccion ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-12">
                <div class="form-group">
                    <label>Código Postal</label>
                    <div class="form-control">
                        {{ $supplier->codigo_postal ?? no_data('????') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label>Teléfono</label>
                    <div class="form-control">
                        {{ $supplier->telefono ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for=""><i class="icon-envelope"></i> Email</label>
                    <div class="form-control">
                        {{ $supplier->email ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for="">Contacto</label>
                    <div class="form-control">
                        {{ $supplier->contacto_nombre ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="form-group">
                    <label for="">Cargo</label>
                    <div class="form-control">
                        {{ $supplier->contacto_cargo ?? no_data() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label for="">Observaciones</label>
                    <div class="form-control">
                        {{ $supplier->observaciones ?? no_data() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            @can('update', $supplier)
                <a href="{{ route('admin.suppliers.edit', $supplier) }}" class="btn btn-primary pull-right"><i class="icon-arrow-right-circle"></i> Acceder</a>
            @endcan
            <button type="button" class="btn btn-info pull-right mr-2" data-dismiss="modal"><i class="icon-close"></i> Cerrar</button>
        </div>
    </div>
</div>

