<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:usuarios.index')->only(['index', 'obtenerUsuarios']);
        $this->middleware('permission:usuarios.agregarrol')->only('agregarRolUsuario');
        $this->middleware('permission:usuarios.create')->only(['create', 'store']);
        $this->middleware('permission:usuarios.edit')->only(['edit', 'update', 'actualizarUsuario']);
        $this->middleware('permission:usuarios.destroy')->only(['destroy', 'eliminarUsuario']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view ('usuarios.index', compact('users'));

    }

    public function obtenerUsuarios()
    {
        $usuarios = User::get();
        return response()->json($usuarios, 200);
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
                User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]);
                return response()->json([
                    "mensaje" => "Usuario creado correctamente"
                ]);
            };
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            if(str_contains($error['error'], "Integrity constraint violation: 1062 Duplicate entry")){
                return response()->json([
                    "mensaje" => "Ya existe ese correo electrónico, por favor elija otro"
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
    /*public function update(Request $request)
    {
        if($request->ajax()){
            $usuario = User::find($request->id);
            $usuario->name = $request['name'];
            $usuario->email = $request['email'];
            $usuario->save();
            return response()->json([
                "mensaje" => "Usuario actualizado correctamente"
            ]);
        };
    }*/

    public function actualizarUsuario(Request $request)
    {
        try{
            if($request->ajax()){
                $usuario = User::find($request->id);
                $usuario->name = $request['name'];
                $usuario->email = $request['email'];
                $usuario->save();
                return response()->json([
                    "mensaje" => "Usuario actualizado correctamente"
                ]);
            };
        }
        catch(\Exception $e){
            $error = ['error' => $e->getMessage()];
            if(str_contains($error['error'], "Integrity constraint violation: 1062 Duplicate entry")){
                return response()->json([
                    "mensaje" => "Ya existe ese correo electrónico, por favor elija otro"
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
        if($request->ajax()){
            $usuario = User::find($request->id);
            $usuario->delete();
            return response()->json([
                "mensaje" => "Usuario eliminado correctamente"
            ]);
        };
    }*/

    public function eliminarUsuario(Request $request)
    {
        if($request->ajax()){
            $usuario = User::find($request->id);
            $usuario->delete();
            return response()->json([
                "mensaje" => "Usuario eliminado correctamente"
            ]);
        };
    }

    public function agregarRolUsuario(Request $request)
    {
        if($request->ajax()){
            $usuario = User::find($request->id);
            $usuario->roles()->sync($request->roles);
            return response()->json([
                "mensaje" => "Rol asignado correctamente"
            ]);
        };
    }
    public function verRolUsuario(Request $request)
    {
        if($request->ajax()){
            $usuario = User::find($request->id);
            $roles = $usuario->getroles();
            return response()->json($roles, 200);
        };
    }
}
