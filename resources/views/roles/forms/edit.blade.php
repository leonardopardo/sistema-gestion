{{ Form::open(['action' => route('admin.roles.update', $role), 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}

@include('roles.forms.fields', ['role' => $role])

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            @include('layouts.base.buttons._cancelar', ['cancelar' => route('admin.roles.index')])
        </div>
    </div>
</div>

{{ Form::close() }}
