@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <span>Reportes</span>
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
            <div class="card-header row mb-3">
                <div class="col-12 col-sm-12 col-md-12">
                    <h5 style="position: relative; top: 1rem;">Reportes de productos</h5>
                </div> 
            </div>
            <div class="row">
                @can('movimiento-concepto.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>Inventario</a></h4>
                            <a href="/reporte-producto" target="_blank" class="btn btn-primary">Inventario</a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('movimiento-activo.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>movimientos</a></h4>
                            <a href="/movimiento-activo" class="btn btn-primary">movimientos</a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('movimiento-producto.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>Mejores clientes</a></h4>
                            <a href="/movimiento-producto" class="btn btn-primary">Mejores Clientes</a>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>

<br>
<div class="row wow fadeIn">
    <div id="alert" style="display:none;" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong id="mensaje"></strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card" style="width:100%;">
        <div class="container">
            <div class="card-header row mb-3">
                <div class="col-12 col-sm-12 col-md-12">
                    <h5 style="position: relative; top: 1rem;">Reportes de activos</h5>
                </div> 
            </div>
            <div class="row">
                @can('movimiento-concepto.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>Invenario</a></h4>
                            <a href="/reporte-inventario" target="_blank" class="btn btn-primary">Inventario</a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('movimiento-activo.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>Activos</a></h4>
                            <a href="/movimiento-activo" class="btn btn-primary">Activos</a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('movimiento-producto.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>Productos</a></h4>
                            <a href="/movimiento-producto" class="btn btn-primary">Productos</a>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>

@include('reportes.modales.reporteMovActivo');
@endsection
@section('scripts')
<script type="text/javascript">
    $("#movimientos").addClass("active");
    $("#movimientosMenu").addClass("active");
</script>
@endsection