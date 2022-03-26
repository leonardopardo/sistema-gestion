<table id="tabla-categories" class="table table-bordered table-striped table-hover table-head-bg-primary" style="width:100%;" >
    <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th class="col-2">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach($categories as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->description }}</td>
                <td>
                    {{-- view --}}
                    <a href="#" data-toggle="modal" data-target="#modal-show-category-{{$c->id}}" title="Ver Información">
                        <i class="icon-eye m-2 large text-info"></i>
                    </a>
                    @include('categories.modals.show', ['category' => $c])
                    {{-- /view --}}

                    {{-- update --}}
                    @can('update', $c)
                        <a href="{{ route('admin.categories.edit', $c) }}" title="Acceder">
                            <i class="icon-arrow-right-circle m-2 large text-primary"></i>
                        </a>
                    @endcan
                    {{-- /update --}}

                    {{-- delete --}}
                    @can('delete', $c)
                        <a href="#" data-toggle="modal" data-target="#modal-delete-category-{{ $c->id }}" title="Eliminar">
                            <i class="icon-trash m-2 large text-danger"></i>
                        </a>
                        @include('categories.modals.delete', ['category' => $c])
                    @endcan
                    {{-- /delete --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
    <script>
        jQuery(document).ready(function($){
            $('#tabla-categories').DataTable({
                processing: true,
                order: [1, 'asc']
            });
        });
    </script>
@endpush

