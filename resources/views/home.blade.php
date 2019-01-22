@extends('layouts.layout')
@section('content')
<div class="card mb-4 wow fadeIn">
    <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="/">Inicio</a>
            <span>/</span>
            <span>Dashboard</span>
        </h4>
    </div>
</div>
<div class="row wow fadeIn">
    @can('usuarios.index')
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="caja-info caja-verde">
                <span class="caja-info-icono">
                    <i class="fa fa-user"></i>
                </span>
                <div class="caja-info-contenido">
                    <span class="caja-info-texto">Usuarios</span>
                    <span class="caja-info-numero"> {{ count($usuarios) }} </span>
                    <div class="caja-divisor"></div>
                    <span class="caja-administrar"><a href="/usuarios" class="boton">Administrar</a></span>
                </div>
            </div>
        </div>
    @endcan
    @can('empresa.index')
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="caja-info caja-roja">
                <span class="caja-info-icono">
                    <i class="fas fa-users"></i>
                </span>
                <div class="caja-info-contenido">
                    <span class="caja-info-texto">Clientes</span>
                    <span class="caja-info-numero">{{ count($clientes) }}</span>
                    <div class="caja-divisor"></div>
                    <span class="caja-administrar"><a href="/empresa" class="boton">Administrar</a></span>
                </div>
            </div>
        </div>
    @endcan
    @can('empresa.index')
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="caja-info caja-azul">
                <span class="caja-info-icono">
                    <i class="fas fa-truck"></i>
                </span>
                <div class="caja-info-contenido">
                    <span class="caja-info-texto">Proveedores</span>
                    <span class="caja-info-numero">{{ count($proveedores) }}</span>
                    <div class="caja-divisor"></div>
                    <span class="caja-administrar"><a href="/empresa" class="boton">Administrar</a></span>
                </div>
            </div>
        </div>
    @endcan
    @can('activo.index')
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="caja-info caja-morada">
                <span class="caja-info-icono">
                    <i class="far fa-check-circle"></i>
                </span>
                <div class="caja-info-contenido">
                    <span class="caja-info-texto">Activos</span>
                    <span class="caja-info-numero">{{ count($activos) }}</span>
                    <div class="caja-divisor"></div>
                    <span class="caja-administrar"><a href="/activo" class="boton">Administrar</a></span>
                </div>
            </div>
        </div>
    @endcan
    @can('producto.index')
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="caja-info caja-amarilla">
                <span class="caja-info-icono">
                    <i class="fas fa-boxes"></i>
                </span>
                <div class="caja-info-contenido">
                    <span class="caja-info-texto">Productos</span>
                    <span class="caja-info-numero">{{ count($productos) }}</span>
                    <div class="caja-divisor"></div>
                    <span class="caja-administrar"><a href="/producto" class="boton">Administrar</a></span>
                </div>
            </div>
        </div>
    @endcan
    @can('presentacion.index')
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="caja-info caja-azuloscuro">
                <span class="caja-info-icono">
                    <i class="fas fa-wine-bottle"></i>
                </span>
                <div class="caja-info-contenido">
                    <span class="caja-info-texto">Presentaciones</span>
                    <span class="caja-info-numero">{{ count($presentaciones) }}</span>
                    <div class="caja-divisor"></div>
                    <span class="caja-administrar"><a href="/presentacion" class="boton">Administrar</a></span>
                </div>
            </div>
        </div>
    @endcan
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <div class="card-body row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="caja-info caja-verdegris">
                            <span class="caja-info-icono">
                                <i class="fas fa-warehouse"></i>
                            </span>
                            <div class="caja-info-contenido">
                                <span class="caja-info-texto" style="text-align:center;">Inventario de activos</span>
                                <span class="caja-info-numero" style="text-align:center;">{{ count($inventariosActivos) }}</span>
                                <div class="caja-divisor"></div>
                                <span class="caja-administrar"><a href="/reporte-inventario" target="_blank" class="boton"><i class="fas fa-eye mt-0 mr-1"></i>Ver reporte</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-md-9 mb-4">

        <div class="card">
            <div class="card-header text-center">
                Pie chart
            </div>

            <div class="card-body">

                <canvas id="myChart"></canvas>

            </div>

        </div>
    </div>-->
    
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="js/home.js"></script>
<script>
    var inventarioActivos = @json($inventariosActivos);
    var labels=[];
    var data=[];
    for (i = 0; i < inventarioActivos.length; i++){
        labels.push(inventarioActivos[i].ActivoNombre);
        data.push(inventarioActivos[i].Cantidad);
    }
    console.log(labels);
    console.log(data);
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {

            labels: labels ,
            datasets: [{
                label: "Inventario de activos",
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection