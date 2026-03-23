@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.userDetails') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <p><span class="text-secondary">{{ __('messages.idLabel') }}:</span> {{ $viewData['user']->getId() }}</p>

                <p><span class="text-secondary">{{ __('messages.userName') }}:</span> {{ $viewData['user']->getName() }}</p>

                <p><span class="text-secondary">{{ __('messages.userEmail') }}:</span> {{ $viewData['user']->getEmail() }}</p>

                <p><span class="text-secondary">{{ __('messages.userNationalId') }}:</span> {{ $viewData['user']->getNationalId() }}</p>

                <p><span class="text-secondary">{{ __('messages.userRole') }}:</span> {{ $viewData['user']->getRole() }}</p>

            </div>

            <div class="col-md-6">

                <p><span class="text-secondary">{{ __('messages.userFirstName') }}:</span> {{ $viewData['user']->getFirstName() }}</p>

                <p><span class="text-secondary">{{ __('messages.userLastName') }}:</span> {{ $viewData['user']->getLastName() }}</p>

                <p><span class="text-secondary">{{ __('messages.userPhoneNumber') }}:</span> {{ $viewData['user']->getPhoneNumber() }}</p>

                <p><span class="text-secondary">{{ __('messages.userBirthday') }}:</span> {{ $viewData['user']->getBirthday() }}</p>

                <p><span class="text-secondary">{{ __('messages.userAddress') }}:</span> {{ $viewData['user']->getAddress() }}</p>

            </div>

        </div>

        <!-- Actions -->
        <div class="mt-4 d-flex gap-2">

            <a href="{{ route('admin.user.edit', $viewData['user']->getId()) }}" 
               class="btn btn-outline-warning">
                {{ __('messages.editButton') }}
            </a>

            <form action="{{ route('admin.user.destroy', $viewData['user']->getId()) }}" 
                  method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">
                    {{ __('messages.deleteButton') }}
                </button>
            </form>

            <a href="{{ route('admin.user.index') }}" 
               class="btn btn-outline-light">
                {{ __('messages.backButton') }}
            </a>

        </div>

    </div>
</div>

@endsection