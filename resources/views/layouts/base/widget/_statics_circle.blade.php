<div class="card full-height">
    <div class="card-body">
    <div class="card-title">{{ $title ?? '' }}</div>
        <div class="card-category">{{ $subTitle ?? '' }}</div>
        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
            @forelse ($items as $item)
                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="{{ Arr::get($item, 'id') }}"></div>
                    <h6 class="fw-bold mt-3 mb-0">{{ Arr::get($item, 'text') }}</h6>
                </div>
            @empty
                <p class="text-center">
                    No hay información en este momento.
                </p>
            @endforelse
        </div>
    </div>
</div>

{{-- chart_circles --}}
@push('scripts')
    <script>
        @foreach($items as $item)
            Circles.create({
                id:'{{ Arr::get($item, 'id') }}',
                radius:50,
                value:'{{ Arr::get($item, 'count', 0) }}',
                maxValue:{{ $maxValue }},
                width:7,
                text: '{{ Arr::get($item, 'count', 0) }}',
                colors:['#f1f1f1', '{{ Arr::get($item,'color') }}'],
                duration:500,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            });
        @endforeach
    </script>
@endpush
