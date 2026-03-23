@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="row g-4">
        
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">{{ __('messages.userDetails') }}</h2>
                    <a href="{{ route('user.edit', $viewData['user']->getId()) }}" class="btn btn-warning">
                        {{ __('messages.editButton') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userName') }}:</strong>
                            <div>{{ $viewData['user']->getName() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userEmail') }}:</strong>
                            <div>{{ $viewData['user']->getEmail() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userNationalId') }}:</strong>
                            <div>{{ $viewData['user']->getNationalId() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userFirstName') }}:</strong>
                            <div>{{ $viewData['user']->getFirstName() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userLastName') }}:</strong>
                            <div>{{ $viewData['user']->getLastName() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userRole') }}:</strong>
                            <div>{{ $viewData['user']->getRole() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userPhoneNumber') }}:</strong>
                            <div>{{ $viewData['user']->getPhoneNumber() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userBirthday') }}:</strong>
                            <div>{{ $viewData['user']->getBirthday() }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>{{ __('messages.userAddress') }}:</strong>
                            <div>{{ $viewData['user']->getAddress() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ route('invoice.index') }}" class="btn btn-warning">
                {{ __('messages.seePurchaseHistory') }}
            </a>
        </div>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>

        

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">{{ __('messages.savingsAccountList') }}</h2>
                    <a href="{{ route('savingsAccount.create') }}" class="btn btn-warning">
                        {{ __('messages.createSavingsAccount') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.idLabel') }}</th>
                                    <th>{{ __('messages.savingsAccountType') }}</th>
                                    <th>{{ __('messages.actionsLabel') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($viewData['savingsAccounts'] as $savingsAccount)
                                    <tr>
                                        <td>{{ $savingsAccount->getId() }}</td>
                                        <td>{{ $savingsAccount->getType() }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2">
                                                <a href="{{ route('savingsAccount.show', ['id' => $savingsAccount->getId()]) }}" class="btn btn-info btn-sm">
                                                    {{ __('messages.viewButton') }}
                                                </a>

                                                <a href="{{ route('savingsAccount.edit', ['id' => $savingsAccount->getId()]) }}" class="btn btn-warning btn-sm">
                                                    {{ __('messages.editButton') }}
                                                </a>

                                                <form action="{{ route('savingsAccount.destroy', ['id' => $savingsAccount->getId()]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        {{ __('messages.deleteButton') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">
                                            {{ __('messages.noSavingsAccountsFound') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('home.index') }}" class="btn btn-secondary">
                            {{ __('messages.backButton') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection