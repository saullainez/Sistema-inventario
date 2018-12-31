<?php

namespace App\Http\Controllers;

use App\Activo;
use Illuminate\Http\Request;

class ActivoController extends Controller
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
            $activos = Activo::get();
            return response()->json($activos, 200)->header('Content-Type','application\json');
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return response()->json($error);
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
            $activo = new Activo;
            $activo->ActivoNombre = $request->Input('ActivoNombre');
            $activo->ActivoDescripcion = $request->Input('ActivoDescripcion');
            $activo->TipoActivo = $request->Input('TipoActivo');
            $activo->save();
            return response()->json($activo, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return response()->json($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function show(Activo $activo)
    {
        //
        return response()->json($activo, 200)->header('Content-Type','application/json');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function edit(Activo $activo)
    {
        //
        return response()->json($activo, 200)->header('Content-Type','application/json');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activo $activo)
    {
        //
        try{
            $act = Activo::find($activo->ActivoId);
            $act->ActivoNombre = $request->ActivoNombre;  
            $act->ActivoDescripcion = $request->activoDescripcion;
            $act->TipoActivo = $request->TipoActivo;
            $query = $act->save();
            $res = ['actualizo' => $query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return response()->json($error);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activo $activo)
    {
        //
        try{
            $query = $activo->delete();
            $res = ['elimino' => $query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return response()->json($error);
        }
    }
}
