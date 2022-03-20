<div class="card full-height">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">{{ $title ?? '' }}</div>
            <div class="card-tools">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                    @forelse ($options as $option)
                        <li class="nav-item">
                            <a class="nav-link" @isset($id) id="{{ $option['id'] }}" @endisset data-toggle="pill" href="javascript::void(0)" role="tab" aria-selected="true">{{ $option['text'] }}</a>
                        </li>
                    @empty

                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        @forelse ($items as $item)
            <div class="d-flex">
                <div class="avatar avatar-online">
                    <span class="avatar-title rounded-circle border border-white bg-{{ $color ?? 'info' }}">{{ $item['char'] ?? 'D' }}</span>
                </div>
                <div class="flex-1 ml-3 pt-1">
                    <h6 class="text-uppercase fw-bold mb-1"> {{ $item['title'] ?? '' }} <span class="text-warning pl-3">{{ $item['state'] ?? '' }}</span></h6>
                    <span class="text-muted">{{ $item['text'] ?? '' }}</span>
                </div>
                <div class="float-right pt-1">
                    <small class="text-muted">{{ $item['time'] ?? '' }}</small>
                </div>
            </div>
            @if (!$loop->last)
                <div class="separator-dashed"></div>
            @endif
        @empty
            <div>
                <p class="text-center">
                    No hay eventos para mostrar
                </p>
            </div>
        @endforelse
    </div>
</div>
