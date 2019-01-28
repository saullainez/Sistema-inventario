@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <a href="/home">Dashboard</a>
            <span>/</span>
            <span>Movimientos</span>
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
                    <h5 style="position: relative; top: 1rem;">Administrar movimientos</h5>
                </div> 
            </div>
            <div class="row">
                @can('movimiento-concepto.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>Conceptos</a></h4>
                            <a href="/movimiento-concepto" class="btn btn-primary">Conceptos</a>
                        </div>
                    </div>
                </div>
                @endcan
                @can('movimiento-activo.index')
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><a>Materia prima</a></h4>
                            <a href="/movimiento-activo" class="btn btn-primary">Materia prima</a>
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

@endsection
@section('scripts')
<script type="text/javascript">
    $("#movimientos").addClass("active");
    $("#movimientosMenu").addClass("active");
</script>
@endsection