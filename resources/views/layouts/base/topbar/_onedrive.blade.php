<li class="nav-item dropdown hidden-caret">

    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        @if(!empty($one_drive->getAccessToken()) && !is_a($one_drive->getAccessToken(), 'IdentityProviderException'))
            <span class="mr-2"><strong>OneDrive</strong> Conectado</span> <i class="fa fa-cloud text-success"></i>
        @else
            <span class="mr-2"><strong>OneDrive</strong> Desconectado</span> <i class="fas fa-power-off text-danger"></i>
        @endif
    </a>
    <div class="dropdown-menu quick-actions quick-actions-info animated fade">
        <div class="dropdown-title">Estado de conexión con OneDrive</div>
        <div class="quick-actions-scroll scrollbar-outer">
            <div class="quick-actions-items">
                <div class="row m-0">
                    <div class="col-xs-12">
                        @if(!empty($one_drive->getAccessToken()) && !is_a($one_drive->getAccessToken(), 'IdentityProviderException'))
                            <h4>Hola !</h4>
                            <p>Ya se encuentra conectado a OneDrive</p>
                        @else
                            <p>No se encuentra conectado a OneDrive</p>
                            <a href="{{ route('admin.authGraph.signin') }}" class="btn btn-primary btn-large">Haga click aquá para conectarse</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
