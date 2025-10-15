<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detalledevolucion1;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerDevoluciondetalle extends Controller
{
    public function indexdevolucioncondetalles(Request $request): View
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        // Obtener los reportes filtrados por fecha si se especificaron
        if ($fecha_inicio && $fecha_fin) {
            $reportes = detalledevolucion1::whereBetween('fecha_devolucion', [$fecha_inicio, $fecha_fin])->get();
        } else {
            // Si no se especifican fechas, obtener todos los reportes
            $reportes = detalledevolucion1::all();
        }

        return view('Reportes.devolucioncondetalles', compact('reportes'));
    }

    public function devolucioncondetallePdf()
    {
        $reportes = detalledevolucion1::all();

        // Cargar la vista del PDF y pasar los datos
        $pdf = PDF::loadView('Reportes.devolucioncondetallesPdf', compact('reportes'));

        // Establecer tamaño de página horizontal (landscape)
        $pdf->setPaper('a4', 'landscape');

        // Retornar el PDF para su visualización o descarga
        return $pdf->stream('reporte_devoluciones.pdf');
    }
}
