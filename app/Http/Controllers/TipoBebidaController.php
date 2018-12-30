<?php

namespace App\Http\Controllers;

use App\TipoBebida;
use Illuminate\Http\Request;

class TipoBebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipo_bebidas = TipoBebida::get();
        return response()->json($tipo_bebidas);

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
            return response()->json($tipoBebida, 200)->header('Content-Type', 'application/json'); 
            //response   
        }
        catch(\Exception $e ){
            return $e->getMessage();
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
            if ($query == 1)
                //indica que se actualizo de manera correcta
                return response()->json($query, 200);
            else {
                //si la respuesta es false, entonces significa que salio un error
                return response()->json($query);
            }
        }catch(\Exception $e){
            return $e->getMessage();
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
            return response()->json($query); 
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

    }
}
