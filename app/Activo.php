<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
