<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'ProductoId';
    protected $fillable = ['ProductoNombre', 'ProductoDescripcion','TipoBebidaId'];
    protected $guarded = [];

    
    public function tipoBebida(){
        return $this->belongsTo('App\TipoBebida','bebida_producto_fk','TipoBebidaId');
    }

    public function presentacion(){
        //return $this->hasMany('App\Presentacion','producto_presentacion_fk','ProductoId');
    }
    
}
