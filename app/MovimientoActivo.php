<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MovimientoActivo extends Model
{
    //
    protected $table = 'movimiento_activos';
    protected $primaryKey = 'MovimientoActivoId';
    protected $fillable = ['ActivoId','Descripcion','Fecha','Cantidad','Monto',
    'ProveedorId','MovimientoConceptoId'];
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

    public static function crearMovimiento($movimientoActivo){

      //  return $movimientoActivo;
 

        $movimiento = DB::select('call crear_mov_act(?,?,?,?,?,?,?)', 
        [$movimientoActivo->ActivoId,$movimientoActivo->Fecha,
        $movimientoActivo->Descripcion,$movimientoActivo->Cantidad,
        $movimientoActivo->Monto, $movimientoActivo->ProveedorId, 
        $movimientoActivo->MovimientoConceptoId]);

        return $movimiento;
        
    }   

    public static function actualizarMovimiento($movimientoActivo){
        
        $movimiento = DB::select('call actualizar_mov_act(?,?,?,?,?,?,?,?)',
         [
             $movimientoActivo->ActivoId,
             $movimientoActivo->Fecha,
             $movimientoActivo->Descripcion,
             $movimientoActivo->Cantidad,
             $movimientoActivo->Monto,
             $movimientoActivo->ProveedorId,
             $movimientoActivo->MovimientoConceptoId,
             $movimientoActivo->MovimientoActivoId
         ]);
         return $movimiento;

    }

    public static function eliminarMovimiento($MovimientoActivo){

        $movimiento = DB::select('call eliminar_mov_act(?)', 
        [
            $movimientoActivo->MovimientoActivoId
        ]);
        return $movimiento;
    }


}
