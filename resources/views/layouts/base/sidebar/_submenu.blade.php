<a data-toggle="collapse" href="#{{ set_id($title, $id ?? null) }}">
    @isset($icon)
        <i class="{{ $icon }}"></i>
    @endisset
    {{ $title }}
    <span class="caret"></span>
</a>
<div class="collapse" id="{{ set_id($title, $id ?? null) }}">
    <ul class="nav nav-collapse subnav">
        @isset($items)
            @forelse($items as $item)
                <li>
                    <a href="{{ $item['route'] }}">
                        <span class="sub-item">{{ Arr::get($item, 'text') }} </span>
                    </a>
                </li>
            @empty
                <li>
                    <span class="sub-item"> Sin opciones </span>
                </li>
            @endforelse
        @endisset
    </ul>
</div>
