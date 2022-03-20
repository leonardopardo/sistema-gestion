<li class="nav-item dropdown hidden-caret">
    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>
        @if(Auth::user()->present()->notificationsCount() > 0)
        <span class="notification" id="count_notifications">{{ Auth::user()->present()->notificationsCount() }}</span>
        @endif
    </a>
    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
        <li>
            <div class="dropdown-title">Tienes <span id="count_notifications_span">{{ Auth::user()->present()->notificationsCount() }}</span> notificaciones</div>
        </li>
        <li>
            <div class="notif-scroll scrollbar-outer">
                <div class="notif-center" id="list_notifications">

                    @forelse (Auth::user()->notifications as $notification)
                        @include('layouts.base.topbar._notification', [
                            'title' => $notification->data['titulo'],
                            'icon' => $notification->data['icon'] ?? 'fas fa-file-alt',
                            'color' => $notification->data['color'] ?? '',
                            'time' => $notification->created_at->format('d/m/Y h:m'),
                            'route' => route($notification->data['link'], [$notification->data['id']]),
                            'id' => $notification->id
                        ])
                    @empty
                        <div class="notif-content">
                            <p class="m-3 text-center">No hay notificaciones</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </li>
        @if(Auth::user()->present()->notificationsCount() > 0)
            <li>
                <a class="see-all" href="javascript:void(0);" id="mark_notification_all" data-code="all">Marcar notificaciones como leidas<i class="fa fa-angle-right"></i> </a>
            </li>
        @endif
    </ul>
</li>

@push('scripts')

    <script>

        $(document).ready(function() {
            $(document).on('click', '[id^=mark_notification_]', function() {

                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:  {
                        notification: $(this).data('code')
                    },
                    url: '{{ route("notifications.check") }}',
                    type:  'POST'
                })
                .done(resp => {
                    if(resp.delete) {
                        $('#list_notifications').children().remove();
                        $('#count_notifications').text(0);
                        $('#count_notifications_span').text(0);
                    }
                })
                .fail(async error => {
                    console.log(error)
                })
            })
        })

    </script>

@endpush
