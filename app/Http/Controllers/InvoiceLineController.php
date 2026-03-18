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
        $request->valdate([
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
        $viewData['title'] = 'Invoice lines';
        $viewData['subtitle'] = 'All invoice lines';
        $viewData['invoiceLine'] = InvoiceLine::all();

        return view('invoiceLine.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $invoiceLine = InvoiceLine::findOrFail($id);
        $viewData['title'] = $invoiceLine->getReason();
        $viewData['subtitle'] = $invoiceLine->getUnitPrice();
        $viewData['invoiceLine'] = $invoiceLine;

        return view('invoiceLine.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Register new invoice line';

        return view('invoiceLine.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        reqValidate($request);

        InvoiceLine::create($request->all());

        return back()->with('message', 'Invoice Line created.');
    }

    public function delete(int $id): View
    {
        InvoiceLine::destroy($id);

        $viewData = [];
        $viewData['title'] = 'Invoice lines';
        $viewData['subtitle'] = 'All invoice lines';
        $viewData['invoiceLine'] = InvoiceLine::all();

        return view('invoiceLine.index')->with('viewData', $viewData);
    }
}
