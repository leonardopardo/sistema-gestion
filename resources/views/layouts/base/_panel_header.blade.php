<div class="panel-header bg-{{ $color ?? 'primary' }}">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="pb-2 fw-bold text-white">
                    <i class="{{ $icon ?? '' }}"></i> {{ $title ?? '' }}
                    @isset($badge)
                        <span class="badge badge-{{ Arr::get($badge, 'color', 'primary') }}">{{ Arr::get($badge, 'text') }}</span>
                    @endisset
                </h2>
                <h5 class="op-7 mb-2 text-white">{{ $subtitle ?? '' }}</h5>
            </div>
            @isset($links)
            <div class="ml-md-auto py-2 py-md-0">
                @foreach($links as $link)
                    <a href="{{ $link['route'] }}" class="btn btn-light ml-2"><i class="{{ $link['icon'] ?? '' }}"></i> {{ $link['text'] ?? '' }}</a>
                @endforeach
            </div>
            @endisset
        </div>
    </div>
</div>
