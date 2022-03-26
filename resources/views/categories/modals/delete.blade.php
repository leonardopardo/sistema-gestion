<div class="modal fade" id="modal-delete-cuenta-{{ $juzgado->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modal-create-cliente-title">
                    <i class="icon-people"></i> Juzgado :: <strong>{{ $juzgado->nombre }}</strong> ::
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('juzgados.forms.delete', [ 'juzgado' => $juzgado ])
            </div>
        </div>
    </div>
</div>
