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

    <h1>{{ __('user.editUser') }}</h1>
    <form method="POST" action="{{ route('user.update' , ['id' => $viewData['user']->getId()]) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">{{ __('user.userName') }}</label>
            <input type="text" name="name" value="{{ $viewData['user']->getName() }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">{{ __('user.userEmail') }}</label>
            <input type="email" name="email" value="{{ $viewData['user']->getEmail() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('user.userNationalId') }}</label>
            <input type="text" name="national_id" value="{{ $viewData['user']->getNationalId() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('user.userFirstName') }}</label>
            <input type="text" name="first_name" value="{{ $viewData['user']->getFirstName() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('user.userLastName') }}</label>
            <input type="text" name="last_name" value="{{ $viewData['user']->getLastName()}}" class="form-control">
        </div>

        <input type="hidden" name="role" value="{{ $viewData['user']->getRole() }}">

        <div class="mb-3">
            <label class="form-label">{{ __('user.userPhoneNumber') }}</label>
            <input type="text" name="phone_number" value="{{ $viewData['user']->getPhoneNumber() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('user.userBirthday') }}</label>
            <input type="date" name="birthday" value="{{ $viewData['user']->getBirthday() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('user.userAddress') }}</label>
            <input type="text" name="address" value="{{ $viewData['user']->getAddress() }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('button.saveButton') }}
        </button>
    </form>
</div>

@endsection