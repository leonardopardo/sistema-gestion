<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            @include('layouts.base.sidebar._profile')

            <ul class="nav nav-primary">
                {{-- Menu Section Main --}}
                @include('layouts.base.sidebar._title_section', [ 'title' => 'Principal' ])

                @include('layouts.base.sidebar._menu_badge', [
                    'title' => 'Panel Principal',
                    'icon' => 'icon-rocket',
                    'route' => route('admin.main.index')
                ])

                {{-- Menu Section Módulos --}}
                @include('layouts.base.sidebar._title_section', ['title' => 'Módulos'])

                {{-- Facturas --}}
                @include('layouts.base.sidebar._menu_badge', [
                    'title' => 'Facturas',
                    'icon' => 'icon-docs',
                    'route' => route('admin.invoice.index'),
                ])

                {{-- Compras --}}
                @include('layouts.base.sidebar._menu_badge', [
                    'title' => 'Compras',
                    'icon' => 'icon-drawer',
                    'route' => route('admin.invoice.index'),
                ])

                {{-- Cuentas --}}
                @include('layouts.base.sidebar._menu_badge', [
                    'title' => 'Clientes',
                    'icon' => 'icon-notebook',
                    'route' => route('admin.cuentas.index'),
                ])

                {{-- Proveedores --}}
                @include('layouts.base.sidebar._menu_badge', [
                    'title' => 'Proveedores',
                    'icon' => 'icon-list',
                    'route' => route('admin.suppliers.index'),
                ])

                {{-- Artículos --}}
                @include('layouts.base.sidebar._menu', [
                    'title' => 'Artículos',
                    'icon' => 'icon-basket-loaded',
                    'route' => '',
                    'items' => [
                        ['route' => '', 'text' => 'Listar Todos', 'icon' => 'icon-list'],
                        ['route' => '', 'text' => 'Cargar Nuevo', 'icon' => 'icon-plus'],
                    ]
                ])

                {{-- Stock --}}
                @include('layouts.base.sidebar._menu', [
                    'title' => 'Stock',
                    'icon' => 'icon-chart',
                    'route' => '',
                    'items' => [
                        ['route' => '', 'text' => 'Ingreso', 'icon' => 'icon-grid'],
                        ['route' => '', 'text' => 'Egreso', 'icon' => 'icon-list'],
                    ]
                ])

                {{-- Menu Section Administración--}}
                @include('layouts.base.sidebar._title_section', ['title' => 'Administración'])

                <li class="nav-item">
                    <a data-toggle="collapse" href="#tablas" class="collapsed" aria-expanded="false">
                        <i class="icon-grid"></i>
                        <p>Tablas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tablas" style="">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.categories.index') }}">
                                    <i class="icon-list"></i> Categorías
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="icon-list"></i> Listas
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="icon-list"></i> Rubros
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Usuarios --}}
                @can('view', new \App\User())
                    @include('layouts.base.sidebar._menu_badge', [
                        'title' => 'Usuarios',
                        'icon' => 'icon-user-following',
                        'route' => route('admin.usuarios.index'),
                    ])
                @endcan

                {{-- Roles --}}
                @can('view', new \App\Models\Role())
                    @include('layouts.base.sidebar._menu_badge', [
                        'title' => 'Roles',
                        'icon' => 'icon-layers',
                        'route' => route('admin.roles.index'),
                    ])
                @endcan

            </ul>
        </div>
    </div>
</div>
