<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presentacion extends Model
{
    //
    protected $table = 'presentaciones';
    protected $primaryKey = 'PresentacionId';
    protected $fillable = ['ActivoId','ProductoId'];
    protected $guarded = [];
    
    public function productos(){
        $this->belongsTo('App\Producto','producto_presentacion_fk','ProductoId');
    }

    public function activos(){
        $this->belongsTo('App\Activo','envase_presentacion_fk','ActivoId');
    }

    public function inventarios(){
        $this->hasMany('App\Inventario','presentacion_inv_fk','PresentacionId');
    }
}
