<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class AlliedStoreProductController extends Controller
{
    public function index(): view
    {
        $viewData = [];

        $alliedStoreProductsResponse = Http::get('http://astro-tech-store.duckdns.org/api/products');
        $viewData['alliedStoreProducts'] = $alliedStoreProductsResponse->json();

        return view('alliedStoreProduct.index')->with('viewData', $viewData);
    }

}