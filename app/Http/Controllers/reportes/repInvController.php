<?php

namespace App\Http\Controllers\reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class repInvController extends Controller
{
    //
    /**
     * @return \Illuminate\Http\Resonse
     */
    public function totalInventario(){

        $inventarios = DB::table('inventario_activos as ia')
        ->select('ia.ActivoId','a.ActivoNombre','ia.Cantidad')
        ->join('activos as a','ia.ActivoId','=','a.ActivoId')->get();
        //var_dump($inventarios);
        //return response()->json($inventarios, 200); 
       return view('formulario',['inventarios'=>$inventarios]);
    }

    /**
     *  
     *  
    */
    public function compraVentaInv($fechaInicio, $fechaFin){

       // dd($fechaInicio);
        $movimientosEntrada = DB::table('movimiento_activos as ma')
        ->select('ma.MovimientoActivoId','ma.Fecha','ma.Descripcion','ma.Cantidad','ma.Monto',
        'ma.ActivoId','a.ActivoNombre','ma.ProveedorId','e.EmpresaNombre')
        ->join('activos as a','ma.ActivoId','=','a.ActivoId')
        ->join('empresas as e','ma.ProveedorId','=','e.EmpresaId')
        ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('ma.Fecha >= ? and ma.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'Entrada'
        ])
        ->get();

        $movimientosSalida = DB::table('movimiento_activos as ma')
        ->select('ma.MovimientoActivoId','ma.Fecha','ma.Descripcion','ma.Cantidad','ma.Monto',
        'ma.ActivoId','a.ActivoNombre','ma.ProveedorId','e.EmpresaNombre')
        ->join('activos as a','ma.ActivoId','=','a.ActivoId')
        ->join('empresas as e','ma.ProveedorId','=','e.EmpresaId')
        ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('ma.Fecha >= ? and ma.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'Salida'
        ])
        ->get();
        
        return response()->json($movimientosEntrada, 200);


    }


}
