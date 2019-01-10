<?php

namespace App\Http\Controllers;

use App\TipoBebida;
use Illuminate\Http\Request;

class TipoBebidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:tipo-bebida.index')->only(['index', 'obtenerTipoBebida']);
        $this->middleware('permission:tipo-bebida.create')->only(['create', 'store']);
        $this->middleware('permission:tipo-bebida.edit')->only(['edit', 'update', 'actualizarTipoBebida']);
        $this->middleware('permission:tipo-bebida.destroy')->only(['destroy', 'eliminarTipoBebida']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $tipo_bebidas = TipoBebida::get();
            return view ('tipo_bebida.index', compact('tipo_bebidas'));
            //return response()->json($tipo_bebidas,200)->header('Content-Type','application/json');    
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
     
    }

    public function obtenerTipoBebida()
    {
        $tipobebidas = TipoBebida::get();
        return response()->json($tipobebidas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //este no crea nada realmente, supongo que se hace por medio de un modal

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
            $tipoBebida = new TipoBebida;
            $tipoBebida->nombre = $request->Input('nombre');
            //return response()->json($tipoBebida);
           //return $request;
            $tipoBebida->save();
            //return response()->json($tipoBebida, 200)->header('Content-Type', 'application/json'); 
            //response  
            return response()->json([
                "mensaje" => "Tipo de bebida creada correctamente"
            ]); 
        }
        catch(\Exception $e ){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoBebida  $tipoBebida
     * @return \Illuminate\Http\Response
     */
    public function show(TipoBebida $tipoBebida)
    {
        //
        $tipo = TipoBebida::find($tipoBebida->TipoBebidaId);
        if ($tipo){
            return $tipo;
        }
        else{
            return [];
        }
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoBebida  $tipoBebida
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoBebida $tipoBebida)
    {
        //
        $tipo = TipoBebida::find($tipoBebida->TipoBebidaId);
        if ($tipo){
            return $tipo;
        }
        else{
            return [];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoBebida  $tipoBebida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoBebida $tipoBebida)
    {
        //
        try{
            $tipo = TipoBebida::findorFail($tipoBebida->TipoBebidaId);
            $tipo->nombre = $request->Input('nombre');
            $query = $tipo->save();
            $res = ['actualizo' => $query];
            return response()->json($res, 200)->header('Content-Type','application/json');
            
        }catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
       
        //return $query;
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoBebida  $tipoBebida
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoBebida $tipoBebida)
    {
        //
        try{
            $tipo =  TipoBebida::find($tipoBebida->TipoBebidaId);
            //return $tipo;
            $query = $tipo->delete(); 
            $res = ['elimino' => $query];  
            return response()->json($res,200)->header('Content-Type','application/json'); 
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }

    }
}
