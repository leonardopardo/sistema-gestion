@can('adminUser', $cuenta)
<div class="row mb-3">
    <div class="col-12">
        <div class="dropdown">

            <button class="btn btn-outline-primary dropdown-toggle btn-sm"
                    type="button"
                    id="triggerId"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                <i class="icon-plus"></i> Agregar Usuario
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#" data-toggle='modal' data-target='#modalNewUser'>Crear Nuevo</a>
                <a class="dropdown-item disabled" href="#" data-toggle='modal' data-target='#modalUserExist'>Asignar Usuario Existente</a>
            </div>
        </div>
    </div>
</div>
@endcan

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th width="20%">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cuenta->users as $u)
            <tr>
                <td scope="row">{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    @can('update', $u)
                    <a class="mr-2" href="{{ route('admin.usuarios.edit', $u) }}" data-toggle="tooltip" data-placement="top" title="Editar usuario">
                        <i class="icon-pencil large" aria-hidden="true"></i>
                    </a>
                    @endcan
                    @if (Auth::user()->can('adminUser',$cuenta))
                    <a href="#"
                       class="mr-2"
                       data-toggle="modal"
                       data-target="#modal-desvincular-usuario-{{ $u->id }}">
                        <i class="icon-user-unfollow text-danger large" aria-hidden="true"></i>
                    </a>
                    @else
                    {{ no_data('Sin permiso') }}
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <span class="text-muted">-- No hay usuarios externos asignados --</span>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

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
                    @include('usuarios.modals.create', ['pass_sugerida' => random_password()])
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
                        <div class="col-12">
                            <div class="form-group">
                              <label for="seleccionar-usuario">Seleccionar Usuario</label>
                              <select class="form-control" name="user" id="seleccionar-usuario">
                                  @foreach ($users as $u)
                                      <option value="{{ $u->id }}">{{ $u->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                @include('layouts.base.buttons._modal')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@forelse ($cuenta->users as $u)
    <div class="modal fade" id="modal-desvincular-usuario-{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="modal-create-cliente-title">
                        <i class="icon-people"></i> Usuario :: <strong>{{ $u->name }}</strong> ::
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.cuentas.user.detach', $cuenta) }}" method="post">
                        @csrf
                        <input type="hidden" name="userId" value="{{ $u->id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <h4 class="text-center">Está seguro que desea desvincular al usuario <strong>{{ $u->name }}</strong>?</h4>
                                    <h3 class="text-center text-danger"><i class="icon-exclamation"></i> Se puede volver a vincular.</h3>
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
