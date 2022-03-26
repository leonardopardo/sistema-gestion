<table id="tabla-categories" class="table table-bordered table-striped table-hover table-head-bg-primary" style="width:100%;" >
    <thead>
    <tr>
        <th>Image</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach($categories as $c)
            <tr>
                <td>{{ asset($c->image ?? noImage() ) }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->description }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modal-show-juzgado-{{$c->id}}" title="Ver Información">
                        <i class="icon-eye m-2 large text-info"></i>
                    </a>

                    @include('categories.modals.show', ['category' => $c])

                    @can('update', $c)
                        <a href="{{ route('admin.categories.edit', $c) }}" title="Acceder">
                            <i class="icon-arrow-right-circle m-2 large text-primary"></i>
                        </a>
                    @endcan

                    @can('delete', $categories)
                        <a href="#" data-toggle="modal" data-target="#modal-delete-category-{{ $c->id }}" title="Eliminar">
                            <i class="icon-trash m-2 large text-danger"></i>
                        </a>
                        @include('categories.modals.delete')
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
