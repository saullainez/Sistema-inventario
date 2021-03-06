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

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('permission:movimiento-activo.index')->only(['index','obtenerMovimientoActivo']);
        $this->middleware('permission:movimiento-activo.create')->only(['create','store']);
        $this->middleware('permission:movimiento-activo.edit')->only(['edit','update','actualizarMovimientoActivo']);
        $this->middleware('permission:movimiento-activo.destroy')->only(['destroy','eliminarMovimientoActivo']);

    }

    public function index()
    {
        //
        try{
           // $movimientoActivo = MovimientoActivo::get();
            
            $movimientoActivo = DB::table('movimiento_activos as ma')
            ->select('ma.MovimientoActivoId', 'ma.ActivoId','a.ActivoNombre','ma.Descripcion','ma.Fecha',
            'ma.Cantidad','ma.Monto','ma.ProveedorId','e.EmpresaNombre',
            'ma.MovimientoConceptoId','mc.Nombre')
            ->join('activos as a','ma.ActivoId','=','a.ActivoId')
            ->join('empresas as e','ma.ProveedorId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->orderBy('ma.MovimientoActivoId','desc')
            ->get();
            
            return view('movimientoActivo.index',compact('movimientoActivo'));
           // return response()->json($movimientoActivo, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    public function obtenerMovimientoActivo(){
        try{
            // $movimientoActivo = MovimientoActivo::get();
             
             $movimientoActivo = DB::table('movimiento_activos as ma')
             ->select('ma.MovimientoActivoId', 'ma.ActivoId','a.ActivoNombre','ma.Descripcion','ma.Fecha',
             'ma.Cantidad','ma.Monto','ma.ProveedorId','e.EmpresaNombre',
             'ma.MovimientoConceptoId','mc.Nombre')
             ->join('activos as a','ma.ActivoId','=','a.ActivoId')
             ->join('empresas as e','ma.ProveedorId','=','e.EmpresaId')
             ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
             ->orderBy('ma.MovimientoActivoId','desc')
             ->get();
             
            // return view('movimientoActivo.index',compact('movimientoActivo'));
             return response()->json($movimientoActivo, 200)->header('Content-Type','application/json');
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
        
            $movimientoActivo = new movimientoActivo;
            
            $movimientoActivo->ActivoId = $request->ActivoId;
            $movimientoActivo->Descripcion = $request->Descripcion;
            $movimientoActivo->Fecha = $request->Fecha;
            $movimientoActivo->Cantidad = $request->Cantidad;
            $movimientoActivo->Monto = $request->Monto;
            $movimientoActivo->ProveedorId = $request->ProveedorId;
            $movimientoActivo->MovimientoConceptoId = $request->MovimientoConceptoId;
           // $movimientoActivo->crearMovimiento($movimientoActivo);
            $res = MovimientoActivo::crearMovimiento($movimientoActivo);
           /*
            $movimientoActivo->save();
            */
            //dd($res);
            //return $res;
            return response()->json([$res, "mensaje"=>"Movimiento creado correctamente"], 200)->header('Content-Type','application/json');
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
            $movimientoActivo = DB::table('movimiento_activos as ma')
            ->select('ma.MovimientoActivoId','ma.ActivoId','a.ActivoNombre','ma.Descripcion','ma.Fecha',
            'ma.Cantidad','ma.Monto','ma.ProveedorId','e.EmpresaNombre',
            'ma.MovimientoConceptoId','mc.Nombre')
            ->join('activos as a','ma.ActivoId','=','a.ActivoId')
            ->join('empresas as e','ma.ProveedorId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->whereraw('ma.MovimientoActivoId = ?',[$movimientoActivo->MovimientoActivoId])
            ->get();
            return response()->json($movimientoActivo, 200)->header('Content-Type','application/json');
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
            $movimientoActivo = DB::table('movimiento_activos as ma')
            ->select('ma.MovimientoActivoId','ma.ActivoId','a.ActivoNombre','ma.Descripcion','ma.Fecha',
            'ma.Cantidad','ma.Monto','ma.ProveedorId','e.EmpresaNombre',
            'ma.MovimientoConceptoId','mc.Nombre')
            ->join('activos as a','ma.ActivoId','=','a.ActivoId')
            ->join('empresas as e','ma.ProveedorId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','ma.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->whereraw('ma.MovimientoActivoId = ?',[$movimientoActivo->MovimientoActivoId])
            ->get();
            return response()->json(['mensaje'=>$movimientoActivo], 200)->header('Content-Type','application/json');
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
           // return "hola";

            $movimientoActivo->ActivoId = $request->ActivoId;
            $movimientoActivo->Descripcion = $request->Descripcion;
            $movimientoActivo->Fecha = $request->Fecha;
            $movimientoActivo->Cantidad = $request->Cantidad;
            $movimientoActivo->Monto = $request->Monto;
            $movimientoActivo->ProveedorId = $request->ProveedorId;
            $movimientoActivo->MovimientoConceptoId = $request->MovimientoConceptoId;
    
            //$query = $movimientoActivo->save();
            //$req = ['actualizo'=>$query];
            //return $movimientoActivo;
            $req = MovimientoActivo::actualizarMovimiento($movimientoActivo);
            return response()->json($req, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
       
    }

    public function actualizarMovimientoActivo(Request $request){
        if($request->ajax()){
            try{
                $movimientoActivo = MovimientoActivo::find($request->MovimientoActivoId);
                $movimientoActivo->ActivoId = $request['ActivoId'];
                $movimientoActivo->Descripcion = $request['Descripcion'];
                $movimientoActivo->Fecha = $request['Fecha'];
                $movimientoActivo->Cantidad = $request['Cantidad'];
                $movimientoActivo->Monto = $request['Monto'];
                $movimientoActivo->ProveedorId = $request['ProveedorId'];
                $movimientoActivo->MovimientoConceptoId = $request['MovimientoConceptoId'];        
                $req = MovimientoActivo::actualizarMovimiento($movimientoActivo);

                 //vertificar como es la respuesta para enviar el mensaje a la vista
                 return response()->json([$req, "mensaje" => "Movimiento actualizado correctamente"], 200)->header('Content-Type','application/json');
             }
             catch(\Exception $e){
                 $error = ['error'=>$e->getMessage()];
                 return response()->json($error)->header('Content-Type','application/json');
             }
        };

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
         
            //$query = $movimientoActivo->delete();
            //$req = ['elimino'=>$query];
            $req = MovimientoActivo::eliminarMovimiento($movimientoActivo);
            return response()->json($req, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
      
    }

    public function eliminarMovimientoActivo(Request $request){
        
        if($request->ajax()){
            try{
                $movimientoActivo = MovimientoActivo::find($request->MovimientoActivoId);
                //$query = $movimientoActivo->delete();
                //$req = ['elimino'=>$query];
                $req = MovimientoActivo::eliminarMovimiento($movimientoActivo);
                //verificar la respuesta que envia el json para mostrar el mensaje en la vista
                return response()->json([$req, "mensaje"=>"Movimiento eliminado correctamente"], 200)->header('Content-Type','application/json');
            }
            catch(\Exception $e){
                $error = ['error'=>$e->getMessage()];
                return response()->json($error)->header('Content-Type','application/json');
            }
           
        };
    }
}
