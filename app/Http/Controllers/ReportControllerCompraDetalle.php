<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detallecompra2;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerCompraDetalle extends Controller
{
    public function indexCompracondetalles(Request $request): View
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        // Obtener los reportes filtrados por fecha si se especificaron
        if ($fecha_inicio && $fecha_fin) {
            $reportes = detallecompra2::whereBetween('fecha_compra', [$fecha_inicio, $fecha_fin])->get();
        } else {
            // Si no se especifican fechas, obtener todos los reportes
            $reportes = detallecompra2::all();
        }

        return view('Reportes.compracondetalles', compact('reportes'));
    }

    public function compracondetallesPdf()
    {
        $reportes = detallecompra2::all();
        $pdf = PDF::loadView('Reportes.compracondetallesPdf', compact('reportes'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

}
