<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Utils\FetchExchangeRates;
use Illuminate\View\View;

class CurrencyController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['phones'] = Phone::all();

        $fetcher = new FetchExchangeRates();
        $viewData['rates'] = $fetcher->fetchExchangeRates();

        return view('currency.index')->with('viewData', $viewData);
    }
}