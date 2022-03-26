<div class="sidebar sidebar-style-2" data-background-color="white">
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

                {{-- Tablas --}}
                @can('view', new \App\User())
                    @include('layouts.base.sidebar._menu', [
                        'title' => 'Tablas',
                        'icon' => 'icon-grid',
                        'route' => '',
                        'items' => [
                            ['route' => route('admin.categories.index'), 'text' => 'Categorías', 'icon' => 'icon-list'],
                            ['route' => route('admin.headings.index'), 'text' => 'Rubros', 'icon' => 'icon-list'],
                        ]
                    ])
                @endcan

                {{-- Permisos --}}
                @can('view', new \App\User())
                    @include('layouts.base.sidebar._menu', [
                        'title' => 'Permisos',
                        'icon' => 'icon-lock-open',
                        'route' => '',
                        'items' => [
                            ['route' => route('admin.usuarios.index'), 'text' => 'Usuarios', 'icon' => 'icon-user-following'],
                            ['route' => route('admin.roles.index'), 'text' => 'Roles', 'icon' => 'icon-layers'],
                        ]
                    ])
                @endcan

                {{-- Configuraciones --}}
                @can('view', new \App\User())
                    @include('layouts.base.sidebar._menu', [
                        'title' => 'Configuración',
                        'icon' => 'icon-settings',
                        'route' => '',
                        'items' => [
                            ['route' => '', 'text' => 'Plantillas', 'icon' => 'icon-list']
                        ]
                    ])
                @endcan

            </ul>
        </div>
    </div>
</div>
