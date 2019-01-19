@extends('layouts.reporte')
@section('content')
<div class="container">
    <h4 style="text-align:center;">Reporte clientes mas solicitado por movimiento(entradas-salidas)</h4>
    <h4 style="text-align:center;">Desde: {{$fechaInicio}}</h4>
    <h4 style="text-align:center;">Hasta:{{$fechaFin}}</h4>
    <table class="table table-sm">
        <thead>
            <th>Empresa</th>
            <th>Movimiento</th>
            <th>Tipo Movimiento</th>
            <th>Cantidad Movimientos</th>
            <th>Monto total por movimiento</th>
        </thead>
        <tbody>
            <tr>
                <td>&nbsp;</td>
            </tr> 
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->EmpresaNombre}}</td>
                    <td>{{$cliente->Nombre}}</td>
                    <td>{{$cliente->TipoMovimiento}}</td>
                    <td>{{$cliente->cantidad_movimientos}}</td>
                    <td>{{$cliente->total}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>

</div>
@endsection