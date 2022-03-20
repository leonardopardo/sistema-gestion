<div class="user">
    <div class="avatar-sm float-left mr-2">
        <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="..." class="avatar-img rounded-circle">
    </div>
    <div class="info">
        <a href="#" aria-expanded="true" style="cursor: default;">
            <span>
                {{ ucwords(auth()->user()->name) }}
                {{-- <span class="user-level">{{ ucfirst(in_array('SuperAdmin',auth()->user()->getRoleNames()->toarray()) ? 'Administrador' : 'Cliente') }}</span> --}}
                {{-- <span class="user-level">{{ auth()->user()->roles->first()->name }}</span>--}}
            </span>
        </a>
        <div class="clearfix"></div>
    </div>
</div>
