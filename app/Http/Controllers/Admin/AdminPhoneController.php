<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Phone\StorePhoneRequest;
use App\Http\Requests\Phone\UpdatePhoneRequest;
use App\Interfaces\ImageStorage;
use App\Models\Office;
use App\Models\Phone;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminPhoneController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['phones'] = Phone::with(['office'])->get();

        return view('admin.phone.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['phone'] = Phone::with(['office'])->findOrFail($id);

        return view('admin.phone.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['offices'] = Office::all();

        return view('admin.phone.create')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['phone'] = Phone::findOrFail($id);
        $viewData['offices'] = Office::all();

        return view('admin.phone.edit')->with('viewData', $viewData);
    }

    public function save(StorePhoneRequest $request): RedirectResponse
    {
        $validatedPhoneData = $request->validated();
        $storeInterface = app(ImageStorage::class);

        if ($request->hasFile('image')) {
            $validatedPhoneData['image'] = $storeInterface->store($request);
        }

        Phone::create($validatedPhoneData);

        return redirect()->route('admin.phone.index');
    }

    public function update(UpdatePhoneRequest $request, int $id): RedirectResponse
    {
        $phone = Phone::findOrFail($id);
        $validatedPhoneData = $request->validated();
        $storeInterface = app(ImageStorage::class);

        if ($request->hasFile('image')) {
            $validatedPhoneData['image'] = $storeInterface->store($request);
        }

        $phone->update($validatedPhoneData);

        return redirect()->route('admin.phone.show', $phone->getId());
    }

    public function destroy(int $id): RedirectResponse
    {
        $phone = Phone::findOrFail($id);
        $phone->delete();

        return redirect()->route('admin.phone.index');
    }

    public function mostPurchased(): View
    {
        $viewData = [];
        $viewData['phones'] = Phone::withSum('invoiceLines', 'quantity')->orderBy('invoice_lines_sum_quantity', 'desc')->take(5)->get();

        return view('admin.phone.mostPurchased')->with('viewData', $viewData);
    }
}
