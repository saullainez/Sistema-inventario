<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    //
    protected $table = 'empresas';
    protected $primaryKey = 'EmpresaId';
    protected $fillable = ['EmpresaNombre','EmpresaDireccion',
    'EmpresaTelefono','EmpresaCorreo','Contacto','ContactoTelefono',
    'ContactoCorreo','FechaPago','Tipo'];
    protected $guarded = [];

    public function movimientoActivos(){
        return $this->hasMany('App\MovimientoActivo','empresa_prov_fk','EmpresaId');
    }

    public function movimientoProductos(){
        return $this->hasMany('App\MovimientoProducto','cliente_mov_fk','EmpresaId');
    }
}
