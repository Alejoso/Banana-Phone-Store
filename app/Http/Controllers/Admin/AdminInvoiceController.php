<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Models\Invoice;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminInvoiceController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['invoices'] = Invoice::with(['user', 'office'])->get();

        return view('admin.invoice.index')->with('viewData', $viewData);
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

        return view('admin.invoice.show')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];

        $viewData['invoice'] = Invoice::with(['user', 'office'])->findOrFail($id);
        $viewData['users'] = User::all();
        $viewData['offices'] = Office::all();

        return view('admin.invoice.edit')->with('viewData', $viewData);
    }

    public function update(StoreInvoiceRequest $request, int $id): RedirectResponse
    {
        $invoice = Invoice::with(['user', 'office'])->findOrFail($id);
        $validatedInvoiceData = $request->validated();

        $invoice->update($validatedInvoiceData);

        return redirect()->route('admin.invoice.show', $invoice->getId());
    }

    public function destroy(int $id): RedirectResponse
    {
        Invoice::destroy($id);

        return redirect()->route('admin.invoice.index');
    }
}
