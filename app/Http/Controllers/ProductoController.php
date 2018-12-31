<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
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
          
            
            $productos = DB::table('productos as p')
            ->select('p.ProductoId', 'p.ProductoNombre','p.ProductoDescripcion','p.TipoBebidaId','tb.nombre as TipoBebida')
            ->join('tipo_bebidas as tb','p.TipoBebidaId','=','tb.TipoBebidaId')->get();
            //dd($productos);
           
            
            return response()->json($productos, 200);
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
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
            $producto = new Producto;
            $producto->ProductoNombre = $request->Input('ProductoNombre');
            $producto->ProductoDescripcion = $request->Input('ProductoDescripcion');
            $producto->TipoBebidaId = $request->Input('TipoBebidaId');
          //  return response()->json($producto, 200);
            $producto->save();
            
          
            return response()->json($producto, 200);
        }catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
        try{
            $pro = Producto::find($producto->ProductoId);
            $pro->ProductoNombre = $request->Input('ProductoNombre');
            $pro->ProductoDescripcion = $request->Input('ProdcutoDescripcion');
            $pro->TipoBebidaId = $request->Input('TipoBebidaId');
            $query = $pro->save();
            return response()->json($pro, 200);
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        try{
            $pro = Producto::find($producto->ProductoId);
            $query = $pro->delete();
            return response()->json($query, 200);
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            return response()->json($error);
        }
       

    }
}
