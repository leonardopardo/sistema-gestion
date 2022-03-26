<a href="#" data-toggle="modal" data-target="#modal-show-juzgado-{{$juzgado->id}}" title="Ver Información">
    <i class="icon-eye m-2 large text-info"></i>
</a>

@include('juzgados.modals.show', [ 'juzgado' => $juzgado ])

@can('update', $juzgado)
    <a href="{{ route('admin.juzgados.edit', $juzgado) }}" title="Acceder">
        <i class="icon-arrow-right-circle m-2 large text-primary"></i>
    </a>
@endcan

@can('delete', $juzgado)
    <a href="#" data-toggle="modal" data-target="#modal-delete-cuenta-{{ $juzgado->id }}" title="Eliminar">
        <i class="icon-trash m-2 large text-danger"></i>
    </a>
    @include('juzgados.modals.delete', [ 'juzgado' => $juzgado ])
@endcan
