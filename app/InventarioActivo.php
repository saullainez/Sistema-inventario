<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarioActivo extends Model
{
    //
    protected $table = 'inventario_activos';
    protected $primaryKey = 'ActivoId';
    protected $fillable = ['Cantidad'];
    protected $guarded = [];
    
    public function inventarios(){
        $this->belongsTo('App\Activo','activo_inv_fk','ActivoId');
    }
}
