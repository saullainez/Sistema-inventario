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
            <div class="card-header row">
                <div class="col-9">
                    <h5 style="position: relative; top: 1rem;">Administrar Usuarios</h5>
                </div> 
                @can('usuarios.create')
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarUsuarioModal">Nuevo usuario</button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h5 class="card-title">Listado de usuarios</h5>
            <table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th style="width: 3rem;">ID</th>
                        <th style="width: 14rem;">Nombre</th>
                        <th style="width: 27rem;">Correo electrónico</th>
                        <th colspan="4">&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="tablaUsuarios">
                    
                </tbody>
            </table>
            <!--<table class="table table-stripped table-hover">
                <thead>
                    <tr>
                        <th style="width: 3rem;">ID</th>
                        <th style="width: 14rem;">Nombre</th>
                        <th style="width: 27rem;">Correo electrónico</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @can('usuarios.edit')
                                <a href="#" class="btn btn-sm btn-default">Editar</a> 
                            @endcan
                        </td> 
                        <td>
                            @can('usuarios.destroy')
                                <a href="#" class="btn btn-sm btn-danger">Eliminar</a> 
                            @endcan
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->render() }}-->
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

