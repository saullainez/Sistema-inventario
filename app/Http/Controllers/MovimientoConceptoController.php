<?php

namespace App\Http\Controllers;

use App\MovimientoConcepto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:movimiento-concepto.index')->only(['index','obtenerMovimientoConcepto']);
        $this->middleware('permission:movimiento-concepto.create')->only(['create','store']);
        $this->middleware('permission:movimiento-concepto.edit')->only('edit','update','actualizarMovimientoConcepto');
        $this->middleware('permission:movimiento-concepto.destroy')->only(['destroy','eliminarMovimientoConcepto']);
    }
    public function index()
    {
        //
        try
        {
            $conceptos = MovimientoConcepto::get();
            //return response()->json($conceptos, 200)->header('Content-Type','application/json');
            return view('movimientoConcepto.index',compact('conceptos'));
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-type','application/json');
        }
    }

    public function obtenerMovimientoConcepto(){
        try
        {
            $conceptos = MovimientoConcepto::get();
            return response()->json($conceptos, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-type','application/json');
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
        try
        {
            $movimiento = new MovimientoConcepto;
            $movimiento->Nombre = $request->Input('Nombre');
            $movimiento->TipoMovimiento = $request->Input('TipoMovimiento');
            $movimiento->save();
            return response()->json($movimiento, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-type','application/json');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovimientoConcepto  $movimientoConcepto
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoConcepto $movimientoConcepto)
    {
        //
        return $movimientoConcepto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovimientoConcepto  $movimientoConcepto
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimientoConcepto $movimientoConcepto)
    {
        //
        return $movimientoConcepto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovimientoConcepto  $movimientoConcepto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimientoConcepto $movimientoConcepto)
    {
        //
        
        try
        {
            $movimientoConcepto->Nombre = $request->Input('Nombre');
            $movimientoConcepto->TipoMovimiento = $request->Input('TipoMovimiento');
            $query = $movimientoConcepto->save();
            $res = ['actualizo'=>$query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-type','application/json');
        }
    }

    public function actualizarMovimientoConcepto(Request $request){
        if ($request->ajax()){
            $movimientoConcepto = MovimientoConcepto::find($request->MovimientoConceptoId);
            $movimientoConcepto->Nombre = $request['Nombre'];
            $movimientoConcepto->TipoMovimiento = $request['TipoMovimiento'];
            $movimientoConcepto->save();
            return response()->json([
                "mensaje" => "Concepto actualizado correctamente"], 200)->header('Content-Type','application/json');

        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovimientoConcepto  $movimientoConcepto
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoConcepto $movimientoConcepto)
    {
        //
        try
        {
            $query = $movimientoConcepto->delete();
            $res = ['elimino'=>$query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-type','application/json');
        }
    }

    public function eliminarMovimientoConcepto(Request $request){
        if ($request->ajax()){
            $movimientoConcepto = MovimientoConcepto::find($request->MovimientoConceptoId);
            $movimientoConcepto->destroy();
            return response()->json([
                "mensaje" => "concepto eliminado correctamente"], 200)->header('Content-Type','application/json');

        };
    }

    //
    //funcion que unicamente devuelve los movimientos de tipo salida
    //su funcion es para los select (o cualquier otra idea) que sean de tipo salida
    public function salidas(){
        try{
            $movimientos = DB::table('movimiento_conceptos')
            ->whereraw('TipoMovimiento = ?',['Salida'])->get();
            return response()->json($movimientos, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-type','application/json'); 
        }
       
    }

    //funcion que unicamente devuelve los movimientos de tipo entrada
    //su funcion es para los select (o cualquier otra idea) que sean de tipo entrada
    public function entradas(){
        try{
            $movimientos = DB::table('movimiento_conceptos')
            ->whereraw('TipoMovimiento = ?',['Entrada'])->get();
            return response()->json($movimientos, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-type','application/json'); 
        }
       
    }
}
