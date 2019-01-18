@extends('layouts.reporte')
@section('content')

<div class="container">
    <h2 style="text-align:center;">Reporte de inventario disponible</h2>
    <table class="table table-bordered">
        <thead>
            <th>ActivoId</th>
            <th>Nombre</th>
            <th>Cantidad</th>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{$inventario->ActivoId}}</td>
                    <td>{{$inventario->ActivoNombre}}</td>
                    <td>{{$inventario->Cantidad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        
</div>

@endsection   
