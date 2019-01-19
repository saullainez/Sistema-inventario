@extends('layouts.reporte')
@section('content')

<div class="container">
    <h4 style="text-align:center;">Reporte de inventario disponible</h4>
    <h5 style="text-align:center;">Fecha: {{date('Y-m-d')}}</h5>
    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>ActivoId</th>
                <th>Nombre</th>
                <th>Cantidad</th>
            </tr>

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
