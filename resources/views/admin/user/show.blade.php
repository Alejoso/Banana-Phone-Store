@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">{{ __('user.userDetails') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <p><span class="text-secondary">{{ __('common.idLabel') }}:</span> {{ $viewData['user']->getId() }}</p>

                <p><span class="text-secondary">{{ __('user.userName') }}:</span> {{ $viewData['user']->getName() }}</p>

                <p><span class="text-secondary">{{ __('user.userEmail') }}:</span> {{ $viewData['user']->getEmail() }}</p>

                <p><span class="text-secondary">{{ __('user.userNationalId') }}:</span> {{ $viewData['user']->getNationalId() }}</p>

                <p><span class="text-secondary">{{ __('user.userRole') }}:</span> {{ $viewData['user']->getRole() }}</p>

            </div>

            <div class="col-md-6">

                <p><span class="text-secondary">{{ __('user.userFirstName') }}:</span> {{ $viewData['user']->getFirstName() }}</p>

                <p><span class="text-secondary">{{ __('user.userLastName') }}:</span> {{ $viewData['user']->getLastName() }}</p>

                <p><span class="text-secondary">{{ __('user.userPhoneNumber') }}:</span> {{ $viewData['user']->getPhoneNumber() }}</p>

                <p><span class="text-secondary">{{ __('user.userBirthday') }}:</span> {{ $viewData['user']->getBirthday() }}</p>

                <p><span class="text-secondary">{{ __('user.userAddress') }}:</span> {{ $viewData['user']->getAddress() }}</p>

            </div>

        </div>

        <!-- Actions -->
        <div class="mt-4 d-flex gap-2">

            <a href="{{ route('admin.user.edit', $viewData['user']->getId()) }}" 
               class="btn btn-outline-warning">
                {{ __('button.editButton') }}
            </a>

            <form action="{{ route('admin.user.destroy', $viewData['user']->getId()) }}" 
                  method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">
                    {{ __('button.deleteButton') }}
                </button>
            </form>

            <a href="{{ route('admin.user.index') }}" 
               class="btn btn-outline-light">
                {{ __('button.backButton') }}
            </a>

        </div>

    </div>
</div>

@endsection