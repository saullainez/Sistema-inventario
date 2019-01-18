<?php

namespace App\Http\Controllers\reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class repPresController extends Controller
{
    //

    public function inventarioPresentacion(){
        $inventario = DB::table('inventarios as i')
        ->select('i.PresentacionId','a.ActivoNombre','p2.ProductoNombre','i.Cantidad')
        ->join('presentaciones as p','i.PresentacionId','=','p.PresentacionId')
        ->join('activos as a','p.ActivoId','=','a.ActivoId')
        ->join('productos as p2','p.ProductoId','=','p2.ProductoId')
        ->get();
        return view('reportes.inventarioPresentacion',['inventario'=>$inventario]);
    }

    public function movimientosProducto($fechaInicio, $fechafin,$impuesto){

        $movimientosEntrada = DB::select('call reportes_movimiento_producto(?,?,?)', 
        [$fechaInicio,$fechafin,'entrada']);

        $totalEntrada = DB::table('movimiento_productos as mp')
        ->join('movimiento_conceptos as mc','mp.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('mp.Fecha >= ? and mp.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'Entrada'
        ])
        ->sum('mp.Monto');

        $movimientosSalida = DB::select('call reportes_movimiento_producto(?,?,?)', 
        [$fechaInicio,$fechafin,'salida']);
        $totalSalida = DB::table('movimiento_productos as mp')
        ->join('movimiento_conceptos as mc','mp.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('mp.Fecha >= ? and mp.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'salida'
        ])
        ->sum('mp.Monto');

        $resumenEntrada = DB::select('call reportes_resumen_mov_producto(?,?,?)',
        [$fechaInicio,$fechafin,'entrada'] );

        $resumenSalida = DB::select('call reportes_resumen_mov_producto(?,?,?)',
        [$fechaInicio,$fechafin,'salida'] );

        return view(
            'reportes.movimientoProducto',
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
    }

    public function mejorCliente($fechaInicio, $fechaFin){
        $clientes = DB::select('call reporte_mejor_cliente(?,?)', [$fechaInicio,$fechaFin]);
        return view('reportes.mejorCliente',['clientes'=>$clientes,'fechaInicio'=>$fechaInicio, 'fechaFin'=>$fechaFin]);
    }
}
