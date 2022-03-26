<div class="modal fade" id="modal-show-categry-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-create-category-title">
                    Categoría :: <strong>{{ $category->name }}</strong> :: <br>
                    <small class="text-muted"><strong>Fecha Alta:</strong> {{ \Carbon\Carbon::parse($category->created_at)->format('d/m/Y') ?? no_data() }}</small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('categories.show')
            </div>
        </div>
    </div>
</div>
