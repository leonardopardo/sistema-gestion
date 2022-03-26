<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Observacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cuenta->contactos as $c)
            <tr>
                <td scope="row">{{ $c->name }}</td>
                <td>{{ $c->lastname }}</td>
                <td>{{ $c->phone }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->notes }}</td>
                <td>
                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="Eliminar contacto" onclick="event.preventDefault();document.querySelector('#contactDelete{{$c->id}}').submit();">
                        <i class="icon-trash text-danger" aria-hidden="true"></i>
                    </a>
                    <form action="{{ route('admin.cuentas.contact.delete', $cuenta) }}" method="post" id="contactDelete{{$c->id}}">
                        @csrf
                        <input type="hidden" name="contact" value="{{ $c->id }}">
                    </form>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="editContacto{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Contacto :: {{ $c->name.' '.$c->lastname }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.cuentas.contact.update',$c) }}" method="post">
                                @csrf
                                @include('cuentas.forms.contact',[
                                    'c' => $c
                                ])

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
        @empty
            <tr>
                <td colspan="6" class="text-center">
                    <span class="text-muted">-- Sin Resultados --</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addContact">
  Agregar Contacto
</button>

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
                <form action="{{ route('admin.cuentas.contact.add', $cuenta) }}" method="post">
                    @csrf
                    @include('cuentas.forms.contact', ['contacto' => null])
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


