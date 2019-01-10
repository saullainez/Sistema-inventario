@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <span>Tipo de bebida</span>
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
                <div class="col-6 col-sm-7 col-md-8">
                    <h5 style="position: relative; top: 1rem;">Administrar Tipos de bebida</h5>
                </div> 
                @can('roles.create')
                    <div class="col-6 col-sm-5 col-md-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarTipoBebidaModal">Agregar tipo de bebida</button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h5 class="card-title">Listado de tipos de bebidas</h5>
            <div class="table-responsive">
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 6rem;">ID</th>
                            <th style="width: 35rem;">Nombre</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="tablaTipoBebida">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('tipo_bebida.modales.crear')
@endsection
@section('scripts')
<script type="text/javascript" src="js/tipo_bebida.js"></script>
@endsection