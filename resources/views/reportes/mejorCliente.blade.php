@extends('layouts.reporte')
@section('content')
<div class="container">
    <h4 style="text-align:center;">Reporte clientes mas solicitado por movimiento(entradas-salidas)</h4>
    <h5 style="text-align:center;">Desde: {{$fechaInicio}} - Hasta:{{$fechaFin}}</h5>
    <br>

    <table class="table table-sm">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Movimiento</th>
                <th>Tipo Movimiento</th>
                <th>Cantidad Movimientos</th>
                <th>Monto total por movimiento</th>
            </tr>
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