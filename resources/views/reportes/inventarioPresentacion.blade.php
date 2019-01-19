@extends('layouts.reporte')
@section('content')

<div class="container">
    <h4 style="text-align:center;">Reporte de inventario de presentacion disponible</h4>
    <h5 style="text-align:center;">Fecha: {{date('Y-m-d')}}</h5>
    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>PresentacionId</th>
                <th>ProductoNombre</th>
                <th>ActivoNombre</th>
                <th>Cantidad</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($inventario as $inv)
                <tr>
                    <td>{{$inv->PresentacionId}}</td>
                    <td>{{$inv->ProductoNombre}}</td>
                    <td>{{$inv->ActivoNombre}}</td>
                    <td>{{$inv->Cantidad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   