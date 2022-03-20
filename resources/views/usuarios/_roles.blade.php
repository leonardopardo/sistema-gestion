<h3>Roles</h3>
<hr>
<div class="form-group bg-light p-4">
    @foreach ($roles as $role)
        <div class="checkbox">
            <label for="ch-{{$role->name}}">
                <input {{$user->roles->contains($role->id) ? 'checked' : ''}} type="checkbox" name="roles[]" id="ch-{{$role->name}}" value="{{$role->name}}">
                {{$role->name}}
                <br>
                <!-- <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small> -->
            </label>
        </div>
    @endforeach
</div>
