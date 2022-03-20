<li class="nav-item dropdown hidden-caret">
    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
        <div class="avatar-sm">
            <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="{{ auth()->user()->name }}" class="avatar-img rounded-circle">
        </div>
    </a>
    <ul class="dropdown-menu dropdown-user animated fade">
        <div class="dropdown-user-scroll scrollbar-outer">
            <li>
                <div class="user-box">
                    <div class="avatar-lg"><img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="image profile" class="avatar-img rounded"></div>
                    <div class="u-text">
                        <h4>{{ auth()->user()->name }}</h4>
                        <p class="text-muted">{{ auth()->user()->email }}</p>
                        <a href="{{ route('admin.usuarios.edit', auth()->user()) }}" class="btn btn-xs btn-secondary btn-sm">Ver perfil</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                        document.querySelector('#logout-form').submit();">
                    <i class="icon-logout"></i> Cerrar sesion
                </a>
                {{ Form::open(['action' => route('logout'), 'id' => 'logout-form']) }}
                {{ Form::close() }}
            </li>
        </div>
    </ul>
</li>
