<?php

namespace App\Http\Controllers;

use App\presentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PresentacionController extends Controller
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
            $presentaciones = DB::table('presentaciones as p')
            ->select('p.PresentacionId','p.ProductoId','b.ProductoNombre as producto','p.ActivoId','a.ActivoNombre as envase')
            ->join('productos as b','p.ProductoId','=','b.ProductoId')
            ->join('activos as a','p.ActivoId','=','a.ActivoId')->get();

            return response()->json($presentaciones, 200)->header('Content-Type','application/json');
        }catch(\Exception $e){
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
            $presentacion = new Presentacion;
            $presentacion->ProductoId = $request->ProductoId;
            $presentacion->ActivoId = $request->ActivoId;
            $id = "{$request->ProductoId}{$request->ActivoId}";
            $presentacion->PresentacionId = $id;
            $presentacion->save();
            return response()->json($presentacion, 200)->header('Content-Type','application/json');

        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function show(presentacion $presentacion)
    {
        //
        try{
            $present = DB::table('presentaciones as p')
            ->select('p.PresentacionId','p.ProductoId','b.ProductoNombre as producto','p.ActivoId','a.ActivoNombre as envase')
            ->join('productos as b','p.ProductoId','=','b.ProductoId')
            ->join('activos as a','p.ActivoId','=','a.ActivoId')
            ->whereraw('p.PresentacionId = ?',[$presentacion->PresentacionId])->get();
        return $present;
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(presentacion $presentacion)
    {
        //
        try{
            $present = DB::table('presentaciones as p')
            ->select('p.PresentacionId','p.ProductoId','b.ProductoNombre as producto','p.ActivoId','a.ActivoNombre as envase')
            ->join('productos as b','p.ProductoId','=','b.ProductoId')
            ->join('activos as a','p.ActivoId','=','a.ActivoId')
            ->whereraw('p.PresentacionId = ?',[$presentacion->PresentacionId])->get();
        return $present;
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
     * @param  \App\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, presentacion $presentacion)
    {
        //
        try{
            $presentacion->ActivoId = $request->ActivoId;
            $presentacion->ProductoId = $request->ProductoId;
            $id = "{$request->ProductoId}{$request->ActivoId}";
            $presentacion->PresentacionId = $id;
            $query = $presentacion->save();
            $res = ['actualizo' => $query];
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
     * @param  \App\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(presentacion $presentacion)
    {
        //
        try{
            $presentacion->delete();
            $res = ['elimino' => $query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }
}