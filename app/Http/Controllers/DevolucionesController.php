<?php

namespace App\Http\Controllers;

use App\Models\detalledevolucion;
use App\Models\devoluciones;
use App\Models\User;
use App\Models\producto;
use App\Models\factura;
use App\Models\detallefactura;
use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos= producto::all();
        $usuarios = User::all();
        $facturas = factura::all();
        $ultimoId = devoluciones::latest()->value('id_devolucion');
    
        // Sumar 1 para obtener el siguiente id
       $nuevoId = $ultimoId + 1;
        return view('Devolucion.index', compact('facturas', 'nuevoId'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function anularFactura1(Request $request)
    {
        //$this->buscarFactura($request);
        $data = $request->json()->all();

        $idfactura = $request->input('idfactura');
       // $idusuario = $request->input('idusuario');
        $fechaDevolucion = $request->input('fechadevolucion');
        $totalDevolucion = $request->input('totaldevolucion');
        $motivoDevolucion = $request->input('motivodevolucion');
        $accionesTomadas = $request->input('accionestomadas');
        $estado = $request->input('estado');
        
    //dd($request);

     // Inserta en la tabla de devoluciones
     $devolucion = new Devoluciones();
     $devolucion->idfactura = $idfactura;
     $devolucion->fechadevolucion = $fechaDevolucion;
     $devolucion->totaldevolucion = $totalDevolucion;
     $devolucion->motivodevolucion = $motivoDevolucion;
     $devolucion->accionestomada = $accionesTomadas;
    
     $devolucion->save();

     // Obtener el ID de la devolución recién creada
     $iddevolucion = $request->input('iddevolucion');
     //$devolucion->id_devolucion;

     // Obtener los detalles de la factura original
     //$detallesFactura = DetalleFactura::where('idfactura', $numeroFactura)->get();
     $detalles = $data['detalle'];
     // Insertar los detalles de la devolución
     foreach ($detalles as $detalle) {
         $detalleDevolucion = new DetalleDevolucion();
         $detalleDevolucion->iddevolucion = $iddevolucion;
         $detalleDevolucion->cantidadD   = $detalle['cantidadD'];
         $detalleDevolucion->precio = $detalle['precio'];
         $detalleDevolucion->idproducto = $detalle['idproducto'];
         $detalleDevolucion->save();
     }
        // Capturar los datos de la devolución e insertarlos
        $factura = Factura::find($idfactura);
        if ($factura) {
            $factura->estado=$estado;
            $factura->save();
    
           
    
            return response()->json(['message' => 'Factura anulada y devolución registrada correctamente']);
        } else {
            return response()->json(['error' => 'Factura no encontrada'], 404);
        }
    }
    


    public function buscarFactura(Request $request)
    {
        $numeroFactura = $request->input('id_factura');
        
        // Buscar la factura por número
        $factura = Factura::where('id_factura', $numeroFactura)->first();
        
        if ($factura) {
            // Buscar los detalles de la factura
            $detallesFactura = DetalleFactura::where('idfactura', $numeroFactura)->get();
    
            // Preparar la respuesta JSON
            $response = [
                'factura' => [
                    'id_factura' => $factura->id_factura,
                    'fechafactura' => $factura->fechafactura,
                    'totalfactura' => $factura->totalfactura,
                    'estado' => $factura->estado
                ],
                'detalles' => $detallesFactura
            ];
        
            return response()->json($response);
        } else {
            return response()->json(['message' => 'Factura no encontrada'], 404);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
      
    }

    /**
     * Display the specified resource.
     */
    public function show(devoluciones $devoluciones, Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(devoluciones $devoluciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, devoluciones $devoluciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(devoluciones $devoluciones)
    {
        //
    }
}
