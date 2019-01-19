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
        $pdf = \PDF::loadView('reportes.inventarioPresentacion',['inventario'=>$inventario]);

        return $pdf->stream();
       // return view('reportes.inventarioPresentacion',['inventario'=>$inventario]);
    }

    public function movimientosProducto($fechaInicio, $fechaFin,$impuesto){

        $movimientosEntrada = DB::select('call reporte_movimiento_producto(?,?,?)', 
        [$fechaInicio,$fechaFin,'entrada']);

        $totalEntrada = DB::table('movimiento_productos as mp')
        ->join('movimiento_conceptos as mc','mp.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('mp.Fecha >= ? and mp.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'Entrada'
        ])
        ->sum('mp.Monto');

        $movimientosSalida = DB::select('call reporte_movimiento_producto(?,?,?)', 
        [$fechaInicio,$fechaFin,'salida']);
        $totalSalida = DB::table('movimiento_productos as mp')
        ->join('movimiento_conceptos as mc','mp.MovimientoConceptoId','=','mc.MovimientoConceptoId')
        ->whereraw('mp.Fecha >= ? and mp.Fecha <= ? and mc.TipoMovimiento = ?',
        [
            $fechaInicio,
            $fechaFin,
            'salida'
        ])
        ->sum('mp.Monto');

        $resumenEntrada = DB::select('call reporte_resumen_mov_producto(?,?,?)',
        [$fechaInicio,$fechaFin,'entrada'] );

        $resumenSalida = DB::select('call reporte_resumen_mov_producto(?,?,?)',
        [$fechaInicio,$fechaFin,'salida'] );

        $pdf = \PDF::loadView('reportes.movimientoProducto',
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
        /*
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
            */
    }

    public function mejorCliente($fechaInicio, $fechaFin){
        $clientes = DB::select('call reporte_mejor_cliente(?,?)', [$fechaInicio,$fechaFin]);
        $pdf = \PDF::loadView('reportes.mejorCliente',['clientes'=>$clientes,'fechaInicio'=>$fechaInicio, 'fechaFin'=>$fechaFin]);
       
        return $pdf->stream();
       // return view('reportes.mejorCliente',['clientes'=>$clientes,'fechaInicio'=>$fechaInicio, 'fechaFin'=>$fechaFin]);
    }
}
