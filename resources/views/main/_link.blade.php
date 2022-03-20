<div class="col-sm-12 col-md-4 col-lg-3 col-xl-2">
    <div class="card card-stats {{ $style ?? '' }}">
        <div class="card-body ">
            <div class="row">
                <div class="col-12">
                    <div class="icon-big text-center">
                        <a href="{{ $link }}" role="button" class="card-link text-secondary">
                            <i class="{{ $icon }}" style="font-size: 4rem;"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-stats">
                    <div class="numbers">
                        <small>{{ $category }}</small>
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
