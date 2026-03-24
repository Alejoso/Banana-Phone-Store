@extends('layouts.admin')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ __('user.errorsTitle') }}</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2 class="mb-4 text-warning">{{ __('user.editUser') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['user']->getId()]) }}">
            @csrf
            @method('PUT')

            <div class="row">

                <!-- Left -->
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userName') }}</label>
                        <input type="text" name="name"
                               value="{{ $viewData['user']->getName() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userEmail') }}</label>
                        <input type="email" name="email"
                               value="{{ $viewData['user']->getEmail() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.newPasswordTitle') }}</label>
                        <input type="password" name="password"
                               class="form-control bg-dark text-light border-secondary">
                        <small class="text-muted">{{ __('user.keepCurrentPasswordHint') }}</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.confirmPasswordTitle') }}</label>
                        <input type="password" name="password_confirmation"
                            class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userNationalId') }}</label>
                        <input type="text" name="national_id"
                               value="{{ $viewData['user']->getNationalId() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                </div>

                <!-- Right -->
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userFirstName') }}</label>
                        <input type="text" name="first_name"
                               value="{{ $viewData['user']->getFirstName() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userLastName') }}</label>
                        <input type="text" name="last_name"
                               value="{{ $viewData['user']->getLastName() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userRole') }}</label>

                        <select name="role" class="form-select bg-dark text-light border-secondary">
                            <option value="Admin" {{ $viewData['user']->getRole() == 'Admin' ? 'selected' : '' }}>
                                {{ __('user.adminRoleTitle') }}
                            </option>

                            <option value="Client" {{ $viewData['user']->getRole() == 'Client' ? 'selected' : '' }}>
                                {{ __('user.clientRoleTitle') }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userPhoneNumber') }}</label>
                        <input type="text" name="phone_number"
                               value="{{ $viewData['user']->getPhoneNumber() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userBirthday') }}</label>
                        <input type="date" name="birthday"
                               value="{{ $viewData['user']->getBirthday() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('user.userAddress') }}</label>
                        <input type="text" name="address"
                               value="{{ $viewData['user']->getAddress() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                </div>

            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-warning">
                    {{ __('button.saveButton') }}
                </button>

                <a href="{{ route('admin.user.index') }}" class="btn btn-outline-light">
                    {{ __('button.backButton') }}
                </a>
            </div>

        </form>

    </div>
</div>

@endsection