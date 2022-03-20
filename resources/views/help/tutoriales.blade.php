@extends('layouts.base.app', [
    'components' => [
        'datatables'
    ]
])

@section('title', 'Tutoriales')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Tutoriales',
        'icon' => 'icon-social-youtube',
        'subtitle' => 'Tutoriales',
        'crumbs' => [
            ['route' => route('admin.help.tutoriales'), 'icon' => 'icon-social-youtube', 'text' => 'Tutoriales'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
<div class="page-inner mt--5">
    @include('flash::message')
    <div class="row">
        @foreach ($groups as $t)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                <i class="icon-arrow-right"></i> {{ $t->title }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $t->body !!}
                        <br>
                        <br>
                        <br>
                        {!! $t->iframe !!}
                    </div>
                </div>
            </div>            
        @endforeach
    </div>
</div>

@endsection