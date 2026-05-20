@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="row g-4">
        
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">{{ __('user.userDetails') }}</h2>
                    <a href="{{ route('user.edit', $viewData['user']->getId()) }}" class="btn btn-warning">
                        {{ __('button.editButton') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userName') }}:</strong>
                            <div>{{ $viewData['user']->getName() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userEmail') }}:</strong>
                            <div>{{ $viewData['user']->getEmail() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userNationalId') }}:</strong>
                            <div>{{ $viewData['user']->getNationalId() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userFirstName') }}:</strong>
                            <div>{{ $viewData['user']->getFirstName() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userLastName') }}:</strong>
                            <div>{{ $viewData['user']->getLastName() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userRole') }}:</strong>
                            <div>{{ $viewData['user']->getRole() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userPhoneNumber') }}:</strong>
                            <div>{{ $viewData['user']->getPhoneNumber() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userBirthday') }}:</strong>
                            <div>{{ $viewData['user']->getBirthday() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('user.userAddress') }}:</strong>
                            <div>{{ $viewData['user']->getAddress() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ route('invoice.index') }}" class="btn btn-warning">
                {{ __('user.seePurchaseHistory') }}
            </a>
        </div>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">{{ __('button.logoutButton') }}</button>
        </form>

        

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">{{ __('savingsAccount.savingsAccountList') }}</h2>
                    <a href="{{ route('savingsAccount.create') }}" class="btn btn-warning">
                        {{ __('savingsAccount.createSavingsAccount') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('savingsAccount.name') }}</th>
                                    <th>{{ __('savingsAccount.savingsAccountType') }}</th>
                                    <th>{{ __('common.actionsLabel') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($viewData['savingsAccounts'] as $savingsAccount)
                                    <tr>
                                        <td>{{ $savingsAccount->getName() }}</td>
                                        <td>{{ $savingsAccount->getType() }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2">
                                                <a href="{{ route('savingsAccount.show', ['id' => $savingsAccount->getId()]) }}" class="btn btn-info btn-sm">
                                                    {{ __('button.viewButton') }}
                                                </a>

                                                <a href="{{ route('savingsAccount.edit', ['id' => $savingsAccount->getId()]) }}" class="btn btn-warning btn-sm">
                                                    {{ __('button.editButton') }}
                                                </a>

                                                <form action="{{ route('savingsAccount.destroy', ['id' => $savingsAccount->getId()]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        {{ __('button.deleteButton') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">
                                            {{ __('savingsAccount.noSavingsAccountsFound') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('home.index') }}" class="btn btn-secondary">
                            {{ __('button.backButton') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection