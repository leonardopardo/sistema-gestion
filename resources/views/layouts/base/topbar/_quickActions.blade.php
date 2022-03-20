<li class="nav-item dropdown hidden-caret">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="fas fa-layer-group"></i>
    </a>
    <div class="dropdown-menu quick-actions quick-actions-info animated fade">
        <div class="quick-actions-header">
            <span class="title mb-1">Acceso Directo</span>
        </div>
        <div class="quick-actions-scroll scrollbar-outer">
            <div class="quick-actions-items">
                <div class="row m-0">
                    @include('layouts.base.topbar._quickAction', [
                        'icon' => 'icon-notebook',
                        'text' => 'Clientes',
                        'route' => route('admin.cuentas.index')
                    ])
                </div>
            </div>
        </div>
    </div>
</li>
