<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @foreach($links as $link)
                    <a href="{{ $link['route'] }}" class="btn btn-outline-primary btn-xs ml-2"><i class="{{ $link['icon'] ?? '' }}"></i> {{ $link['text'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
