<?php

namespace App\Http\Controllers;

use App\presentacion;
use App\inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PresentacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:presentacion.index')->only(['index', 'obtenerPresentaciones']);
        $this->middleware('permission:presentacion.create')->only(['create', 'store']);
        $this->middleware('permission:presentacion.edit')->only(['edit', 'update', 'actualizarPresentacion']);
        $this->middleware('permission:presentacion.destroy')->only(['destroy', 'eliminarPresentacion']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('presentaciones.index');

    }

    public function obtenerPresentaciones()
    {
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
            //$presentacion->save();
            $res = Presentacion::crearPresentacion($presentacion);
            return response()->json([$res[0], "mensaje"=>"Producto final creado correctamente"], 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return $error;
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
    public function actualizarPresentacion(Request $request)
    {
        try{
            if($request->ajax()){
                $presentacion = Presentacion::find($request->pId);
                $presentacion->ActivoId = $request->ActivoId;
                $presentacion->ProductoId = $request->ProductoId;
                $id = "{$request->ProductoId}{$request->ActivoId}";
                $presentacion->PresentacionId = $id;
                $presentacion->save();
                return response()->json([
                    "mensaje" => "Producto final actualizado correctamente"
                ]);
            };
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            if(str_contains($error['error'], "for key 'PRIMARY'")){
                return response()->json([
                    "mensaje" => "Ya existe ese producto final, por favor elija otro"
                ], 409);
            }
            return $error;
        }
    }
    public function eliminarPresentacion(Request $request)
    {
        if($request->ajax()){
            $presentacion = Presentacion::find($request->id);
            $presentacion->delete();
            return response()->json([
                "mensaje" => "Producto final eliminado correctamente"
            ]);
        };
    }
}
