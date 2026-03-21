<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceLineRequest;
use App\Models\InvoiceLine;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InvoiceLineController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['invoiceLines'] = InvoiceLine::all();

        return view('invoiceLines.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $invoiceLine = InvoiceLine::findOrFail($id);
        $viewData['invoiceLine'] = $invoiceLine;

        return view('invoiceLines.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];

        return view('invoiceLines.create')->with('viewData', $viewData);
    }

    public function save(StoreInvoiceLineRequest $request): RedirectResponse
    {
        $validatedInvoiceLine = $request->validated();
        InvoiceLine::create($validatedInvoiceLine);

        return back();
    }

    public function delete(int $id): View
    {
        InvoiceLine::destroy($id);

        $viewData = [];
        $viewData['invoiceLines'] = InvoiceLine::all();

        return view('invoiceLines.index')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $invoiceLine = InvoiceLine::findOrFail($id);
        $viewData['invoiceLine'] = $invoiceLine;

        return view('invoiceLines.edit')->with('viewData', $viewData);
    }

    public function update(StoreInvoiceLineRequest $request, int $id): RedirectResponse
    {
        $validatedInvoiceLine = $request->validated();

        $invoiceLine = InvoiceLine::findOrFail($id);
        $invoiceLine->update($validatedInvoiceLine);

        return redirect()->route('invoiceLines.show', $invoiceLine->getId());
    }
}
