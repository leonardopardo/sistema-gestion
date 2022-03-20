@extends('layouts.base.app', [
    'components' => [
        'datatables'
    ]
])

@section('title', 'Usuarios')

@section('breadcrumb')
    @include('layouts.base._breadcrumb', [
        'title' => 'Usuarios',
        'icon' => 'icon-user-following',
        'subtitle' => 'Usuarios',
        'crumbs' => [
            ['route' => route('admin.usuarios.index'), 'icon' => 'icon-user', 'text' => 'Usuarios'],
            ['route' => '#', 'icon' => 'icon-menu', 'text' => 'Listado']
        ],
        'links' => []
    ])
@endsection

@section('content')
<div class="page-inner mt--5">
    @include('flash::message')
    <div class="row">
        @can('create', new \App\User)
        <div class="col-12 mb-3">
            <a href='#' class='btn btn-primary' data-toggle='modal' data-target='#modal-usuario'>
            <i class="icon-plus"></i> Nuevo Usuarios
            </a>
        </div>
        @endcan
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            <i class="icon-menu"></i> Listado de Usuarios
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('usuarios.tables.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@can('create', new \App\User)
<div class="modal fade" id="modal-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-create-banco-title">
                    <i class="icon-plus"></i> Nuevo Usuario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    {{ Form::open(['action' => route('admin.usuarios.store')]) }}
                    @include('usuarios.modals.create', ['pass_sugerida' => random_password()])
                    {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endcan

@endsection

@push('scripts')
    @if(count($errors->all()) > 0)
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#modal-usuario').modal('show');
            });
        </script>
    @endif
@endpush
