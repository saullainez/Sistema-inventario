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
<div class="row wow fadeIn" style="margin-left: -88px; width: 68.8rem;">
    <div id="alert" style="display:none;" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong id="mensaje"></strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card" style="width:100%;">
        <div class="container">
            <div class="card-header row">
                <div class="col-7 col-sm-8 col-md-9">
                    <h5 style="position: relative; top: 1rem;">Administrar Empresas</h5>
                </div> 
                @can('empresa.create')
                    <div class="col-5 col-sm-4 col-md-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarEmpresaModal">Agregar empresa</button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h5 class="card-title">Listado de empresas</h5>
            <div class="table-responsive">
                <table class="table table-stripped table-hover">
                    <thead>
                        <!--<tr>
                            <th style="width: 6rem;">ID</th>
                            <th style="width: 6rem;">Nombre</th>
                            <th style="width: 6rem;">Dirección</th>
                            <th style="width: 6rem;">Teléfono</th>
                            <th style="width: 6rem;">Correo</th>
                            <th style="width: 6rem;">Contacto</th>
                            <th style="width: 6rem;">Contacto teléfono</th>
                            <th style="width: 6rem;">Contacto correo</th>
                            <th style="width: 6rem;">Fecha de pago</th>
                            <th style="width: 6rem;">Tipo</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>-->
                        <tr>
                            <th style="width: 6rem;">ID</th>
                            <th style="width: 6rem;">Nombre</th>
                            <th style="width: 6rem;">Dirección</th>
                            <th style="width: 6rem;">Teléfono</th>
                            <th style="width: 6rem;">Correo</th>
                            <th style="width: 6rem;">Fecha de pago</th>
                            <th style="width: 6rem;">Tipo</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="tablaEmpresa">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('empresas.modales.crear')
@include('empresas.modales.contacto')
@endsection
@section('scripts')
<script type="text/javascript" src="js/empresa.js"></script>
@endsection