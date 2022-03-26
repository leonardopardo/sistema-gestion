@extends('layouts.base.app')

@section('title', 'Principal')

@section('panel-header')
    @include('layouts.base._panel_header', [
        'title' => 'Panel Principal',
        'icon' => 'icon-rocket',
        'color' => 'primary',
        'subtitle' => 'Sistema de Gestión Documental',
        'links' => []
    ])
@endsection

@section('content')
    <div class="page-inner mt--5">
        @include('flash::message')
        <div class="row">

            @include('main._link', [
                "category" => "Facturas",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-docs"
            ])

            @include('main._link', [
                "category" => "Compras",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-drawer"
            ])

            @include('main._link', [
                "category" => "Clientes",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-notebook"
            ])

            @include('main._link', [
                "category" => "Proveedores",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-list"
            ])

            @include('main._link', [
                "category" => "Artículos",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-basket-loaded"
            ])

            @include('main._link', [
                "category" => "Stock",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-chart"
            ])

            @include('main._link', [
                "category" => "Tablas",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-grid"
            ])

            @include('main._link', [
                "category" => "Usuarios",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-user"
            ])

            @include('main._link', [
                "category" => "Roles",
                "title" => 1,
                "link" => route('admin.invoice.index'),
                "icon" => "icon-layers"
            ])

        </div>
    </div>
@endsection
