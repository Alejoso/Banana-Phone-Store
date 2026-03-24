<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $user = auth()->user();
        $viewData['invoices'] = $user->getInvoices();

        return view('invoice.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['invoice'] = Invoice::with(['user', 'office', 'invoiceLines'])->findOrFail($id);

        $total = 0;
        foreach ($viewData['invoice']->getInvoiceLines() as $invoiceLine) {
            $total += $invoiceLine->getUnitPrice() * $invoiceLine->getQuantity() * (1 - $invoiceLine->getDiscount());
        }

        $viewData['total'] = $total;

        return view('invoice.show')->with('viewData', $viewData);
    }
}
