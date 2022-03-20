{{ Form::submit([
    'class' => 'pull-right form-submit',
    'color' => 'primary',
    'icon' => 'icon-check',
    'text' => ' Guardar'
]) }}

{{ Form::button([
    'class' => 'pull-right form-loader d-none',
    'color' => 'gray',
    'icon' => 'fas fa-cog fa-spin',
    'text' => 'Guardar'
]) }}

<button type="button" class="btn btn-info pull-right mr-3" data-dismiss="modal"><i class="icon-close"></i> Cerrar</button>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.form-submit')
                .parents('form')
                .on('submit', function(event){
                    event.preventDefault();

                    $(event.target)
                        .find('.form-submit')
                        .addClass('d-none');

                    $(event.target)
                        .find('.form-loader')
                        .removeClass('d-none');

                    this.submit();
                });
        });
    </script>
@endpush
