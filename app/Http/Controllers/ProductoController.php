<?php

namespace App\Http\Controllers;

use App\Http\Requests\Productos\validacion;
use App\Models\producto;
use App\Models\proveedores;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores =proveedores::all();
        $productos = producto::all();
        return view("Productos.index", compact("productos")); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores =proveedores::all();
        return view ("Productos.create", compact("proveedores"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validacion $request)
    {
        $producto = producto::create($request->except('_token'));
        // dd($request->except('_token'));
         $producto->save();
         flash()->AddSuccess('Producto registrado correctamente.', 'Bien');
         return redirect()->route('Productos.index');//retornar la vista //
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {   
        $producto = producto::findOrFail($id);
        $proveedores =proveedores::all();
        return view('Productos.edit', compact('producto', 'proveedores'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto, $id)
    {
        $producto=producto::find($id);//
        $producto->descripcion=$request->input('descripcion');
        $producto->cantidadprod=$request->input('cantidadprod');
        $producto->precioventa=$request->input('precioventa');
        $producto->idproveedor=$request->input('idproveedor');

        $producto->update();
        return redirect()->route('Productos.index');//retornar la vista//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto=producto::find($id);
        $producto->delete();//
        return redirect()->route('Productos.index')->with('succes', 'Producto eliminado correctamente');//retornar la vista//
        //
    }
}
