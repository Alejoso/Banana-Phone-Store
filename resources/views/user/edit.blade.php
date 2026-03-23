@extends('layouts.app')
@section('content')

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>{{ __('messages.editUser') }}</h1>
    <form method="POST" action="{{ route('user.update' , ['id' => $viewData['user']->getId()]) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">{{ __('messages.userName') }}</label>
            <input type="text" name="name" value="{{ $viewData['user']->getName() }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">{{ __('messages.userEmail') }}</label>
            <input type="email" name="email" value="{{ $viewData['user']->getEmail() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.userNationalId') }}</label>
            <input type="text" name="national_id" value="{{ $viewData['user']->getNationalId() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.userFirstName') }}</label>
            <input type="text" name="first_name" value="{{ $viewData['user']->getFirstName() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.userLastName') }}</label>
            <input type="text" name="last_name" value="{{ $viewData['user']->getLastName()}}" class="form-control">
        </div>

        <input type="hidden" name="role" value="{{ $viewData['user']->getRole() }}">

        <div class="mb-3">
            <label class="form-label">{{ __('messages.userPhoneNumber') }}</label>
            <input type="text" name="phone_number" value="{{ $viewData['user']->getPhoneNumber() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.userBirthday') }}</label>
            <input type="date" name="birthday" value="{{ $viewData['user']->getBirthday() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.userAddress') }}</label>
            <input type="text" name="address" value="{{ $viewData['user']->getAddress() }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('messages.saveButton') }}
        </button>
    </form>
</div>

@endsection