@extends('layouts.reporte')
@section('content')

    <div class="container">
            <h2 style="text-align:center;">Reporte de movimiento de activos</h2>
            <h2 style="text-align:center;">Desde:{{$fechaInicio}}</h2>
            <h2 style="text-align:center;">Hasta:{{$fechaFin}}</h2>
            <h4>Movimientos de entrada</h4>
            <table class="table table-bordered">
                <thead>
                    <th>Activo</th>
                    <th>Descripcion movimiento</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Empresa</th>
                    <th>Movimiento</th>
                    <th>Monto</th>
                </thead>
                <tbody>
                    @foreach ($movimientosEntrada as $movimiento)
                    <tr>
                        <td>{{$movimiento->ActivoNombre}}</td>
                        <td>{{$movimiento->Descripcion}}</td>
                        <td>{{$movimiento->Fecha}}</td>
                        <td>{{$movimiento->Cantidad}}</td>
                        <td>{{$movimiento->EmpresaNombre}}</td>
                        <td>{{$movimiento->Nombre}}</td>
                        <td>{{$movimiento->Monto}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">total</td>
                        <td>{{$totalEntrada}}</td>
                    </tr>
                </tbody>
            </table>
            <h4>Resumen Movimientos Activo Tipo Entrada</h4>
            <table class="table table-bordered">
                <thead>
                    <th>Activo</th>
                    <th>Movimiento</th>
                    <th>Cantidad movimientos</th>
                    <th>Total generado por movimiento</th>
                </thead>
                <tbody>
                    @foreach ($resumenEntrada as $movimiento)
                        <tr>
                            <td>{{$movimiento->ActivoNombre}}</td>
                            <td>{{$movimiento->Nombre}}</td>
                            <td>{{$movimiento->cantidad_movimientos}}</td>
                            <td>{{$movimiento->total_movimiento}}</td>
                        </tr>
                    @endforeach
                </tbody>
        
            </table>
        
            <h4>Movimientos de salida</h4>
            <table class="table table-bordered">
                <thead>
                    <th>Activo</th>
                    <th>Descripcion movimiento</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Empresa</th>
                    <th>Movimiento</th>
                    <th>Monto</th>
                </thead>
                <tbody>
                    @foreach ($movimientosSalida as $movimiento)
                    <tr>
                        <td>{{$movimiento->ActivoNombre}}</td>
                        <td>{{$movimiento->Descripcion}}</td>
                        <td>{{$movimiento->Fecha}}</td>
                        <td>{{$movimiento->Cantidad}}</td>
                        <td>{{$movimiento->EmpresaNombre}}</td>
                        <td>{{$movimiento->Nombre}}</td>
                        <td>{{$movimiento->Monto}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">total</td>
                        <td>{{$totalSalida}}</td>
                    </tr>
                </tbody>
            </table>
            <h4>Resumen Movimientos Activo Tipo Salida</h4>
            <table class="table table-bordered">
                <thead>
                    <th>Activo</th>
                    <th>Movimiento</th>
                    <th>Cantidad movimientos</th>
                    <th>Total generado por movimiento</th>
                </thead>
                <tbody>
                    @foreach ($resumenSalida as $movimiento)
                        <tr>
                            <td>{{$movimiento->ActivoNombre}}</td>
                            <td>{{$movimiento->Nombre}}</td>
                            <td>{{$movimiento->cantidad_movimientos}}</td>
                            <td>{{$movimiento->total_movimiento}}</td>
                        </tr>
                    @endforeach
                </tbody>
        
            </table>
        
           
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Impuesto por venta</th>
                        <td> {{$impuesto}}</td>
                    </tr>
                    <tr>
                        <th>Impuesto a pagar:</th>
                        <td>{{$totalSalida - round(($totalSalida/$impuesto),2)}}</td>
                    </tr>
                    <tr>
                        <th>Ganancia:</th>
                        <td>{{$totalSalida-$totalEntrada}}</td>
                    </tr>
                </table>
            
            </div>  
    </div>
   
@endsection