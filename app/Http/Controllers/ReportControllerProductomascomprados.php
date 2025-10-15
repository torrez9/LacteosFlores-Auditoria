<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productomascomprados;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerProductomascomprados extends Controller
{
    public function indexproductomascomprados(): View
    {
        
        $reportes = productomascomprados::all();
        return view('Reportes.productosmascomprados', compact('reportes'));
    }
    public function stockProductoMasCompradosPDF(Request $request){

        $reportes = productomascomprados::all();
        $pdf = PDF::loadView('Reportes.productosMasCompradosPdf', compact('reportes'));
        return $pdf->stream();
    }
}
