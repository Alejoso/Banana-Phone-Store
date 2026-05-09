<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class AlliedStoreProductController extends Controller
{
    public function index(): view
    {
        $viewData = [];

        $alliedStoreProductsResponse = Http::get('http://127.0.0.1:8001/api/mostPurchasedPhones');
        $viewData['alliedStoreProducts'] = $alliedStoreProductsResponse->json();

        return view('alliedStoreProduct.index')->with('viewData', $viewData);
    }

}