<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class movimientosController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('permission:movimientos.index')->only('index');

    }

    public function index()
    {       
        return view('movimientos');
    }
}
