@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h2 class="mb-0">{{ __('auth.registerTitle') }}</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('user.userName') }}</label>
                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        required
                                        autocomplete="name"
                                        autofocus
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('user.emailTitle') }}</label>
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        required
                                        autocomplete="email"
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="national_id" class="form-label">{{ __('user.userNationalId') }}</label>
                                    <input
                                        id="national_id"
                                        type="text"
                                        name="national_id"
                                        value="{{ old('national_id') }}"
                                        class="form-control @error('national_id') is-invalid @enderror"
                                    >
                                    @error('national_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="first_name" class="form-label">{{ __('user.userFirstName') }}</label>
                                    <input
                                        id="first_name"
                                        type="text"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                    >
                                    @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="last_name" class="form-label">{{ __('user.userLastName') }}</label>
                                    <input
                                        id="last_name"
                                        type="text"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                    >
                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">{{ __('user.userPhoneNumber') }}</label>
                                    <input
                                        id="phone_number"
                                        type="text"
                                        name="phone_number"
                                        value="{{ old('phone_number') }}"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                    >
                                    @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="birthday" class="form-label">{{ __('user.userBirthday') }}</label>
                                    <input
                                        id="birthday"
                                        type="date"
                                        name="birthday"
                                        value="{{ old('birthday') }}"
                                        class="form-control @error('birthday') is-invalid @enderror"
                                    >
                                    @error('birthday')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('user.userAddress') }}</label>
                                    <input
                                        id="address"
                                        type="text"
                                        name="address"
                                        value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror"
                                    >
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('user.passwordTitle') }}</label>
                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required
                                        autocomplete="new-password"
                                    >
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">{{ __('user.confirmPasswordTitle') }}</label>
                                    <input
                                        id="password_confirmation"
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control"
                                        required
                                        autocomplete="new-password"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                                {{ __('button.backToLoginButton') }}
                            </a>

                            <button type="submit" class="btn btn-dark">
                                {{ __('auth.registerTitle') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection