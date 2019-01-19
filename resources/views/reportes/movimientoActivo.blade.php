@extends('layouts.reporte')
@section('content')

   
            <h4 style="text-align:center;">Reporte de movimiento de activos</h4>
            <h4 style="text-align:center;">Desde:{{$fechaInicio}} - Hasta:{{$fechaFin}}</h4>

            <h5>Movimientos de entrada</h5>
            <table class="table table-sm" style="font-size:10px;">
                <thead>
                    <th scope="col">Activo</th>
                    <th scope="col">Descripcion movimiento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Movimiento</th>
                    <th scope="col">Monto</th>
                </thead>
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
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
            <h5>Resumen Movimientos Activo Tipo Entrada</h5>
            <table class="table table-sm">
                <thead>
                    <th scope="col">Activo</th>
                    <th scope="col">Movimiento</th>
                    <th scope="col">Cantidad movimientos</th>
                    <th scope="col">Total generado por movimiento</th>
                </thead>
  
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
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
        
            <h5>Movimientos de salida</h5>
            <table class="table table-sm">
                <thead>
                    <th scope="col">Activo</th>
                    <th scope="col">Descripcion movimiento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Movimiento</th>
                    <th scope="col">Monto</th>
                </thead>
                <tr>
                    <td>&nbsp;</td>
                </tr>  
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
            <h5>Resumen Movimientos Activo Tipo Salida</h5>
            <table class="table table-sm">
                <thead>
                    <th scope="col">Activo</th>
                    <th scope="col">Movimiento</th>
                    <th scope="col">Cantidad movimientos</th>
                    <th scope="col">Total generado por movimiento</th>
                </thead>
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
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

   
@endsection