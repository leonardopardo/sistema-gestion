<a href="#" data-toggle="modal" data-target="#modal-show-cuenta-{{$cuenta->id}}" title="Ver Información"><i class="icon-eye m-2 large text-info" ></i></a>
@include('cuentas.modals.show', [ 'cuenta' => $cuenta ])

<a href="{{ route('admin.cuentas.edit', $cuenta) }}" title="Acceder"><i class="icon-arrow-right-circle m-2 large"></i></a>

@can('delete', $cuenta)
    <a href="#" data-toggle="modal" data-target="#modal-delete-cuenta-{{ $cuenta->id }}" title="Eliminar"><i class="icon-trash m-2 large text-danger" ></i></a>
    @include('cuentas.modals.delete', [ 'cuenta' => $cuenta ])
@endcan
