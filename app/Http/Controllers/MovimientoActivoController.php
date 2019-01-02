<?php

namespace App\Http\Controllers;

use App\MovimientoActivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $inventario = DB::get('inventario_activos as ia')
            ->select('ia.ActivoId','a.ActivoNombre','ia.Descripcion','ia.Fecha',
            'ia.Cantidad','ia.Monto','ia.ProveedorId','e.EmpresaNombre',
            'ia.MovimientoConceptiId','mc.Nombre','ia.TipoMovimiento')
            ->join('activos as a','ia.ActivoId','=','a.ActivoId')
            ->join('empresas as e','ia.ProveedorId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','ia.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->get();
            return response()->json($inventario, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
            $inventario = new InventarioActivo;
            $inventario->ActivoId = $request->ActivoId;
            $inventario->Descripcion = $request->Descripcion;
            $inventario->Fecha = $request->Fecha;
            $inventario->Cantidad = $request->Cantidad;
            $inventario->Monto = $request->Monto;
            $inventario->ProveedorId = $request->ProveedorId;
            $inventario->MovimientoConceptoId = $request->MovimientoConceptoId;
            $inventario->TipoMovimiento = $request->TipoMovimiento;
            $inventario->save();
            return response()->json($inventario, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovimientoActivo  $movimientoActivo
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoActivo $movimientoActivo)
    {
        //
        try{
            $inventario = DB::get('inventario_activos as ia')
            ->select('ia.MovimientoActivoId','ia.ActivoId','a.ActivoNombre','ia.Descripcion','ia.Fecha',
            'ia.Cantidad','ia.Monto','ia.ProveedorId','e.EmpresaNombre',
            'ia.MovimientoConceptiId','mc.Nombre','ia.TipoMovimiento')
            ->join('activos as a','ia.ActivoId','=','a.ActivoId')
            ->join('empresas as e','ia.ProveedorId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','ia.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->whereraw('ia.MovimientoActivoId = ?',[$movimientoActivo->MovimientoActivoId])
            ->get();
            return response()->json($inventario, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovimientoActivo  $movimientoActivo
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimientoActivo $movimientoActivo)
    {
        //
        try{
            $inventario = DB::get('inventario_activos as ia')
            ->select('ia.MovimientoActivoId','ia.ActivoId','a.ActivoNombre','ia.Descripcion','ia.Fecha',
            'ia.Cantidad','ia.Monto','ia.ProveedorId','e.EmpresaNombre',
            'ia.MovimientoConceptiId','mc.Nombre','ia.TipoMovimiento')
            ->join('activos as a','ia.ActivoId','=','a.ActivoId')
            ->join('empresas as e','ia.ProveedorId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','ia.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->whereraw('ia.MovimientoActivoId = ?',[$movimientoActivo->MovimientoActivoId])
            ->get();
            return response()->json($inventario, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovimientoActivo  $movimientoActivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimientoActivo $movimientoActivo)
    {
        //
        try{
         
            $movimientoActivo->ActivoId = $request->ActivoId;
            $movimientoActivo->Descripcion = $request->Descripcion;
            $movimientoActivo->Fecha = $request->Fecha;
            $movimientoActivo->Cantidad = $request->Cantidad;
            $movimientoActivo->Monto = $request->Monto;
            $movimientoActivo->ProveedorId = $request->ProveedorId;
            $movimientoActivo->MovimientoConceptoId = $request->MovimientoConceptoId;
            $movimientoActivo->TipoMovimiento = $request->TipoMovimiento;
            $query = $movimientoActivo->save();
            $req = ['actualizo'=>$query];
            return response()->json($req, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovimientoActivo  $movimientoActivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoActivo $movimientoActivo)
    {
        //
        try{
         
            $query = $movimientoActivo->delete();
            $req = ['elimino'=>$query];
            return response()->json($req, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
      
    }
}
