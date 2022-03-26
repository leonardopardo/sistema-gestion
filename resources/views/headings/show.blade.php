<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Nombre</label>
                    <div class="form-control">
                        {{ $heading->name }}
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Descripción</label>
                    <div class="form-control">
                        {{ $heading->description ?? no_data() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            @can('update', $heading)
                <a href="{{ route('admin.headings.edit', $heading) }}" class="btn btn-primary pull-right"><i class="icon-arrow-right-circle"></i> Acceder</a>
            @endcan
            <button type="button" class="btn btn-info pull-right mr-2" data-dismiss="modal"><i class="icon-close"></i> Cerrar</button>
        </div>
    </div>
</div>

