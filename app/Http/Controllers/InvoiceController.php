<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    
    public function preview($id)
    {
        $invoice = Invoice::find($id);
        return view('invoice.index', compact('invoice'));
    }

    public function download($id)
    {
        $invoice = Invoice::find($id);
        $pdf = Pdf::loadView('invoice.index', [
            'invoice' => $invoice
        ]);
        $name = 'INVOICE-'.$invoice->id.'.pdf';
        return $pdf->download($name);
    }
}
