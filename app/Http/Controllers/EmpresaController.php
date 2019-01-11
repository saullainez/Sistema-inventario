<?php

namespace App\Http\Controllers;

use App\empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:empresa.index')->only(['index', 'obtenerEmpresa']);
        $this->middleware('permission:empresa.create')->only(['create', 'store']);
        $this->middleware('permission:empresa.edit')->only(['edit', 'update', 'actualizarEmpresa']);
        $this->middleware('permission:empresa.destroy')->only(['destroy', 'eliminarEmpresa']);
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
            $empresas = Empresa::get();
            return view ('empresas.index', compact('empresas'));
            //return response()->json($empresas, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }

    }

    public function obtenerEmpresas()
    {
        $empresas = Empresa::get();
        return response()->json($empresas, 200);
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
            $empresa = new Empresa;
            $empresa->EmpresaNombre = $request->Input('EmpresaNombre');
            $empresa->EmpresaDireccion = $request->Input('EmpresaDireccion');
            $empresa->EmpresaTelefono = $request->Input('EmpresaTelefono');
            $empresa->EmpresaCorreo = $request->Input('EmpresaCorreo');
            $empresa->Contacto = $request->Input('Contacto');
            $empresa->ContactoTelefono = $request->Input('ContactoTelefono');
            $empresa->ContactoCorreo = $request->Input('ContactoCorreo');
            $empresa->FechaPago = $request->Input('FechaPago');
            $empresa->tipo = $request->Input('Tipo');

            $empresa->save();

            return response()->json([$empresa, "mensaje" => "Empresa creada correctamente"], 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
        //
        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(empresa $empresa)
    {
        //
        return $empresa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empresa $empresa)
    {
        //
        
        try{
            $empresa->EmpresaNombre = $request->Input('EmpresaNombre');
            $empresa->EmpresaDireccion = $request->Input('EmpresaDireccion');
            $empresa->EmpresaTelefono = $request->Input('EmpresaTelefono');
            $empresa->EmpresaCorreo = $request->Input('EmpresaCorreo');
            $empresa->Contacto = $request->Input('Contacto');
            $empresa->ContactoTelefono = $request->Input('ContactoTelefono');
            $empresa->ContactoCorreo = $request->Input('ContactoCorreo');
            $empresa->FechaPago = $request->Input('FechaPago');
            $empresa->Tipo = $request->Input('Tipo');

            $query = $empresa->save();
            $res = ['actualizo'=>$query];
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
     * @param  \App\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(empresa $empresa)
    {
        //
        
        try{
            $query = $empresa->delete();
            $res = ['elimino'=>$query];
            return response()->json($res, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    //funcion que unicamente devuelve los proveedores 
    //su funcion es para los select (o cualquier otra idea) que sean proveedores
    public function proveedores(){
        try{
            $proveedores = DB::table('empresas')
            ->whereraw('Tipo = ? or Tipo = ?',['Proveedor','Cliente-Proveedor'])
            ->get();
            return response()->json($proveedores, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }

    
    //funcion que unicamente devuelve los clientes
    //su funcion es para los select (o cualquier otra idea) que sean de tipo cliente
    public function clientes(){
        try{
            $clientes = DB::table('empresas')
            ->whereraw('Tipo = ? or Tipo = ?',['Cliente','Cliente-Proveedor'])
            ->get();
            return response()->json($clientes, 200)->header('Content-Type','application/json');
        }
        catch(\Exception $e){
            $error = ['error'=>$e->getMessage()];
            return response()->json($error)->header('Content-Type','application/json');
        }
    }
}
