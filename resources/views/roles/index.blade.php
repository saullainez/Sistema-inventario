@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <span>Roles</span>
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
                <div class="col-9">
                    <h5 style="position: relative; top: 1rem;">Administrar Roles</h5>
                </div> 
                @can('roles.create')
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarRolModal">Nuevo rol</button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h5 class="card-title">Listado de roles</h5>
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th style="width: 3rem;">ID</th>
                        <th style="width: 17rem;">Nombre</th>
                        <th style="width: 17rem;">Slug</th>
                        <th style="width: 29rem;">Descripción</th>
                        <th style="width: 22rem;">Especial</th>
                        <th colspan="4">&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="tablaRoles">

                </tbody>
            </table>
        </div>
    </div>
</div>
@include('roles.modales.crear')
@include('roles.modales.editar')
@include('roles.modales.eliminar')
@include('roles.modales.agregarpermiso')
@include('roles.modales.verpermisos')
@endsection
@section('scripts')
<script type="text/javascript" src="js/roles.js"></script>
@endsection

