<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activo extends Model
{
    //
    protected $table = 'activos';
    protected $primaryKey = 'ActivoId';
    protected $fillable = ['ActivoNombre', 'ActivoDescripcion','TipoActivo'];
    protected $guarded = [];

    public function presentacion(){
        return $this->hasMany('App\Presentacion','envase_presentacion_fk','ActivoId');
    }

    public function inventario(){
        return $this->hasMany('App\Inventario','activo_inv_fk','ActivoId');
    }

    public function movimientos(){
        return $this->hasMany('App\MovimientoActivo','activo_mov_fk','ActivoId');
    }

    public static function crearActivo($activo){
        $act = DB::select('call crear_activo(?,?,?)',
        [
            $activo->ActivoNombre,
            $activo->ActivoDescripcion,
            $activo->TipoActivo
        ]);
        return $act;
    }
}
