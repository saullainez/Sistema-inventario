<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    //
    protected $table = 'inventarios';
    protected $primaryKey = 'PresentacionId';
    protected $fillable = ['Cantidad'];
    protected $guarded = [];

    public function presentacion(){
        $this->belongsTo('App\Presentacion','presentacion_inv_fk','PresentacionId');
    }
}
