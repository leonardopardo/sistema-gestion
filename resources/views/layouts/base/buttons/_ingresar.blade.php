{{ Form::submit([
    'class' => 'pull-right form-submit',
    'color' => 'primary',
    'icon' => 'icon-login',
    'text' => ' Ingresar'
]) }}

{{ Form::button([
    'class' => 'pull-right form-loader d-none',
    'color' => 'gray',
    'icon' => 'fas fa-cog fa-spin',
    'text' => 'Ingresar'
]) }}

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
