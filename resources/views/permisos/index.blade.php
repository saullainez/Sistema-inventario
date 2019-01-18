@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <span>Permisos</span>
        </h4>
    </div>
</div>
<div class="row wow fadeIn">
    <div id="alert" style="display:none;" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong id="mensaje"></strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card" style="width:100%;">
        <div class="container">
            <div class="card-header row">
                <div class="col-12 col-sm-12 col-md-3 col-lg-6">
                    <h5 style="position: relative; top: 1rem;">Administrar Permisos</h5>
                </div> 
                @can('permisos.create')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-left: 6rem; margin-right: -3rem;">
                        <button type="button" class="btn btn-primary btn-panel" data-toggle="modal" data-target="#agregarPermisoModal"><i class="fas fa-plus mt-0"></i></button>
                    </div>
                @endcan
                @can('permisos.edit')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-right: -3rem;">
                        <button disabled type="button" class="btn btn-default btn-panel" id="actPermiso"><i class="fas fa-pencil-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('permisos.destroy')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2">
                        <button disabled type="button" class="btn btn-danger btn-panel" id="elPermiso"><i class="far fa-trash-alt mt-0"></i></button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title text-center">Listado de permisos</h4>
            <div class="px-4">
                <div class="table-wrapper table-responsive">
                    <table id="tablaPermisos" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('permisos.modales.crear')
@include('permisos.modales.editar')
@include('permisos.modales.eliminar')
@endsection
@section('scripts')
<script type="text/javascript" src="js/permisos.js"></script>
@endsection