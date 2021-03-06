<div class="card shadow-none">
    <div class="card-header">
        <i class="icon-note" aria-hidden="true"></i> Notas
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalNote">
          Agregar Nota
        </button>
    </div>
    <div style="{{ (config('notes.display.scrolleable')) ? 'max-height: 300px; overflow-y:auto' : '' }}" class="card-body">
        @foreach ($model->notes->reverse() as $item)
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        {{ ucfirst($item->authorName) }}
                        <br>
                        <small class="text-muted"><i class="icon-clock" aria-hidden="true"></i> {{ $item->created }}</small>
                    </div>
                    <div class="body">
                        <p>
                            {!! nl2br($item->body) !!}
                        </p>

                        @if ($item->author->id == Auth::user()->id)
                            @include('ModelNotes::delete')
                        @endif
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalNote" tabindex="-1" role="dialog" aria-labelledby="modalNoteId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('modelNotes.store',$model->noteModel()) }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-note"></i> Nueva Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 form-group">
                      <label for="body">Contenido</label>
                      <textarea required maxlength="{{ config('notes.maxlength') }}" class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" placeholder="Ingrese un comentario">{{ old('body') }}</textarea>
                      @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @include('layouts.base.buttons._modal')
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>


