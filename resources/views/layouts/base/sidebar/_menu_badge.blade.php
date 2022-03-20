<li class="nav-item {{ setActiveUrl($route) }}">
    <a href="{{ isset($route) && $route ? $route : 'javascript::void(0)' }}">
        <i class="{{ $icon ?? '' }}"></i>
        <p>{{ $title }}</p>
        @isset($badge)
        <span class="badge badge-{{ Arr::get($badge, 'color', 'default') }}"> {{ Arr::get($badge, 'count', '0') }}</span>
        @endisset
    </a>
</li>