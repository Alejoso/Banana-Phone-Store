<?php

namespace App\Http\Controllers;

use App\Utils\ConstructCartProductData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cartUtil = new ConstructCartProductData;
        $viewData = $cartUtil->constructCartProductData($request);

        return view('cart.index')->with('viewData', $viewData);
    }

    public function show(Request $request): View
    {
        $cartUtil = new ConstructCartProductData;
        $viewData = $cartUtil->constructCartProductData($request);

        return view('cart.show')->with('viewData', $viewData);
    }

    public function add(int $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data', []);

        if (! isset($cartProductData[$id])) { // If the product has not been added
            $cartProductData[$id] = 1;
        }

        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data', []);
        $quantity = $request->input('quantity');

        $cartProductData[$id] = $quantity;
        $request->session()->put('cart_product_data', $cartProductData);

        return redirect()->route('cart.index');
    }

    public function remove(int $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data', []);
        unset($cartProductData[$id]);

        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return back();
    }
}
