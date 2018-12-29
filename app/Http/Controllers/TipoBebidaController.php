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
       // $tipo_bebidas = TipoBebida::get();
       // return $tipo_bebidas;
        //los redireccionamientos seran despues;
        //return view('tipobebida.index')
        return "hola";
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
      //  $tipoBebida = new TipoBebida;
       // $tipoBebida->nombre = $request->Input('nombre');
       // return response()->json($tipoBebida);
       return "post";
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
    }
}
