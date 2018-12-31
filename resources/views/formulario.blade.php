

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registro de producto</div>
    
                    <div class="panel-body">
                       
                        <form class="form-horizontal" method="POST" action="{{ url('producto') }}">
                            {{ csrf_field() }}
    
                               <div class="form-group{{ $errors->has('ProductoNombre') ? ' has-error' : '' }}">
                                <label for="ProductoNombre" class="col-md-4 control-label">Nombre</label>
    
                                <div class="col-md-6">
                                    <input id="ProductoNombre" type="text" class="form-control" name="ProductoNombre" value="{{ old('ProductoNombre') }}" required autofocus>
    
                                    @if ($errors->has('ProductoNombre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ProductoNombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('ProductoDescripcion') ? ' has-error' : '' }}">
                                <label for="ProductoDescripcion" class="col-md-4 control-label">Descripcion</label>
    
                                <div class="col-md-6">
                                    <input id="ProductoDescripcion" type="text" class="form-control" name="ProductoDescripcion" value="{{ old('ProductoDescripcion') }}" >
    
                                    @if ($errors->has('ProductoDescripcion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ProductoDescripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            
                             <div class="form-group{{ $errors->has('TipoBebidaId') ? ' has-error' : '' }}">
                                <label for="TipoBebidaId" class="col-md-4 control-label">TipoBebida</label>
    
                                <div class="col-md-6">
                                    <input id="TipoBebidaId" type="text" class="form-control" name="TipoBebidaId" value="{{ old('TipoBebidaId') }}" >
    
                                    @if ($errors->has('TipoBebidaId'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('TipoBebidaId') }}</strong>
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
        </div>
    </div>
    

</body>
</html>
