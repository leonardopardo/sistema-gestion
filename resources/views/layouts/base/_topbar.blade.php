<div class="main-header">
    <div class="logo-header" data-background-color="blue2">
        <a href="#" class="logo">
            <p class="navbar-brand text-white">
                <i class="icon-social-dropbox"></i> Gestión <small class="text-white-50">v1.0</small>
            </p>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>

    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                @include('layouts.base.topbar._quickActions')
                @include('layouts.base.topbar._profile')
                {{ UserPersonification::logoutForm() }}
            </ul>
        </div>
    </nav>
</div>
