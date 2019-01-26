<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:permisos.index')->only(['index', 'obtenerPermisos']);
        $this->middleware('permission:permisos.create')->only(['create', 'store']);
        $this->middleware('permission:permisos.edit')->only(['edit', 'update', 'actualizarPermiso']);
        $this->middleware('permission:permisos.destroy')->only(['destroy', 'eliminarPermiso']);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permisos.index');
    }

    public function obtenerPermisos()
    {
        $permisos = Permission::get();
        return response()->json($permisos, 200);
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
        try{
            if($request->ajax()){
                Permission::create([
                    'name' => $request['name'],
                    'slug' => $request['slug'],
                    'description' => $request['description'],
                ]);
                return response()->json([
                    "mensaje" => "Permiso creado correctamente"
                ]);
            };
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            if(str_contains($error['error'], "for key 'permissions_slug_unique'")){
                return response()->json([
                    "mensaje" => "Ya existe ese slug, por favor elija otro"
                ], 409);
            }
            return $error;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

    public function actualizarPermiso(Request $request)
    {
        try{
            if($request->ajax()){
                $permiso = Permission::find($request->id);
                $permiso->name = $request['name'];
                $permiso->slug = $request['slug'];
                $permiso->description = $request['description'];
                $permiso->save();
                return response()->json([
                    "mensaje" => "Permiso actualizado correctamente"
                ]);
            };
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            if(str_contains($error['error'], "for key 'permissions_slug_unique'")){
                return response()->json([
                    "mensaje" => "Ya existe ese slug, por favor elija otro"
                ], 409);
            }
            return $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }*/

    public function eliminarPermiso(Request $request)
    {
        if($request->ajax()){
            $permiso = Permission::find($request->id);
            $permiso->delete();
            return response()->json([
                "mensaje" => "Permiso eliminado correctamente"
            ]);
        };
    }
}
