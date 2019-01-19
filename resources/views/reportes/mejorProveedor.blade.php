@extends('layouts.reporte')
@section('content')
<div class="container">
    <h4 style="text-align:center;">Reporte proveedores mas solicitados por movimiento(entradas-salidas)</h4>
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
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{$proveedor->EmpresaNombre}}</td>
                    <td>{{$proveedor->Nombre}}</td>
                    <td>{{$proveedor->TipoMovimiento}}</td>
                    <td>{{$proveedor->cantidad_movimientos}}</td>
                    <td>{{$proveedor->total}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>

</div>
@endsection