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
        $viewData['title'] = 'Invoices';
        $viewData['subtitle'] = 'Registered invoices.';
        $viewData['invoice'] = Invoice::all();

        return view('invoice.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $invoice = Invoice::findOrFail($id);
        $viewData['title'] = $invoice->getDate();
        $viewData['subtitle'] = $invoice->getDate().' - invoice details';
        $viewData['invoice'] = $invoice;

        return view('invoice.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Register new invoice';

        return view('invoice.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        reqValidate($request);

        Invoice::create($request->all());

        return back()->with('message', 'Invoice registered correctly.');
    }

    public function delete(int $id): View
    {
        Invoice::destroy($id);

        $viewData = [];
        $viewData['title'] = 'Invoices';
        $viewData['subtitle'] = 'Registered invoices';
        $viewData['invoice'] = Invoice::all();

        return view('invoice.index')->with('viewData', $viewData);
    }

    public function addInvoiceLine(string $invoiceLine): View
    {
        $viewData = [];
        $viewData['title'] = 'Edit existing invoice';

        return view('invoice.addInvoiceLine')->with('viewData', $viewData);
    }
}
