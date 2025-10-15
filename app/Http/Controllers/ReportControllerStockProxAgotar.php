<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stockproxagotarse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerStockProxAgotar extends Controller
{
    public function indexreportstockproxagotarse(): View
    {
        $reportes = stockproxagotarse::all();
        return view('Reportes.stockproxagotarse', compact('reportes'));
    }

    public function stockproxagotarpdf()
    {
        $reportes = stockproxagotarse::all();
        $pdf = PDF::loadView('Reportes.stockproxagotarsePdf', compact('reportes'));
        return $pdf->stream();
    }
}
