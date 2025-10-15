<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\detallefactura;
use App\Models\producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   //public $detalles; 

    public function index()
    {
        $Usuarios = User::all();
        $productos = producto::all();
        //Mostrar el id de la factura 
        $ultimoId = Factura::latest()->value('id_factura');
    
         // Sumar 1 para obtener el siguiente id
        $nuevoId = $ultimoId + 1;
        return view('Facturas.index', compact('productos', 'nuevoId'));//
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Facturas.index');//
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

   
           
    /**Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {
       // Obtener los datos JSON del cuerpo de la solicitud
       $data = $request->json()->all();

       // Crear una nueva entidad de compra
       $factura = new factura();
       $factura->totalfactura = $request->input('totalfactura');
       $factura->estado = $request->input('estado', null);
       $factura->idusuario = $request->input('idusuario');
       $factura->fechafactura = $request->input('fechafactura');
       $factura->save();

       // Obtener el ID de la compra recién creada
       $idfactura = $factura->id_factura ;

       // Obtener los detalles de compra del JSON
        //dd($request);
       $detalles = $data['detalles'];
       // Crear detalles de compra asociados a esta compra
       foreach ($detalles as $detalle) {
           $detalleVenta = new detallefactura();
           $detalleVenta->idfactura = $idfactura;
           $detalleVenta->idproducto = $detalle['idproducto'];
           $detalleVenta->cantidad = $detalle['cantidad'];
           $detalleVenta->precio = $detalle['precio'];
           $detalleVenta->importe = $detalle['importe'];
           
           $detalleVenta->save();
       }
       // Devolver una respuesta JSON
        return response()->json(['message' => 'Factura creada exitosamente', 'Factura' => $factura]);
        }
        // catch (\Exception $e) {
        //     // Manejar el error y devolver una respuesta JSON
        //     return response()->json(['error' => 'Hubo un error al crear la factura', 'details' => $e->getMessage()], 500);
        // }
    

    /**
     * Display the specified resource.
     */
    public function show(factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(factura $factura)
    {
        //
    }
}
