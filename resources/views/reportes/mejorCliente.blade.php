@extends('layouts.reporte')
@section('content')
<div class="container">
    <h2 style="text-align:center;">Reporte clientes mas solicitado por movimiento(entradas-salidas)</h2>
    <h2 style="text-align:center;">Desde: {{$fechaInicio}}</h2>
    <h2 style="text-align:center;">Hasta:{{$fechaFin}}</h2>
    <table class="table table-bordered">
        <thead>
            <th>Empresa</th>
            <th>Movimiento</th>
            <th>Tipo Movimiento</th>
            <th>Cantidad Movimientos</th>
            <th>Monto total por movimiento</th>
        </thead>
        <tbody>
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