@extends('layouts.base.app', [
    'components' => ['select2']
])

@section('title', 'Categorías '.$category->name)

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Categorías',
        'icon' => 'icon-list',
        'crumbs' => [
            ['route' => route('admin.categories.index'), 'icon' => 'icon-list', 'text' => 'Categorías'],
            ['route' => route('admin.categories.edit', $category), 'text' => $category->name ],
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
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                <i class="icon-arrow-left"></i> Ir a Listado de Categorías
            </a>
        </div>
        <div class="col-12">
            @include('flash::message')
            <div class="card">
                <div class="card-header">
                    <i class="icon-pencil" aria-hidden="true"></i> Editar Categoría: {{ $category->name }}
                </div>
                <div class="card-body">
                    @include('categories.forms.update')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
