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

<a href="{{ $volver }}" role="button" class="btn btn-info">
    <i class="icon-arrow-left"></i> Volver
</a>

<a href="{{ $cancelar ?? $volver }}" role="button" class="btn btn-info ml-2">
    <i class="icon-close"></i> Cancelar
</a>

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
