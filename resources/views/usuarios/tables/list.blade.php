<table id="tabla-usuarios" class="table table-bordered table-hover table-head-bg-primary" style="width:100%;" >
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Fecha Creación</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($users as $u)
        <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('admin.usuarios.edit', $u) }}"><i class="icon-pencil m-2 large"></i></a>
                @can('delete', new \App\User)
                    <a href="#" data-toggle="modal" data-target="#modal-delete-{{$u->id}}"><i class="icon-trash m-2 large text-danger" ></i></a>
                    @include('usuarios.modals.delete', [ 'user' => $u ])
                @endcan
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="11" class="text-center">
                {{ no_data('Sin Registros') }}
            </td>
        </tr>
    @endforelse
    </tbody>
</table>


@push('scripts')
    <script>
        jQuery(document).ready(function($){
            $('#tabla-usuarios').DataTable();
        });
    </script>
@endpush
