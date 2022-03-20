<li class="nav-item dropdown hidden-caret">

    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-envelope"></i>
    </a>
    <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
        <li>
            <div class="dropdown-title d-flex justify-content-between align-items-center">
                Mensajes
                <a href="#" class="small">Marcar todos como leidos</a>
            </div>
        </li>
        <li>
            <div class="message-notif-scroll scrollbar-outer">
                <div class="notif-center">

                    @include('layouts.base.topbar._message', [
                        'subject' => 'Rodrigo',
                        'message' => 'Mensaje de prueba',
                        'time' => 'Hace ' . date('i') . ' minutos'
                    ])

                    @include('layouts.base.topbar._message', [
                        'subject' => 'Jonathan',
                        'message' => 'Mensaje de prueba',
                        'time' => 'Hace ' . date('i') . ' minutos'
                    ])

                    @include('layouts.base.topbar._message', [
                        'subject' => 'Lucas',
                        'message' => 'Mensaje de prueba',
                        'time' => 'Hace ' . date('i') . ' minutos'
                    ])

                    @include('layouts.base.topbar._message', [
                        'subject' => 'Franco',
                        'message' => 'Mensaje de prueba',
                        'time' => 'Hace ' . date('i') . ' minutos'
                    ])

                </div>
            </div>
        </li>
        <li>
            <a class="see-all" href="javascript:void(0);">Ver todos los mensajes<i class="fa fa-angle-right"></i> </a>
        </li>
    </ul>
</li>
