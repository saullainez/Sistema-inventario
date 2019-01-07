<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovimientoProducto extends Model
{
    //
    protected $table = 'movimiento_productos';
    protected $primaryKey = 'MovimientoProductoId';
    protected $fillable = ['PresentacionId','Descripcion','Fecha','AnioCosecha',
    'Cantidad','ClienteId','MovimientoConceptoId','Monto'];
    protected $guarded = [];

    public function empresas(){
        return $this->belongsTo('App\Empresa','cliente_mov_fk','EmpresaId');
    }

    public function movimientos(){
        return $this->belongsTo('App\MovimientoConcepto','concepto_mov_fk','MovimientoConceptoId');
    }

    public function presentaciones(){
        return $this->belongsTo('App\Presentacion','presentacion_mov_fk','PresentacionId');
    }

    public static function crearMovimiento($MovimientoProducto){

        $movimiento = DB::select('call crear_mov_pro(?,?,?,?,?,?,?,?)',
        [
            $movimientoProducto->PresentacionId,
            $movimientoProducto->Descripcion,
            $movimientoProducto->Fecha,
            $movimientoProducto->AnioCosecha,
            $movimientoProducto->Cantidad,
            $movimientoProducto->ClienteId,
            $movimientoProducto->MovimientoConceptoId,
            $movimientoProducto->Monto
        ]);
        return $movimiento;

    }

    public static function actualizarMovimiento($movimientoProcucto){

        $movimiento = DB::select('call actualizar_mov_pro(?,?,?,?,?,?,?,?,?)',
        [
            $movimientoProducto->PresentacionId,
            $movimientoProducto->Descripcion,
            $movimientoProducto->Fecha,
            $movimientoProducto->Cantidad,
            $movimientoProducto->AnioCosecha,
            $movimientoProducto->ClienteId,
            $movimientoProducto->MovimientoConceptoId,
            $movimientoProducto->Monto
            $movimientoProducto->MovimientoProductoId
        ]);

        return $movimiento;
    }

    public static function eliminarMovimiento($movimientoProducto){
        $movimiento = DB::select('call eliminar_mov_pro(?)',
        [
            $movimientoProducto->MovimientoProductoId
        ]);
        return $movimiento;
    }
}
