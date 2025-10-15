<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productosmasdevuelto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;


class ReportControllerProductosmasdevueltos extends Controller
{
    //
    public function indexproductomasdevueltos(): View
    {
        $reportes = productosmasdevuelto::all();
        return view('Reportes.productomasdevuelto', compact('reportes'));
    }

    public function stockProductoMasdevueltosPDF(Request $request){

        $reportes = productosmasdevuelto::all();
        $pdf = PDF::loadView('Reportes.productomasdevueltoPdf', compact('reportes'));
        return $pdf->stream();
    }
}
