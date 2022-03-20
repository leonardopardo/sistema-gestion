<a href="{{ isset($route) ? $route : '#' }}" id="mark_notification_{{ $id }}" data-code="{{ $id }}">
    @if(isset($img))
    <div class="notif-img"> 
        <img src="{{ $img }}" alt="{{ $img}}">
    </div>
    @else
    <div class="notif-icon notif-{{ $color ?? 'primary' }}"> <i class="{{ $icon ?? '' }}"></i> </div>
    @endif
    <div class="notif-content">
        <span class="block">
            {{ $title }}
        </span>
        <span class="time">{{ $time }}</span> 
    </div>
</a>