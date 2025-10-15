<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloproveedores;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerModeloproveedores extends Controller
{
    public function indexreportproveedores(): View
    {
        $reportes = modeloproveedores::all();
        return view('Reportes.proveedores', compact('reportes'));
    }

    public function stockproveedorpdf()
    {
        $reportes = modeloproveedores::all();

        // Cargar la vista del PDF y pasar los datos
        $pdf = PDF::loadView('Reportes.proveedoresPdf', compact('reportes'));

        // Establecer tamaño de página horizontal (landscape)
        $pdf->setPaper('a4', 'landscape');

        // Retornar el PDF para su visualización o descarga
        return $pdf->stream('reporte_proveedoresPdf.pdf');
    }

}
