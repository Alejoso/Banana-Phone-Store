<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['invoices'] = Invoice::all();

        return view('invoices.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $invoice = Invoice::findOrFail($id);
        $viewData['invoice'] = $invoice;

        return view('invoices.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('invoices.create');
    }

    public function save(StoreInvoiceRequest $request): RedirectResponse
    {
        $validatedInvoice = $request->validated();
        Invoice::create($request->only($validatedInvoice));

        return back();
    }

    public function delete(int $id): RedirectResponse
    {
        Invoice::destroy($id);

        return back();
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $invoice = Invoice::findOrFail($id);
        $viewData['invoice'] = $invoice;

        return view('invoices.edit')->with('viewData', $viewData);
    }

    public function update(StoreInvoiceRequest $request, int $id): RedirectResponse
    {
        $validatedInvoice = $request->validated();

        $invoice = Invoice::findOrFail($id);
        $invoice->update($validatedInvoice);

        return redirect()->route('invoices.show', $invoice->getId());
    }
}
