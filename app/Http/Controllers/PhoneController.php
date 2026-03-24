<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\View\View;

class PhoneController extends Controller
{
    public function index(): View
    {
        $viewData = [];

        $viewData['phones'] = Phone::with(['office'])->get();

        return view('phone.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];

        $viewData['phone'] = Phone::with(['office'])->findOrFail($id);

        return view('phone.show')->with('viewData', $viewData);
    }

    public function search(): View
    {
        $viewData = [];

        $viewData['phones'] = Phone::with(['office'])->where('name', 'like', '%'.request('name').'%')->get();

        return view('phone.index')->with('viewData', $viewData);
    }
}
