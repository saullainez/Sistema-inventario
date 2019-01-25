<?php

namespace App\Http\Controllers;

use App\User;
use App\Producto;
use App\Presentacion;
use App\Activo;
use App\Http\Controllers\reportes\repInvController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = DB::table('empresas')
        ->whereraw('Tipo = ? or Tipo = ?',['Proveedor','Cliente-Proveedor'])
        ->get();
        $clientes = DB::table('empresas')
        ->whereraw('Tipo = ? or Tipo = ?',['Cliente','Cliente-Proveedor'])
        ->get();
        $consumibles = DB::table('inventario_activos as ia')
        ->select('ia.ActivoId','a.ActivoNombre','ia.Cantidad')
        ->whereraw('a.TipoActivo = ?',['Consumible'])
        ->join('activos as a','ia.ActivoId','=','a.ActivoId')->get();
        $equipos = DB::table('inventario_activos as ia')
        ->select('ia.ActivoId','a.ActivoNombre','ia.Cantidad')
        ->whereraw('a.TipoActivo = ?',['Equipo'])
        ->join('activos as a','ia.ActivoId','=','a.ActivoId')->get();
        $productos = Producto::get();
        $usuarios = User::get();
        $presentaciones = Presentacion::get();
        $activos = Activo::get();
        return view('home', compact('usuarios', 'clientes', 'proveedores', 'productos', 
        'presentaciones', 'activos', 'consumibles', 'equipos'));
        //return($usuarios);
    }
}
