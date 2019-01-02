<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoConcepto extends Model
{
    //
    protected $table = 'movimiento_conceptos';
    protected $primaryKey = 'MovimientoConceptoId';
    protected $fillable = ['Nombre','TipoMovimiento'];
    protected $guarded = [];

    public function movimientoActivos(){
        return $this->hasMany('App\MovimientoActivo','mov_conc_fk','MovimientoConceptoId');
    }

    public function movimientoProductos(){
        return $this->hasMany('App\MovimientoProducto','concepto_mov_fk','MovimientoConceptoId');
    }
}
