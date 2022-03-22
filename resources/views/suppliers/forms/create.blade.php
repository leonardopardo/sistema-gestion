{{ Form::open(['action' => route('admin.suppliers.store'), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
    <input autocomplete="false" type="hidden" type="text" style="display:none;">
    @include('suppliers.forms.fields')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                @include($buttons)
            </div>
        </div>
    </div>
{{ Form::close() }}

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($){
           $('.select2').select2({
               dropdownParent: $("#modal-create-proveedor")
           });
        });
    </script>
@endpush
