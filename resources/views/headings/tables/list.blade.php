<table id="tabla-headings" class="table table-bordered table-striped table-hover table-head-bg-primary" style="width:100%;" >
    <thead>
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th class="col-2">Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach($headings as $h)
            <tr>
                <td>{{ $h->id }}</td>
                <td>{{ $h->name }}</td>
                <td>{{ $h->description }}</td>
                <td>
                    {{-- view --}}
                    <a href="#" data-toggle="modal" data-target="#modal-show-heading-{{$h->id}}" title="Ver Información">
                        <i class="icon-eye m-2 large text-info"></i>
                    </a>
                    @include('headings.modals.show', ['heading' => $h])
                    {{-- /view --}}

                    {{-- update --}}
                    @can('update', $h)
                        <a href="{{ route('admin.headings.edit', $h) }}" title="Acceder">
                            <i class="icon-arrow-right-circle m-2 large text-primary"></i>
                        </a>
                    @endcan
                    {{-- /update --}}

                    {{-- delete --}}
                    @can('delete', $h)
                        <a href="#" data-toggle="modal" data-target="#modal-delete-headings-{{ $h->id }}" title="Eliminar">
                            <i class="icon-trash m-2 large text-danger"></i>
                        </a>
                        @include('headings.modals.delete', ['heading' => $h])
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
            $('#tabla-headings').DataTable({
                processing: true,
                order: [1, 'asc']
            });
        });
    </script>
@endpush

