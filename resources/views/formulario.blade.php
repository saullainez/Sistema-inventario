

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <!--
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de producto</div>
    
                    <div class="panel-body">
                       
                        <form class="form-horizontal" method="PUT" action="{{ url('movimiento-activo/1') }}">
                            {{ csrf_field() }}
    
                            <div class="form-group{{ $errors->has('ActivoId') ? ' has-error' : '' }}">
                                <label for="ActivoId" class="col-md-4 control-label">ActivoId</label>
    
                                <div class="col-md-6">
                                    <input id="ActivoId" type="text" class="form-control" name="ActivoId" value="{{ old('ActivoId') }}" required autofocus>
    
                                    @if ($errors->has('ActivoId'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ActivoId') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
                                <label for="Descripcion" class="col-md-4 control-label">Descripcion</label>
    
                                <div class="col-md-6">
                                    <input id="Descripcion" type="text" class="form-control" name="Descripcion" value="{{ old('Descripcion') }}" >
    
                                    @if ($errors->has('Descripcion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            
                             <div class="form-group{{ $errors->has('Fecha') ? ' has-error' : '' }}">
                                <label for="Fecha" class="col-md-4 control-label">Fecha</label>
    
                                <div class="col-md-6">
                                    <input id="Fecha" type="text" class="form-control" name="Fecha" value="{{ old('Fecha') }}" >
    
                                    @if ($errors->has('Fecha'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Fecha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Cantidad') ? ' has-error' : '' }}">
                                <label for="Cantidad" class="col-md-4 control-label">Cantidad</label>
    
                                <div class="col-md-6">
                                    <input id="Cantidad" type="text" class="form-control" name="Cantidad" value="{{ old('Cantidad') }}" >
    
                                    @if ($errors->has('Cantidad'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Cantidad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group{{ $errors->has('Monto') ? ' has-error' : '' }}">
                                <label for="Monto" class="col-md-4 control-label">Monto</label>
    
                                <div class="col-md-6">
                                    <input id="Monto" type="text" class="form-control" name="Monto" value="{{ old('Monto') }}" >
    
                                    @if ($errors->has('Monto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Monto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('ProveedorId') ? ' has-error' : '' }}">
                                <label for="ProveedorId" class="col-md-4 control-label">ProveedorId</label>
    
                                <div class="col-md-6">
                                    <input id="ProveedorId" type="text" class="form-control" name="ProveedorId" value="{{ old('ProveedorId') }}" >
    
                                    @if ($errors->has('ProveedorId'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ProveedorId') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('MovimientoConceptoId') ? ' has-error' : '' }}">
                                <label for="MovimientoConceptoId" class="col-md-4 control-label">MovimientoConceptoId</label>
    
                                <div class="col-md-6">
                                    <input id="MovimientoConceptoId" type="text" class="form-control" name="MovimientoConceptoId" value="{{ old('MovimientoConceptoId') }}" >
    
                                    @if ($errors->has('MovimientoConceptoId'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('MovimientoConceptoId') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        -->
<table>
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
    </div>
    

</body>
</html>
