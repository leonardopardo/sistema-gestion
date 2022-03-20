<div class="modal fade" id="modal-show-cuenta-{{ $cuenta->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-create-cuenta-title">
                    <i class="icon-people"></i> Cuenta :: <strong>{{ $cuenta->razon_social }}</strong> :: <br>
                    <small class="text-muted"><strong>Fecha Alta:</strong> {{ \Carbon\Carbon::parse($cuenta->fecha_alta)->format('d/m/Y') ?? no_data() }}</small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('cuentas.show')
            </div>
        </div>
    </div>
</div>
