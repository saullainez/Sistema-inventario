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
                    <span class="caja-info-texto">Materia prima</span>
                    <span class="caja-info-numero">{{ count($activos) }}</span>
                    <span class="caja-info-desc">Consumibles: {{ count($consumibles) }}</span>
                    <span class="caja-info-desc">Equipo: {{ count($equipos) }}</span>

                    <div class="caja-divisor-esp"></div>
                    <span class="caja-administrar-esp"><a href="/activo" class="boton">Administrar</a></span>
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
                    <span class="caja-info-texto">Producto final</span>
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
                                <span class="caja-info-texto-chart">Inventario de materia prima</span>
                                <span class="caja-info-numero-chart">{{ count($activos) }}</span>
                                <span class="caja-info-chart">Consumibles: {{ count($consumibles) }}</span>
                                <span class="caja-info-chart">Equipo: {{ count($equipos) }}</span>
                                <div class="caja-divisor-chart"></div>
                                <span class="caja-administrar-esp"><a href="/reporte-inventario" target="_blank" class="boton"><i class="fas fa-eye mt-0 mr-1"></i>Ver reporte</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="consumibles-tab" data-toggle="tab" href="#consumibles" role="tab" aria-controls="consumibles" aria-selected="true">Consumibles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="equipos-tab" data-toggle="tab" href="#equipos" role="tab" aria-controls="equipos" aria-selected="false">Equipos</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="consumibles" role="tabpanel" aria-labelledby="consumibles-tab">
                                <canvas id="chartConsumibles"></canvas>
                            </div>
                            <div class="tab-pane fade" id="equipos" role="tabpanel" aria-labelledby="equipos-tab">
                                <canvas id="chartEquipos"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                        <canvas id="tipoMP"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="js/home.js"></script>
<script>
    var consumibles = @json($consumibles);
    var equipos = @json($equipos);
    var labelsConsumibles=[];
    var dataConsumibles=[];
    var labelsEquipos=[];
    var dataEquipos=[];
    var coloresConsumibles=[];
    var coloresEquipos=[];
    var coloresDinamicos = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
    for (i = 0; i < consumibles.length; i++){
        labelsConsumibles.push(consumibles[i].ActivoNombre);
        dataConsumibles.push(consumibles[i].Cantidad);
        coloresConsumibles.push(coloresDinamicos());
    }
    for (i = 0; i < equipos.length; i++){
        labelsEquipos.push(equipos[i].ActivoNombre);
        dataEquipos.push(equipos[i].Cantidad);
        coloresEquipos.push(coloresDinamicos());
    }
    var ctx = document.getElementById("chartConsumibles").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {

            labels: labelsConsumibles,
            datasets: [{
                label: "Consumibles",
                data: dataConsumibles,
                backgroundColor: coloresConsumibles,
                borderWidth: 1
                }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Consumibles'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var eqp = document.getElementById("chartEquipos").getContext('2d');
    var chartEquipos = new Chart(eqp, {
        type: 'bar',
        data: {

            labels: labelsEquipos,
            datasets: [{
                label: "Equipos",
                data: dataEquipos,
                backgroundColor: coloresEquipos,
                borderWidth: 1
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Equipos'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var tipo = document.getElementById("tipoMP").getContext('2d');
    var chartTipoMP = new Chart(tipo, {
        type: 'pie',
        data: {
            labels: ["Consumibles", "Equipos"],
            datasets: [{
                label: "Tipo de materia prima",
                data: [consumibles.length, equipos.length],
                //data: [3, 2],
                backgroundColor: ["#3e95cd", "#c45850"],
                borderWidth: 1
            }]
        },
        options: {
            //legend: { display: false },
            title: {
                display: true,
                text: 'Tipo de materia prima'
            }
        }
    });
</script>
@endsection