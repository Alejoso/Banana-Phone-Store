<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavingsAccount\StoreSavingsAccountRequest;
use App\Http\Requests\SavingsAccount\UpdateSavingsAccountRequest;
use App\Models\SavingsAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SavingsAccountController extends Controller
{
    public function show(int $id): View
    {
        $viewData = [];
        $viewData['savingsAccount'] = SavingsAccount::findOrFail($id);

        return view('savingsAccount.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['users'] = User::all();

        return view('savingsAccount.create')->with('viewData', $viewData);
    }

    public function save(StoreSavingsAccountRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        SavingsAccount::create($validatedData);
        session()->flash('success', __('messages.savingsAccountCreatedSuccessfully'));

        return redirect()->route('user.show', ['id' => auth()->user()->getId()]);
    }

    public function destroy(int $id): RedirectResponse
    {
        SavingsAccount::destroy($id);
        session()->flash('success', __('messages.savingsAccountDeletedSuccessfully'));

        return redirect()->route('user.show', ['id' => auth()->user()->getId()]);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['savingsAccount'] = SavingsAccount::findOrFail($id);

        $users = User::all();
        $viewData['users'] = $users;

        return view('savingsAccount.edit')->with('viewData', $viewData);
    }

    public function update(UpdateSavingsAccountRequest $request, int $id): RedirectResponse
    {
        $savingsAccount = SavingsAccount::findOrFail($id);
        $savingsAccount->update($request->validated());

        return redirect()->route('user.show', ['id' => auth()->user()->getId()]);
    }
}
