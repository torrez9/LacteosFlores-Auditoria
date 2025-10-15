<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\detallecompra;
use App\Models\producto;
use App\Models\proveedores;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores =proveedores::all();
        $productos = producto::all();
        $ultimoId = compra::latest()->value('id_compra');
    
        // Sumar 1 para obtener el siguiente id
       $nuevoId = $ultimoId+2;
        return view('Compras.index', compact('productos','proveedores', 'nuevoId'));//

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function miMetodo()
    {
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el ID del usuario autenticado
            $idusuario = Auth::id();
            
            // Ahora puedes usar $id_usuario como necesites en tu lógica de controlador
        } else {
            // El usuario no está autenticado, realiza alguna acción apropiada
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtener los datos JSON del cuerpo de la solicitud
        $data = $request->json()->all();
         
        // Crear una nueva compra
        $compra = new Compra();
        $compra->fechacompra = $request->fechacompra;
        $compra->idproveedores = $request->idproveedores;
        $compra->id_usuario = $request->id_usuario;
        $compra->Total = $request->Total;
        $compra->save();
    
        // Obtener el ID de la compra recién creada
        $id_compra = $compra->id_compra;

    
        // Obtener los detalles de compra del request
        $detalles = $data['detalles'];
    
        // Guardar los detalles de la compra
        foreach ($detalles as $detalle) {
            $detalleCompra = new DetalleCompra();
            $detalleCompra->idcompra = $id_compra;
            $detalleCompra->idproducto = $detalle['idproducto'];
            $detalleCompra->precio = $detalle['precio'];
            $detalleCompra->cantidad = $detalle['cantidad'];
            $detalleCompra->importe = $detalle['importe'];
            $detalleCompra->save();
        }
    
        // Devolver una respuesta JSON
        return response()->json(['message' => 'Compra creada exitosamente', 'compra' => $compra]);
    }

    /**
     * Display the specified resource.
     */
    public function show(compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(compra $compra)
    {
        //
    }
}
