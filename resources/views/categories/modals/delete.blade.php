<div class="modal fade" id="modal-delete-category-{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modal-delete-category-title">
                    <i class="icon-people"></i> Categoría :: <strong>{{ $c->name }}</strong> ::
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('categories.forms.delete', [ 'category' => $c ])
            </div>
        </div>
    </div>
</div>
