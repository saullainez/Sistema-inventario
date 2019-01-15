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
<div class="row wow fadeIn" style="margin-left: -88px; width: 69.7rem;">
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
                    <h5 style="position: relative; top: 1rem;">Administrar movimientos de productos</h5>
                </div> 
                @can('movimiento-activo.create')
                    <div class="col-6 col-sm-5 col-md-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarMovimientoProductoModal">Agregar movimiento</button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body">
            <h5 class="card-title">Listado de movimientos</h5>
            <div class="table-responsive">
                <table class="table table-stripped table-hover">
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
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="tablaMovimientoProductos">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('movimientoProducto.modales.crear')
@include('movimientoActivo.modales.editar')
@include('movimientoActivo.modales.eliminar')

@endsection
@section('scripts')
<script type="text/javascript" src="js/movimientoProducto.js"></script>
@endsection