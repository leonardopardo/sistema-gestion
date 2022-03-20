<div class="modal fade" id="modal-create-cuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-create-cuenta-title">
                    <i class="icon-plus"></i> Nueva Cuenta
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('cuentas.forms.create', ['buttons' => 'layouts.base.buttons._modal'])
            </div>
        </div>
    </div>
</div>
