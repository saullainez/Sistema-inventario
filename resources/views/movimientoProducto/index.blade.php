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
            <span>Productos</span>
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
                    <h5 style="position: relative; top: 1rem;">Administrar movimientos de productos</h5>
                </div> 
                @can('movimiento-producto.create')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-left: 2rem; margin-right: -1rem;">
                        <button type="button" class="btn btn-primary btn-panel1" data-toggle="modal" data-target="#agregarMovimientoProductoModal"><i class="fas fa-plus mt-0"></i></button>
                    </div>
                @endcan
                @can('movimiento-producto.edit')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-right: -3rem;">
                        <button disabled type="button" class="btn btn-default btn-panel1" id="actMovimientoProducto"><i class="fas fa-pencil-alt mt-0"></i></button>
                    </div>
                @endcan
                @can('movimiento-producto.destroy')
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" style="margin-left: 2rem;">
                        <button disabled type="button" class="btn btn-danger btn-panel1" id="elMovimientoProducto"><i class="far fa-trash-alt mt-0"></i></button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title text-center">Listado de movimientos</h4>
            <div class="px-4">
                <div class="table-wrapper table-responsive">
                    <table id="tablaMovimientoProductos" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Presentación</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Año Cosecha</th>
                                <th>Cantidad</th>
                                <th>Empresa</th>
                                <th >Concepto</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Presentación</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Año Cosecha</th>
                                <th>Cantidad</th>
                                <th>Empresa</th>
                                <th >Concepto</th>
                                <th>Monto</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('movimientoProducto.modales.crear')
@include('movimientoProducto.modales.editar')
@include('movimientoProducto.modales.eliminar')

@endsection
@section('scripts')
<script type="text/javascript" src="js/movimientoProducto.js"></script>
@endsection