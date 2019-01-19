@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <span>Empresas</span>
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
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <h5 style="position: relative; top: 1rem;">Administrar Empresas</h5>
                </div> 
                @can('empresa.create')
                    <div class="col-4 col-sm-4 col-md-2 col-lg-2" style="margin-left: 0rem; margin-right: -0.8rem;">
                        <button type="button" class="btn btn-primary btn-panel" data-toggle="modal" data-target="#agregarEmpresaModal"><i class="fas fa-plus mt-0"></i></button>
                    </div>
                @endcan
                @can('empresa.edit')
                    <div class="col-4 col-sm-4 col-md-2 col-lg-2" style="margin-left: -2.9rem;">
                        <button disabled type="button" class="btn btn-default btn-panel" id="actEmpresa"><i class="fas fa-pencil-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('empresa.destroy')
                    <div class="col-4 col-sm-4 col-md-2 col-lg-2" style="margin-left: -3.7rem;">
                        <button disabled type="button" class="btn btn-danger btn-panel" id="elEmpresa"><i class="far fa-trash-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('empresa.index')
                    <div class="col-4 col-sm-4 col-md-2 col-lg-2" style="margin-left: -3.7rem;">
                        <button disabled style="padding-right: 0.7rem; padding-left: 0.7rem;" type="button" class="btn btn-default btn-panel" id="verContacto"><i class="fas fa-eye mt-0 mr-1"></i>Contacto</button>
                    </div>
                @endcan

            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title text-center">Listado de empresas</h4>
            <div class="px-4">
                <div class="table-wrapper table-responsive">
                    <table id="tablaEmpresa" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Fecha de pago</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Fecha de pago</th>
                                <th>Tipo</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('empresas.modales.crear')
@include('empresas.modales.contacto')
@include('empresas.modales.editar')
@include('empresas.modales.eliminar')
@endsection
@section('scripts')
<script type="text/javascript" src="js/empresa.js"></script>
@endsection