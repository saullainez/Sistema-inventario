<?php

namespace App\Http\Controllers\reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class repInvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:reporte-inventario.totalinventario')->only('totalInventario');
        $this->middleware('permission:reporte-inventario.compraventainventario')->only('compraVentaInv');
        $this->middleware('permission:reporte-inventario.mejorproveedor')->only('mejorProveedor');
        
    }
    //
    /**
     * @return \Illuminate\Http\Resonse
     */
    //muestra el total de inventario disponible.
    public function totalInventario(){

        $inventarios = DB::table('inventario_activos as ia')
        ->select('ia.ActivoId','a.ActivoNombre','ia.Cantidad')
        ->join('activos as a','ia.ActivoId','=','a.ActivoId')->get();
        //var_dump($inventarios);
        //return response()->json($inventarios, 200); 
        $pdf = \PDF::loadView('reportes.inventarioActivo',['inventarios'=>$inventarios]);

      // return view('reportes.inventarioActivo',['inventarios'=>$inventarios]);
      
       return $pdf->stream();
    }

    /**
     *  
     *  
    */
    //este procedimiento es para mostrar los movimientos en intervalo de tiempo
    //los divide por movimientos de entrada, movimientos de salida, sus totales
    //y luego calcular si hubieron perdidas o ganancias.
    public function compraVentaInv($fechaInicio, $fechaFin, $impuesto){

       // dd($fechaInicio);

       $movimientosEntrada = DB::select('call reporte_movimiento_activos(?,?,?)', 
       [$fechaInicio,$fechaFin,'entrada']);
       $movimientosSalida = DB::select('call reporte_movimiento_activos(?,?,?)', 
       [
           $fechaInicio,
           $fechaFin,
           'salida'
       ]);
        //var_dump($movimientosEntrada[0]);
        $totalEntrada = DB::table('movimiento_activos as ma')
        ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('ma.Fecha >= ? and ma.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'Entrada'
        ])
        ->sum('ma.Monto');

        $totalSalida = DB::table('movimiento_activos as ma')
        ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('ma.Fecha >= ? and ma.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'Salida'
        ])->sum('ma.Monto');

        $resumenEntrada = DB::select('call reporte_resumen_mov_activo(?,?,?)', 
        [$fechaInicio,$fechaFin,'entrada']);
        $resumenSalida = DB::select('call reporte_resumen_mov_activo(?,?,?)', 
        [$fechaInicio,$fechaFin,'salida']);


        //return response()->json($arreglo, 200);
        /*
        return view(
            'reportes.movimientoActivo',
            [
                'movimientosEntrada'=>$movimientosEntrada,
                'totalEntrada'=>$totalEntrada,
                'movimientosSalida'=>$movimientosSalida,
                'totalSalida'=>$totalSalida,
                'impuesto'=>$impuesto,
                'fechaInicio'=>$fechaInicio,
                'fechaFin'=>$fechaFin,
                'resumenEntrada' => $resumenEntrada,
                'resumenSalida' => $resumenSalida
            ]);
            */
            
            $pdf = \PDF::loadView('reportes.movimientoActivo',
            [
                'movimientosEntrada'=>$movimientosEntrada,
                'totalEntrada'=>$totalEntrada,
                'movimientosSalida'=>$movimientosSalida,
                'totalSalida'=>$totalSalida,
                'impuesto'=>$impuesto,
                'fechaInicio'=>$fechaInicio,
                'fechaFin'=>$fechaFin,
                'resumenEntrada' => $resumenEntrada,
                'resumenSalida' => $resumenSalida
            ]);
        
            $pdf->setPaper('a4','landscape');
            return $pdf->stream();
            
    }

    public function mejorProveedor($fechaInicio, $fechaFin){
        $proveedores = DB::select('call reporte_mejor_proveedor(?,?)', 
        [$fechaInicio, $fechaFin]);
        /*
        return view('reportes.mejorProveedor',
        ['proveedores'=>$proveedores,
            'fechaInicio'=>$fechaInicio,
            'fechaFin'=>$fechaFin
        ]);
        */
        $pdf = \PDF::loadView('reportes.mejorProveedor',
        ['proveedores'=>$proveedores,
            'fechaInicio'=>$fechaInicio,
            'fechaFin'=>$fechaFin
        ]);
      //  $pdf->setPaper('a4','landscape');
        return $pdf->stream();
      //  return view('reportes.mejorProveedor',['proveedores'=>$proveedores]);
    }
    


}
