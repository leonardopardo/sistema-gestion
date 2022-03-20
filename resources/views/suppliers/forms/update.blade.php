{{ Form::open(['action' => route('admin.cuentas.update', $cuenta), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
    <input autocomplete="false" type="hidden" type="text" style="display:none;">
    @include('cuentas.forms.fields', ['cuenta' => $cuenta, 'paises' => $paises])
    @can('update', new \App\Models\Cuenta)
    <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    @include('layouts.base.buttons._cancelar', ['cancelar' => route('admin.cuentas.index')])
                </div>
            </div>
        </div>
    @endcan
{{ Form::close() }}

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.select2').select2();
        });
    </script>
@endpush
