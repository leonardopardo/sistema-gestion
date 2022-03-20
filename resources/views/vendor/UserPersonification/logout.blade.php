@if (session('inpersonation_id'))
    <li class="nav-item dropdown hidden-caret">
        <a class="nav-link" data-toggle="dropdown" href="#" class="navbar-nav-link text-danger" onclick="event.preventDefault();
            document.getElementById('impersonations-form').submit();" aria-expanded="false">
            <i class="glyphicon glyphicon-user text-danger"></i>
        </a>
        <form id="impersonations-form" action="{{ route('impersonations.destroy') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
@endif



