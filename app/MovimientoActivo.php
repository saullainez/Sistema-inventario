<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoActivo extends Model
{
    //
    protected $table = 'movimiento_activos';
    protected $primaryKey = 'MovimientoActivoId';
    protected $fillable = ['ActivoId','Descripcion','Fecha','Cantidad','Monto',
    'ProveedorId','MovimientoConceptoId','TipoMovimiento'];
    protected $guarded = [];

    public function proveedores(){
        return $this->belongsTo('App\Empresa','empresa_prov_fk','ProveedorId');
    }

    public function activos(){
        return $this->belongsto('App\Activo','activo_mov_fk','ActivoId');
    }

    public function movimientos(){
        return $this->belongsTo('App\MovimientoConcepto','mov_conc_fk','MovimientoConceptoId');
    }


}
