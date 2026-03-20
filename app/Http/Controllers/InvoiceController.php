<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    // Form validation.
    private function reqValidate(Request $request): void
    {
        $request->validate([
            'date' => 'required', // ,
            // 'custom_user_id' => 'required',
            // 'office_id' => 'required',
        ]);
    }

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

    public function save(Request $request): RedirectResponse
    {
        reqValidate($request);

        Invoice::create($request->only('date', 'invoice_lines'/*, 'custom_user_id', 'office_id'*/));

        $request->session()->flash('status', 'Success');

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

    public function update(Request $request, int $id): RedirectResponse
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->validated());

        return redirect()->route('invoices.show', $invoice->getId());
    }
}
