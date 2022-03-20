<li class="nav-item {{ setActiveBaseRoute($items) }}">
    <a data-toggle="collapse" href="#{{ set_id($title, $id ?? null) }}" class="collapsed" aria-expanded="false">
        <i class="{{ $icon ?? 'fas fa-home' }}"></i>
        <p> {{ $title }} </p>
        <span class="caret"></span>
    </a>
    <div class="{{ setExpandedBaseRoute($items) }}" id="{{ set_id($title, $id ?? null) }}">
        <ul class="nav nav-collapse">
            @isset($items)
                @forelse($items as $item)
                    @if(isset($item['submenu']) && $item['submenu'])
                    <li>
                        @include('layouts.base.sidebar._submenu', [
                            'id' =>  Arr::get($item,'id'),
                            'title' => Arr::get($item,'title'),
                            'items' => Arr::get($item,'items'),
                            'icon' => Arr::get($item, 'icon')
                        ])
                    </li>
                    @else
                    <li class="{{ setActiveUrl(Arr::get($item, 'route')) }}">
                        <a href="{{ Arr::get($item, 'route', '#') }}">
                            <i class="{{ Arr::get($item, 'icon', 'fas fa-genderless') }}"></i> {{ Arr::get($item, 'text') }}
                        </a>
                    </li>
                    @endif
                @empty
                    <li>
                        <span class="sub-item"> Sin opciones </span>
                    </li>
                @endforelse
            @endisset
        </ul>
    </div>
</li>
