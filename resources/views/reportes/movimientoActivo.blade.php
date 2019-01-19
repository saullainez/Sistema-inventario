@extends('layouts.reporte')
@section('content')

   
            <h4 style="text-align:center;">Reporte de movimiento de activos</h4>
            <h5 style="text-align:center;">Desde:{{$fechaInicio}} - Hasta:{{$fechaFin}}</h5>
            <br>
            <h5>Movimientos de entrada</h5>
            <table class="table table-sm" style="font-size:10px;">
                <thead>
                    <tr>
                        <th scope="col">Activo</th>
                        <th scope="col">Descripcion movimiento</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Movimiento</th>
                        <th scope="col">Monto</th>
                    </tr>
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
            <h5>Resumen Movimientos Activo Tipo Entrada</h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Activo</th>
                        <th scope="col">Movimiento</th>
                        <th scope="col">Cantidad movimientos</th>
                        <th scope="col">Total generado por movimiento</th>
                    </tr>

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
        
            <h5>Movimientos de salida</h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Activo</th>
                        <th scope="col">Descripcion movimiento</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Movimiento</th>
                        <th scope="col">Monto</th>
                    </tr>

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
            <h5>Resumen Movimientos Activo Tipo Salida</h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Activo</th>
                        <th scope="col">Movimiento</th>
                        <th scope="col">Cantidad movimientos</th>
                        <th scope="col">Total generado por movimiento</th>
                    </tr>

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
                <h5>Resumen total</h5>
                <br>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Formula</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Impuesto por venta</td>
                        <td colspan="2"> {{$impuesto}}</td>
                    </tr>
                    <tr>
                        <td>Ganancia bruta por salidas</td>
                        <td>sum(Monto por movimiento de salida)</td>
                        <td>{{$totalSalida}}</td>
                    </tr>
                    <tr>
                        <td>Perdidas por entradas</td>
                        <td>sum(Monto por movimiento de entrada)</td>
                        <td>{{$totalEntrada}}</td>
                    </tr>
                    <tr>
                        <td>Ganancias por salidas:</td>
                        <td>{{$totalSalida}} / {{$impuesto}}</td>
                        <td>{{round(($totalSalida/$impuesto),2)}}</td>
                    </tr>

                    <tr>
                        <td>Impuesto a pagar:</td>
                        <td>{{$totalSalida}} - {{round(($totalSalida/$impuesto),2)}}</td>
                        <td>{{$totalSalida - round(($totalSalida/$impuesto),2)}}</td>
                    </tr>

                    <tr>
                        <td>Ganancia Neta:</td>
                        <td>{{round(($totalSalida/$impuesto),2)}} - {{$totalEntrada}}</td>
                        <td>{{round(($totalSalida/$impuesto),2)-$totalEntrada}}</td>
                    </tr>
                </table>
            
            </div>  

   
@endsection