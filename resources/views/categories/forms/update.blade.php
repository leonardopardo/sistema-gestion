{{ Form::open(['action' => route('admin.categories.update', $category), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
    <input autocomplete="false" type="hidden" type="text" style="display:none;">
    @include('categories.forms.fields', ['category' => $category])
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                @include('layouts.base.buttons._cancelar', ['cancelar' => route('admin.categories.index')])
            </div>
        </div>
    </div>
{{ Form::close() }}

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.select2').select2();
        });
    </script>
@endpush
