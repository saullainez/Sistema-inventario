<?php

namespace App\Http\Controllers;

use App\InventarioActivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioActivoController extends Controller
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
            $inventario = DB::table('inventario_activos as i')
            ->select('i.ActivoId','a.ActivoNombre','i.Cantidad')
            ->join('activos as a','i.ActivoId','=','a.ActivoId')->get();
            return response()->json($inventario, 200)->header('Content-type','application/json');
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
            $inventario->Cantidad = $request->Cantidad;
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
     * @param  \App\InventarioActivo  $inventarioActivo
     * @return \Illuminate\Http\Response
     */
    public function show(InventarioActivo $inventarioActivo)
    {
        //
        try{
            $inventario = DB::table('inventario_activos as i')
            ->select('i.ActivoId','a.ActivoNombre','i.Cantidad')
            ->join('activos as a','i.ActivoId','=','a.ActivoId')
            ->whereraw('i.ActivoId = ?',[$inventarioActivo->ActivoId])->get();
            return response()->json($inventario, 200)->header('Content-type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InventarioActivo  $inventarioActivo
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarioActivo $inventarioActivo)
    {
        //
        try{
            $inventario = DB::table('inventario_activos as i')
            ->select('i.ActivoId','a.ActivoNombre','i.Cantidad')
            ->join('activos as a','i.ActivoId','=','a.ActivoId')
            ->whereraw('i.ActivoId = ?',[$inventarioActivo->ActivoId])->get();
            return response()->json($inventario, 200)->header('Content-type','application/json');
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
     * @param  \App\InventarioActivo  $inventarioActivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarioActivo $inventarioActivo)
    {
        //
        try{
            $inventarioActivo->ActivoId = $request->ActivoId;
            $inventarioActivo->Cantidad = $request->Cantidad;
            $query = $inventarioActivo->save();
            $res = ['actualizo'=>$query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InventarioActivo  $inventarioActivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarioActivo $inventarioActivo)
    {
        //
        try{
          
            $query = $inventarioActivo->delete();
            $res = ['actualizo'=>$query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }
}
