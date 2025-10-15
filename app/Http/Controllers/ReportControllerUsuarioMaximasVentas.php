<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarioconmasventas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerUsuarioMaximasVentas extends Controller
{
    public function indexusuarioconmasventas(): View
    {
        $reportes = usuarioconmasventas::all();
        return view('Reportes.usuariomasventas', compact('reportes'));
    }

    public function stockusuarioconmasventasPDF(Request $request){

        $reportes = usuarioconmasventas::all();
        $pdf = PDF::loadView('Reportes.usuariomasventasPdf', compact('reportes'));
        return $pdf->stream();
    }
}
