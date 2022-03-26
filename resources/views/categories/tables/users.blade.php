<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cuenta->users as $u)
            <tr>
                <td scope="row">{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    <a class="mr-2" href="{{ route('admin.usuarios.show', $u) }}" data-toggle="tooltip" data-placement="top" title="Editar usuario">
                        <i class="icon-pencil" aria-hidden="true"></i>
                    </a>
                    <a class="mr-2" href="#" data-toggle="tooltip" data-placement="top" title="Desvincular usuario" onclick="event.preventDefault();document.querySelector('#userDetach{{$u->id}}').submit();">
                        <i class="icon-user-unfollow text-danger" aria-hidden="true"></i>
                    </a>
                    <form action="{{ route('admin.cuentas.user.detach',$cuenta) }}" method="post" id="userDetach{{$u->id}}">
                        @csrf
                        <input type="hidden" name="userId" value="{{ $u->id }}">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <span class="text-muted">-- Sin Resultados --</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                Agregar Usuario
            </button>
    <div class="dropdown-menu" aria-labelledby="triggerId">
        <a class="dropdown-item" href="#" data-toggle='modal' data-target='#modalNewUser'>Crear Nuevo</a>
        <a class="dropdown-item disabled" href="#" data-toggle='modal' data-target='#modalUserExist'>Asignar Usuario Existente</a>
    </div>
</div>

<div class='modal fade' tabindex='-1' role='dialog' id='modalNewUser'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                Crear y Asignar Usuario
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class='modal-body'>
                <form action="{{ route('admin.cuentas.user.attach', $cuenta) }}" method="post">
                    @csrf
                    @include('usuarios.modals.create')
                </form>
            </div>
        </div>
    </div>
</div>

<div class='modal fade' tabindex='-1' role='dialog' id='modalUserExist'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                Agregar usuario existente
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class='modal-body'>
                <form action="{{ route('admin.cuentas.user.attach', $cuenta) }}" method="post">
                    @csrf
                    <input type="hidden" name="userExist" value="1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Usuario</label>
                              <select class="form-control" name="user" id="">
                                  @foreach ($users as $u)
                                      <option value="{{ $u->id }}">{{ $u->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
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


