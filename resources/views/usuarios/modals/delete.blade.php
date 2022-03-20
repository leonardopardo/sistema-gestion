<div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="modal-create-banco-title">
                    <i class="icon-notebook"></i> Usuario :: <strong> {{ $user->email }}</strong> ::
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['action' => route('admin.usuarios.delete', $user), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h4 class="text-center">¿Está seguro que desea eliminar el usuario <strong>{{$user->email}}</strong>?</h4>
                            @include('layouts.base.buttons._delete')
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>
