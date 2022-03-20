<div class="page-inner">
    <div class="row">
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-8 col-xl-9">
            <div class="page-header">
                <h4 class="page-title" data-toggle="tooltip" title="{{ $title ?? '' }}"><i class="{{ $icon ?? '' }}"></i> {{ $title ?? 'Panel' }}</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.main.index') }}"><i class="icon-rocket"></i> Main</a>
                    </li>
                    @isset($crumbs)
                        @foreach ($crumbs as $crumb)
                            <li class="separator"><i class="flaticon-right-arrow"></i></li>
                            @if($loop->last)
                                <li class="nav-item"><i class="{{ $crumb['icon'] ?? '' }}"></i> {{ $crumb['text'] }}</li>
                            @else
                                <li class="nav-item"><a href="{{ $crumb['route'] ?? '#' }}"><i class="{{ $crumb['icon'] ?? '' }}"></i> {{ $crumb['text'] }} </a></li>
                            @endif
                        @endforeach
                    @endisset
                </ul>
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-4 col-xl-3">
            @isset($links)
                @foreach($links as $link)
                    <a href="{{ $link['route'] }}" class="btn btn-{{ $link['style'] ?? 'primary' }} btn-rounded btn-sm ml-2 pull-right"><i class="{{ $link['icon'] ?? '' }}"></i> {{ $link['text'] }}</a>
                @endforeach
            @endisset
        </div>
    </div>
</div>
