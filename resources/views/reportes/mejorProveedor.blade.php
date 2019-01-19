@extends('layouts.reporte')
@section('content')
<div class="container">
    <h4 style="text-align:center;">Reporte proveedores mas solicitados por movimiento(entradas-salidas)</h4>
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