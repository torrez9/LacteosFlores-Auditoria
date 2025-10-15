<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view("Usuarios.index", compact("usuarios")); //
        //$proveedores =proveedores::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Usuarios.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Crear un nuevo usuario
         $user = new User();
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         // Encriptar la contraseña antes de guardarla
         $user->password = Hash::make($request->input('password'));
         $user->cedula = $request->input('cedula');
         $user->tipousuario = $request->input('tipousuario');
         $user->estado = $request->input('estado');
         $user->apellido = $request->input('apellido');
         $user->direccion = $request->input('direccion');
         $user->telefono = $request->input('telefono');
         $user->save();
 
         // Devolver una respuesta adecuada
         
        // dd($request->except('_token'));
         flash()->AddSuccess('Usuario registrado correctamente.', 'Bien');
         return redirect()->route('Usuario.index');//retornar a la ruta////
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
            $usuario=User::find($id);
            $usuario->delete();//
            return redirect()->route('Usuario.index')->with('succes', 'Proveedor eliminado correctamente');//retornar la vista//
        
    }
}
