@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">{{ __('user.createUser') }}</h2>

<!-- Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.user.save') }}">
            @csrf

            <div class="row">

                <!-- Left -->
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userName') }}</label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userEmail') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userPassword') }}</label>
                        <input type="password" name="password" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.confirmPasswordTitle') }}</label>
                        <input type="password" name="password_confirmation" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userNationalId') }}</label>
                        <input type="text" name="national_id" value="{{ old('national_id') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                </div>

                <!-- Right -->
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userFirstName') }}</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userLastName') }}</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userRole') }}</label>

                        <select name="role" class="form-select bg-dark text-light border-secondary">

                            <option value="">{{ __('user.selectRoleTitle') }}</option>

                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>
                                {{ __('user.adminRoleTitle') }}
                            </option>

                            <option value="client" {{ old('role') == 'Client' ? 'selected' : '' }}>
                                {{ __('user.clientRoleTitle') }}
                            </option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userPhoneNumber') }}</label>
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userBirthday') }}</label>
                        <input type="date" name="birthday" value="{{ old('birthday') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userAddress') }}</label>
                        <input type="text" name="address" value="{{ old('address') }}" 
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                </div>

            </div>

            <!-- Actions -->
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-warning">
                    {{ __('button.saveButton') }}
                </button>

                <a href="{{ route('admin.user.index') }}" class="btn btn-outline-light">
                    {{ __('button.cancelButton') }}
                </a>
            </div>

        </form>

    </div>
</div>

@endsection