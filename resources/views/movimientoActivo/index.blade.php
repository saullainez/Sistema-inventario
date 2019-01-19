@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <a href="/movimientos">Movimientos</a>
            <span>/</span>
            <span>Activos</span>
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
                    <h5 style="position: relative; top: 1rem;">Administrar movimientos de activos</h5>
                </div> 
                @can('movimiento-activo.create')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-left: 2rem; margin-right: -1rem;">
                        <button type="button" class="btn btn-primary btn-panel1" data-toggle="modal" data-target="#agregarMovimientoActivoModal"><i class="fas fa-plus mt-0"></i></button>
                    </div>
                @endcan
                @can('movimiento-activo.edit')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-right: -3rem;">
                        <button disabled type="button" class="btn btn-default btn-panel1" id="actMovimientoActivo"><i class="fas fa-pencil-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('movimiento-activo.destroy')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-left: 2rem;">
                        <button disabled type="button" class="btn btn-danger btn-panel1" id="elMovimientoActivo"><i class="far fa-trash-alt mt-0"></i></button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title">Listado de movimientos</h4>
            <div class="px-4">
                <div class="table-wrapper table-responsive">
                    <table id="tablaMovimientoActivos" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Activo</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Monto</th>
                                <th>Empresa</th>
                                <th >Concepto</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Activo</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Monto</th>
                                <th>Empresa</th>
                                <th >Concepto</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('movimientoActivo.modales.crear')
@include('movimientoActivo.modales.editar')
@include('movimientoActivo.modales.eliminar')

@endsection
@section('scripts')
<script type="text/javascript" src="js/movimientoActivo.js"></script>
@endsection