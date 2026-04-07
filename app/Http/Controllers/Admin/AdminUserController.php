<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['users'] = User::with(['invoices', 'savingsAccounts'])->get();

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['user'] = User::with(['invoices', 'savingsAccounts'])->findOrFail($id);

        return view('admin.user.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.user.create');
    }

    public function save(StoreUserRequest $request): RedirectResponse
    {
        $validatedUserData = $request->validated();
        $validatedUserData['password'] = Hash::make($validatedUserData['password']);
        User::create($validatedUserData);
        session()->flash('success', __('messages.userCreatedSuccessfully'));

        return redirect()->route('admin.user.index');
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['user'] = User::findOrFail($id);

        return view('admin.user.edit')->with('viewData', $viewData);
    }

    public function update(UpdateUserRequest $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $validatedUserData = $request->validated();

        if (! empty($validatedUserData['password'])) {
            $validatedUserData['password'] = Hash::make($validatedUserData['password']);
        } else {
            unset($validatedUserData['password']);
        }

        $user->update($validatedUserData);
        session()->flash('success', __('messages.userUpdatedSuccessfully'));

        return redirect()->route('admin.user.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', __('messages.userDeletedSuccessfully'));

        return redirect()->route('admin.user.index');
    }
}
