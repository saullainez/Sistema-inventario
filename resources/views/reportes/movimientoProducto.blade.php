@extends('layouts.reporte')
@section('content')


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
                <h5>Resumen total</h5>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Formula</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tr>
                        <th>Impuesto por venta</th>
                        <td colspan="2"> {{$impuesto}}</td>
                    </tr>
                    <tr>
                        <td>Ganancia bruta por salidas</td>
                        <td>sum(monto por movimiento de salida)</td>
                        <td>{{$totalSalida}}</td>
                    </tr>
                    <tr>
                        <td>Perdidas por entradas</td>
                        <td>sum(monto por movimiento de entrada)</td>
                        <td>{{$totalEntrada}}</td>
                    </tr>
                    <tr>
                        <td>Ganancias por salidas:</td>
                        <td>{{$totalSalida}} / {{$impuesto}}</td>
                        <td>{{round(($totalSalida/$impuesto),2)}}</td>
                    </tr>
                    <tr>
                        <th>Impuesto a pagar:</th>
                        <td>{{$totalSalida}} - {{round(($totalSalida/$impuesto),2)}}</td>
                        <td>{{$totalSalida - round(($totalSalida/$impuesto),2)}}</td>
                    </tr>
                    <tr>
                        <th>Ganancia neta:</th>
                        <td>{{round(($totalSalida/$impuesto),2)}} - {{$totalEntrada}}</td>
                        <td>{{$totalSalida-$totalEntrada}}</td>
                    </tr>
                </table>
            
            </div>  
            
   
@endsection