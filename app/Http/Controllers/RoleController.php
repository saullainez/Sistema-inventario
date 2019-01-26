<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:roles.index')->only(['index', 'obtenerRoles']);
        $this->middleware('permission:roles.agregarpermiso')->only('agregarPermisoRol');
        $this->middleware('permission:roles.create')->only(['create', 'store']);
        $this->middleware('permission:roles.edit')->only(['edit', 'update', 'actualizarRol']);
        $this->middleware('permission:roles.destroy')->only(['destroy', 'eliminarRol']);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('roles.index');
    }

    public function obtenerRoles()
    {
        $roles = Role::get();
        return response()->json($roles, 200);
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
                Role::create([
                    'name' => $request['name'],
                    'slug' => $request['slug'],
                    'description' => $request['description'],
                    'special' => $request['special']
                ]);
                return response()->json([
                    "mensaje" => "Rol creado correctamente"
                ]);
            };
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            if(str_contains($error['error'], "for key 'roles_slug_unique'")){
                return response()->json([
                    "mensaje" => "Ya existe ese slug, por favor elija otro"
                ], 409);
            }elseif(str_contains($error['error'], "for key 'roles_name_unique'")){
                return response()->json([
                    "mensaje" => "Ya existe ese nombre, por favor elija otro"
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

    public function actualizarRol(Request $request)
    {
        try{
            if($request->ajax()){
                $rol = Role::find($request->id);
                $rol->name = $request['name'];
                $rol->slug = $request['slug'];
                $rol->description = $request['description'];
                $rol->special = $request['special'];
                $rol->save();
                return response()->json([
                    "mensaje" => "Rol actualizado correctamente"
                ]);
            };
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            if(str_contains($error['error'], "for key 'roles_slug_unique'")){
                return response()->json([
                    "mensaje" => "Ya existe ese slug, por favor elija otro"
                ], 409);
            }elseif(str_contains($error['error'], "for key 'roles_name_unique'")){
                return response()->json([
                    "mensaje" => "Ya existe ese nombre, por favor elija otro"
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

    public function eliminarRol(Request $request)
    {
        if($request->ajax()){
            $rol = Role::find($request->id);
            $rol->delete();
            return response()->json([
                "mensaje" => "Rol eliminado correctamente"
            ]);
        };
    }

    public function agregarPermisoRol(Request $request)
    {
        if($request->ajax()){
            $rol = Role::find($request->id);
            $rol->permissions()->sync($request->permissions);
            return response()->json([
                "mensaje" => "Permiso asignado correctamente"
            ]);
        };
    }

    public function verPermisoRol(Request $request)
    {
        if($request->ajax()){
            $rol = Role::find($request->id);
            $permisos = $rol->getpermissions();
            return response()->json($permisos, 200);
        };
    }
}
