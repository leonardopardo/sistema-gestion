@extends('layouts.base.app', [
    'components' => ['select2']
])

@section('title', 'Juzgado '.$juzgado->nombre)

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Juzgados',
        'icon' => 'icon-briefcase',
        'crumbs' => [
            ['route' => route('admin.juzgados.index'), 'icon' => 'icon-briefcase', 'text' => 'Juzgados'],
            ['route' => route('admin.juzgados.edit', $juzgado), 'text' => $juzgado->nombre ],
        ]
    ])
@endsection

@push('styles')
    <style type="text/css">
        .flat{
            box-shadow: none;
        }
    </style>
@endpush

@section('content')
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ route('admin.juzgados.index') }}" class="btn btn-primary">
                <i class="icon-arrow-left"></i> Ir a Listado de Juzgados
            </a>
        </div>
        <div class="col-12">
            @include('flash::message')
            <div class="card">
                <div class="card-header">
                    <i class="icon-pencil" aria-hidden="true"></i> Editar Juzgado: {{ $juzgado->nombre }}
                </div>
                <div class="card-body">
                    @include('juzgados.forms.update')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
