<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoProducto extends Model
{
    //
    protected $table = 'movimiento_productos';
    protected $primaryKey = 'MovimientoProductoId';
    protected $fillable = ['PresentacionId','Descripcion','Fecha','AnioCosecha',
    'Cantidad','ClienteId','MovimientoConceptoId','Monto'];
    protected $guarded = [];

    public function empresas(){
        return $this->belongsTo('App\Empresa','cliente_mov_fk','EmpresaId');
    }

    public function movimientos(){
        return $this->belongsTo('App\MovimientoConcepto','concepto_mov_fk','MovimientoConceptoId');
    }

    public function presentaciones(){
        return $this->belongsTo('App\Presentacion','presentacion_mov_fk','PresentacionId');
    }
}
