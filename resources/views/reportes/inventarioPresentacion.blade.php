@extends('layouts.reporte')
@section('content')

<div class="container">
    <h2 style="text-align:center;">Reporte de inventario de presentacion disponible</h2>
    <table class="table table-bordered">
        <thead>
            <th>PresentacionId</th>
            <th>ProductoNombre</th>
            <th>ActivoNombre</th>
            <th>Cantidad</th>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{$inventario->PresentacionId}}</td>
                    <td>{{$inventario->ProductoNombre}}</td>
                    <td>{{$inventario->ActivoNombre}}</td>
                    <td>{{$inventario->Cantidad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   