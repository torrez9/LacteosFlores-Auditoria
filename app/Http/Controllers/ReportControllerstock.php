<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;

class ReportControllerstock extends Controller
{
    public function indexStock(): View
    {
        $reportes = Stock::all();
        return view('Reportes.stock', compact('reportes'));
    }
    public function stockPDF()
    {
        $reportes = Stock::all();
        $pdf = PDF::loadView('Reportes.stockpdf', compact('reportes'));
        return $pdf->stream();
    }
}
