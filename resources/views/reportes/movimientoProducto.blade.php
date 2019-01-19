@extends('layouts.reporte')
@section('content')

    <div class="container">
            <h4 style="text-align:center;">Reporte de movimiento de productos</h4>
            <h5 style="text-align:center;">Desde:{{$fechaInicio}} - Hasta:{{$fechaFin}}</h5>
            <br>
            <h4>Movimientos de entrada</h4>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>PresentacionId</th>
                        <th>Producto</th>
                        <th>Activo</th>
                        <th>Descripcion movimiento</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Cliente</th>
                        <th>Movimiento</th>
                        <th>Monto</th>
                    </tr>

                </thead>
                <tbody>
 
                    @foreach ($movimientosEntrada as $movimiento)
                    <tr>
                        <td>{{$movimiento->PresentacionId}}</td>
                        <td>{{$movimiento->ProductoNombre}}</td>
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
                        <td colspan="8">total</td>
                        <td>{{$totalEntrada}}</td>
                    </tr>
                </tbody>
            </table>
            <h4>Resumen Movimientos producto Tipo Entrada</h4>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>PresentacionId</th>
                        <th>Producto</th>
                        <th>Activo</th>
                        <th>Movimiento</th>
                        <th>Cantidad movimientos</th>
                        <th>Total generado por movimiento</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($resumenEntrada as $movimiento)
                        <tr>
                            <td>{{$movimiento->PresentacionId}}</td>
                            <td>{{$movimiento->ProductoNombre}}</td>
                            <td>{{$movimiento->ActivoNombre}}</td>
                            <td>{{$movimiento->Nombre}}</td>
                            <td>{{$movimiento->cantidad_movimientos}}</td>
                            <td>{{$movimiento->total_movimiento}}</td>
                        </tr>
                    @endforeach
                </tbody>
        
            </table>
        
            <h4>Movimientos de salida</h4>
            
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>PresentacionId</th>
                        <th>ProductoNombre</th>
                        <th>ActivoNombre</th>
                        <th>Descripcion movimiento</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Cliente</th>
                        <th>Movimiento</th>
                        <th>Monto</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($movimientosSalida as $movimiento)
                    <tr>
                        <td>{{$movimiento->PresentacionId}}</td>
                        <td>{{$movimiento->ProductoNombre}}</td>
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
                        <td colspan="8">total</td>
                        <td>{{$totalEntrada}}</td>
                    </tr>
                </tbody>
            </table>
            <h4>Resumen Movimientos productos Tipo Salida</h4>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>PresentacionId</th>
                        <th>Producto</th>
                        <th>Activo</th>
                        <th>Movimiento</th>
                        <th>Cantidad movimientos</th>
                        <th>Total generado por movimiento</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($resumenEntrada as $movimiento)
                        <tr>
                            <td>{{$movimiento->PresentacionId}}</td>
                            <td>{{$movimiento->ProductoNombre}}</td>
                            <td>{{$movimiento->ActivoNombre}}</td>
                            <td>{{$movimiento->Nombre}}</td>
                            <td>{{$movimiento->cantidad_movimientos}}</td>
                            <td>{{$movimiento->total_movimiento}}</td>
                        </tr>
                    @endforeach
                </tbody>
        
            </table>
            
           
            <div>
                <table class="table table-sm">
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