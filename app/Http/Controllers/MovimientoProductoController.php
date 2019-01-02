<?php

namespace App\Http\Controllers;

use App\MovimientoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MovimientoProductoController extends Controller
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
            $movimientos = DB::table('movimiento_productos as mp')
            ->select('mp.MovimientoProductoId','mp.PresentacionId',
            'p.PresentacionNombre','mp.Descripcion','mp.Fecha',
            'mp.AnioCosecha','mp.Cantidad','mp.ClienteId','e.EmpresaNombre',
            'mp.MovimientoConceptoId','mc.Nombre as MovimientoConceptoNombre',
            'mp.Monto')
            ->join('presentaciones as p','mp.PresentacionId','=','p.PresentacionId')
            ->join('empresas as e','mp.ClienteId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','mp.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->get();

            return response()->json($movimientos, 200)->header('Content-Type','application/json');
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
            $movimiento = new MovimientoProducto;
            $movimiento->PresentacionId = $request->PresentacionId;
            $movimiento->Descripcion = $request->Descripcion;
            $movimiento->Fecha = $request->Fecha;
            $movimiento->AnioCosecha = $request->AnioCosecha;
            $movimiento->Cantidad = $request->Cantidad;
            $movimiento->ClienteId = $request->ClienteId;
            $movimiento->MovimientoConceptoId = $request->MovimientoConceptoId;
            $movimiento->Monto = $request->Monto;
            $movimiento->save();
            return response()->json($movimiento, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoProducto $movimientoProducto)
    {
        //
        try{
            $movimientos = DB::table('movimiento_productos as mp')
            ->select('mp.MovimientoProductoId','mp.PresentacionId',
            'p.PresentacionNombre','mp.Descripcion','mp.Fecha',
            'mp.AnioCosecha','mp.Cantidad','mp.ClienteId','e.EmpresaNombre',
            'mp.MovimientoConceptoId','mc.Nombre as MovimientoConceptoNombre',
            'mp.Monto')
            ->join('presentaciones as p','mp.PresentacionId','=','p.PresentacionId')
            ->join('empresas as e','mp.ClienteId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','mp.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->whereraw('mp.MovimientoProductoId = ?',[$movimientoProducto->MovimientoProductoId])
            ->get();

            return response()->json($movimientos, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimientoProducto $movimientoProducto)
    {
        //
        try{
            $movimientos = DB::table('movimiento_productos as mp')
            ->select('mp.MovimientoProductoId','mp.PresentacionId',
            'p.PresentacionNombre','mp.Descripcion','mp.Fecha',
            'mp.AnioCosecha','mp.Cantidad','mp.ClienteId','e.EmpresaNombre',
            'mp.MovimientoConceptoId','mc.Nombre as MovimientoConceptoNombre',
            'mp.Monto')
            ->join('presentaciones as p','mp.PresentacionId','=','p.PresentacionId')
            ->join('empresas as e','mp.ClienteId','=','e.EmpresaId')
            ->join('movimiento_conceptos as mc','mp.MovimientoConceptoId','=','mc.MovimientoConceptoId')
            ->whereraw('mp.MovimientoProductoId = ?',[$movimientoProducto->MovimientoProductoId])
            ->get();

            return response()->json($movimientos, 200)->header('Content-Type','application/json');
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
     * @param  \App\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimientoProducto $movimientoProducto)
    {
        //
        try{
            $movimientoProducto->PresentacionId = $request->PresentacionId;
            $movimientoProducto->Descripcion = $request->Descripcion;
            $movimientoProducto->Fecha = $request->Fecha;
            $movimientoProducto->AnioCosecha = $request->AnioCosecha;
            $movimientoProducto->Cantidad = $request->Cantidad;
            $movimientoProducto->ClienteId = $request->ClienteId;
            $movimientoProducto->MovimientoConceptoId = $request->MovimientoConceptoId;
            $movimientoProducto->Monto = $request->Monto;
            $query = $movimientoProducto->save();
            $req = ['actualizo'=>$query];
            return response()->json($req, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoProducto $movimientoProducto)
    {
        //
        try{
          
            $query = $movimientoProducto->delete();
            $req = ['elimino'=>$query];
            return response()->json($req, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }

    }
}
