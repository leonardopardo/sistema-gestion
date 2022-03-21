<a href="#" data-toggle="modal" data-target="#modal-show-supplier-{{$supplier->id}}" title="Ver Información"><i class="icon-eye m-2 large text-info" ></i></a>
@include('suppliers.modals.show', [ 'supplier' => $supplier ])

<a href="{{ route('admin.suppliers.edit', $supplier) }}" title="Acceder"><i class="icon-arrow-right-circle m-2 large"></i></a>

@can('delete', $supplier)
    <a href="#" data-toggle="modal" data-target="#modal-delete-supplier-{{ $supplier->id }}" title="Eliminar"><i class="icon-trash m-2 large text-danger" ></i></a>
    @include('suppliers.modals.delete', [ 'supplier' => $supplier ])
@endcan
