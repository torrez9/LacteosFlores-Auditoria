<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facturacioncondetalles;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerFacturacionDetalle extends Controller
{
    public function indexfacturaciondetalle(Request $request): View
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        // Obtener los reportes filtrados por fecha si se especificaron
        if ($fecha_inicio && $fecha_fin) {
            $reportes = facturacioncondetalles::whereBetween('fecha_factura', [$fecha_inicio, $fecha_fin])->get();
        } else {
            // Si no se especifican fechas, obtener todos los reportes
            $reportes = facturacioncondetalles::all();
        }

        return view('Reportes.facturaciondetalle', compact('reportes'));
    }

    public function facturaciondetallepdf(Request $request)
    {
        $reportes = facturacioncondetalles::all();

        // Cargar la vista del PDF y pasar los datos
        $pdf = PDF::loadView('Reportes.facturaciondetallePdf', compact('reportes'));

        // Establecer tamaño de página horizontal (landscape)
        $pdf->setPaper('a4', 'landscape');

        // Retornar el PDF para su visualización o descarga
        return $pdf->stream('reporte_facturaciondetalle.pdf');
    }
}
