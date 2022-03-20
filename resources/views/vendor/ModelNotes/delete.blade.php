<!-- Button trigger modal -->
<a href="#" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#modalEliminar{{ $item->id }}">
  borrar
</a>

<!-- Modal -->
<div class="modal fade" id="modalEliminar{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('modelNotes.destroy',$item) }}" method="post">
        @csrf
        <div class="modal-content">
                <div class="modal-header bg-danger">
                        <h5 class="modal-title"><i class="icon-trash"></i> Eliminar Nota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h3 class="text-center p-3">
                        Solo los creadores de la nota pueden borrar una nota, esta acción no puede deshacerse.<br>
                        <strong>¿Está seguro?</strong>
                    </h3>
                </div>
                @include('layouts.base.buttons._delete')
            </div>
        </div>
        </form>
    </div>
</div>
