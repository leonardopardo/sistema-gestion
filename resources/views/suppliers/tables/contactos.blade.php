@can('adminContacts', $supplier)
<div class="row mb-3">
    <div class="col-12">
        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#addContact">
            <i class="icon-plus"></i> Agregar Contacto
        </button>
    </div>
</div>
@endcan

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Observacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($supplier->contactos as $c)
            <tr>
                <td scope="row">{{ $c->fullName }}</td>
                <td>{{ $c->phone }}</td>
                <td>
                    <a href="mailto:{{ $c->email }}">{{ $c->email }}</a>
                </td>
                <td>{{ $c->notes }}</td>
                <td>
                    @if (Auth::user()->can('adminContacts',$supplier))
                    <a href="#" class="mr-2" data-toggle="modal" data-target="#modal-delete-contacto-{{ $c->id }}">
                        <i class="icon-trash text-danger large" aria-hidden="true"></i>
                    </a>
                    @else
                    {{ no_data('Sin permiso') }}
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">
                    <span class="text-muted">-- Sin Resultados --</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="CrearContacto" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-plus"></i> Nuevo Contacto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.suppliers.contact.add', $supplier) }}" method="post">
                    @csrf
                    @include('suppliers.forms.contact', ['contacto' => null])
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            @include('layouts.base.buttons._modal')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($supplier->contactos as $c)
<div class="modal fade" id="modal-delete-contacto-{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modal-create-cliente-title">
                    <i class="icon-people"></i> Contacto :: <strong>{{ $c->fullName }}</strong> ::
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.suppliers.contact.delete', $supplier) }}" autocomplete="off" method="post">
                @csrf
                <input type="hidden" name="contact" value="{{ $c->id }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h4 class="text-center">Está seguro que desea eliminar el contacto <strong>{{ $c->fullName }}</strong>?</h4>
                            <h3 class="text-center text-danger"><i class="icon-exclamation"></i> Esta acción no puede revertirse.</h3>
                            @include('layouts.base.buttons._delete')
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
