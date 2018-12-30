<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBebida extends Model
{
    //
    protected $table = 'tipo_bebidas';
    protected $primaryKey = 'TipoBebidaId';
    protected $fillable = ['nombre'];

    protected $guarded = [];
    
    public function producto(){
        return $this->hasMany('App\Producto', 'bebida_producto_fk','TipoBebidaId');
    }
}
