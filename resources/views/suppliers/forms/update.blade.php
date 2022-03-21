{{ Form::open(['action' => route('admin.supplier.update', $supplier), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
    <input autocomplete="false" type="hidden" type="text" style="display:none;">
    @include('cuentas.forms.fields', ['supplier' => $supplier])
    @can('update', new \App\Models\Supplier)
    <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    @include('layouts.base.buttons._cancelar', ['cancelar' => route('admin.supplier.index')])
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
