<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productosmasvendidos;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerProductosmasvendidos extends Controller
{
    public function indexproductomasvendidos(): View
    {
        $reportes = productosmasvendidos::all();
        return view('Reportes.productosmasvendidos', compact('reportes'));
    }

    public function stockProductoMasVendidosPDF(Request $request){

        $reportes = productosmasvendidos::all();
        $pdf = PDF::loadView('Reportes.productosMasVendidosPdf', compact('reportes'));
        return $pdf->stream();
    }
}
