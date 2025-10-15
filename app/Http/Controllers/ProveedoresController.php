<?php

namespace App\Http\Controllers;

use App\Http\Requests\Proveedor\StoreRequest;
use App\Models\proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores =proveedores::all();
        return view('Proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Proveedores.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $proveedor = proveedores::create($request->except('_token'));
        // dd($request->except('_token'));
         $proveedor->save();
         flash()->AddSuccess('Proveedor registrado correctamente.', 'Bien');
         return redirect()->route('Proveedores.index');//retornar la vista//
    }

    /**
     * Display the specified resource.
     */
    public function show(proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = proveedores::findOrFail($id);
        return view('Proveedores.edit', compact('proveedor'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, proveedores $proveedores, $id)
    {
       $proveedor=proveedores::find($id);//
       $proveedor->nombre=$request->input('nombre');
       $proveedor->cedula=$request->input('cedula');
       $proveedor->estado=$request->input('estado');
       $proveedor->ruc=$request->input('ruc');
       $proveedor->razonsocial=$request->input('razonsocial');
       $proveedor->nombre=$request->input('nombre');
       $proveedor->apellido=$request->input('apellido');
       $proveedor->direccion=$request->input('direccion');
       $proveedor->telefono=$request->input('telefono');
       $proveedor->email=$request->input('email');

       $proveedor->update();
       return redirect()->route('Proveedores.index');//retornar la vista//

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor=proveedores::find($id);
        $proveedor->delete();//
        return redirect()->route('Proveedores.index')->with('succes', 'Proveedor eliminado correctamente');//retornar la vista//
    }
}
