<?php

namespace App\Http\Controllers;

use App\inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
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

            $inventario = DB::table('inventarios as i')
            ->select('i.PresentacionId','pr.ProductoId','p.ProductoNombre as Nombre','pr.ActivoId','a.ActivoNombre as envase','i.Cantidad')
            ->join('presentaciones as pr','i.PresentacionId','=','pr.PresentacionId')
            ->join('activos as a','pr.ActivoId','=','a.ActivoId')
            ->join('productos as p','pr.ProductoId','=','p.ProductoId')
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

            $inventario = new Inventario;
            $inventario->PresentacionId = $request->PresentacionId;
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
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(inventario $inventario)
    {
        //
        try{

            $inventario = DB::table('inventarios as i')
            ->select('i.PresentacionId','pr.ProductoId','p.ProductoNombre as Nombre','pr.ActivoId','a.ActivoNombre as envase','i.Cantidad')
            ->join('presentaciones as pr','i.PresentacionId','=','pr.PresentacionId')
            ->join('activos as a','pr.ActivoId','=','a.ActivoId')
            ->join('productos as p','pr.ProductoId','=','p.ProductoId')
            ->whereraw('i.PresentacionId = ?',[$inventario->PresentacionId])
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
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(inventario $inventario)
    {
        //
        try{

            $inventario = DB::table('inventarios as i')
            ->select('i.PresentacionId','pr.ProductoId','p.ProductoNombre as Nombre','pr.ActivoId','a.ActivoNombre as envase','i.Cantidad')
            ->join('presentaciones as pr','i.PresentacionId','=','pr.PresentacionId')
            ->join('activos as a','pr.ActivoId','=','a.ActivoId')
            ->join('productos as p','pr.ProductoId','=','p.ProductoId')
            ->whereraw('i.PresentacionId = ?',[$inventario->PresentacionId])
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
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inventario $inventario)
    {
        //
        try{

            $inventario->PresentacionId = $request->PresentacionId;
            $inventario->Cantidad = $request->Cantidad;
            $query = $inventario->save();
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
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventario $inventario)
    {
        //
        try{

            $query = $inventario->delete();
            $res = ['elimino'=>$query];
            return response()->json($res, 200)->header('Content-Type','application/json');
    
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }
}
