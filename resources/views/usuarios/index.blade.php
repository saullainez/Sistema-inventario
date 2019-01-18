@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <span>Usuarios</span>
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
            <div class="card-header row normal">
                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <h5 style="position: relative; top: 1rem;">Administrar Usuarios</h5>
                </div> 
                @can('usuarios.create')
                    <div class="col-4 col-sm-1 col-md-1 col-lg-1" style="margin-left: 9rem; margin-right: -3rem;">
                        <button type="button" class="btn btn-primary btn-panel" data-toggle="modal" data-target="#agregarUsuarioModal"><i class="fas fa-plus mt-0"></i></button>
                    </div>
                @endcan
                @can('usuarios.edit')
                    <div class="col-4 col-sm-1 col-md-1 col-lg-1" style="margin-right: -5rem; margin-left: 2rem;">
                        <button disabled type="button" class="btn btn-default btn-panel" id="actUsuario"><i class="fas fa-pencil-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('usuarios.destroy')
                    <div class="col-4 col-sm-1 col-md-1 col-lg-1" style="margin-left: 4rem;">
                        <button disabled type="button" class="btn btn-danger btn-panel" id="elUsuario"><i class="far fa-trash-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('roles.index')
                    <div class="col-4 col-sm-2 col-md-2 col-lg-2" style="margin-left: -1rem; margin-right: -3rem;">
                        <button id="VerRolUsuario" disabled style="margin-right: -1rem; padding-right: 1rem; padding-left: 1rem;" type="button" class="btn btn-default btn-panel"><i class="fas fa-eye mt-0 mr-1"></i>Roles</button>
                    </div>
                @endcan
                @can('usuarios.agregarrol')
                    <div class="col-4 col-sm-2 col-md-2 col-lg-2" style="margin-left: 0rem;">
                        <button id="AgregarRolUsuario" disabled style="margin-right: -1rem; padding-right: 1rem; padding-left: 1rem;" type="button" class="btn btn-primary btn-panel"><i class="fas fa-plus mt-0 mr-1"></i>Roles</button>
                    </div>
                @endcan
            </div>
        </div>
        <div class="container movil">
            <div class="row mb-2">
                <div class="col-12 text-center">
                    <h5 style="position: relative; top: 1rem;">Administrar Usuarios</h5>
                </div> 
            </div>
            <div class="row">
                @can('usuarios.create')
                    <div class="col-2">
                        <button  type="button" class="btn btn-primary btn-panel" data-toggle="modal" data-target="#agregarUsuarioModal"><i class="fas fa-plus mt-0"></i></button>
                    </div>
                @endcan
                @can('usuarios.edit')
                    <div class="col-2">
                        <button disabled type="button" class="btn btn-default btn-panel" id="actUsuarioM"><i class="fas fa-pencil-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('usuarios.destroy')
                    <div class="col-2">
                        <button disabled type="button" class="btn btn-danger btn-panel" id="elUsuarioM"><i class="far fa-trash-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('roles.index')
                    <div class="col-2">
                        <button disabled style="margin-right: -1rem; padding-right: 1rem; padding-left: 1rem;" type=" disabled" class="btn btn-primary btn-panel" id="VerRolUsuarioM"><i class="fas fa-eye mt-0 mr-1"></i>Roles</button>
                    </div>
                @endcan
                @can('usuarios.agregarrol')
                    <div class="col-2">
                        <button disabled style="margin-right: -1rem; padding-right: 1rem; padding-left: 1rem;" type="button" class="btn btn-primary btn-panel" id="AgregarRolUsuarioM"><i class="fas fa-plus mt-0 mr-1"></i>Roles</button>
                    </div>
                @endcan
            </div>

        </div>

        <div class="card-body">
            <h4 class="card-title text-center">Listado de usuarios</h4>
            <div class="px-4">
                <div class="table-wrapper table-responsive">
                    <table id="tablaUsuarios" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('usuarios.modales.crear')
@include('usuarios.modales.editar')
@include('usuarios.modales.eliminar')
@include('usuarios.modales.agregarrol')
@include('usuarios.modales.verroles')
@endsection
@section('scripts')
<script type="text/javascript" src="js/usuarios.js"></script>
@endsection

