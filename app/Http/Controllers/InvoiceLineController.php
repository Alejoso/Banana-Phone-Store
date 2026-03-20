<?php

namespace App\Http\Controllers;

use App\Models\InvoiceLine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceLineController extends Controller
{
    private function reqValidate(Request $request): void
    {
        $request->validate([
            'unit_price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'reason' => 'required',
            'invoice_id' => 'required', /*
            'phone_id' => 'required'*/
        ]);
    }

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

    public function save(Request $request): RedirectResponse
    {
        reqValidate($request);

        InvoiceLine::create($request->only('unit_price', 'discount', 'quantity', 'reason', 'invoice_id'/*, 'phone_id'*/));

        return back()->with('message', 'Invoice Line created.');
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

    public function update(Request $request, int $id): RedirectResponse
    {
        $invoiceLine = InvoiceLine::findOrFail($id);
        $invoiceLine->update($request->validated());

        return redirect()->route('invoiceLines.show', $invoiceLine->getId());
    }
}
