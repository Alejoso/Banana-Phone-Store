@extends('layouts.admin')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ __('messages.errorsTitle') }}</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2 class="mb-4 text-warning">{{ __('messages.editUser') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['user']->getId()]) }}">
            @csrf
            @method('PUT')

            <div class="row">

                <!-- Left -->
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userName') }}</label>
                        <input type="text" name="name"
                               value="{{ $viewData['user']->getName() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userEmail') }}</label>
                        <input type="email" name="email"
                               value="{{ $viewData['user']->getEmail() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.newPasswordTitle') }}</label>
                        <input type="password" name="password"
                               class="form-control bg-dark text-light border-secondary">
                        <small class="text-muted">{{ __('messages.keepCurrentPasswordHint') }}</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.confirmPasswordTitle') }}</label>
                        <input type="password" name="password_confirmation"
                            class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userNationalId') }}</label>
                        <input type="text" name="national_id"
                               value="{{ $viewData['user']->getNationalId() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                </div>

                <!-- Right -->
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userFirstName') }}</label>
                        <input type="text" name="first_name"
                               value="{{ $viewData['user']->getFirstName() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userLastName') }}</label>
                        <input type="text" name="last_name"
                               value="{{ $viewData['user']->getLastName() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userRole') }}</label>

                        <select name="role" class="form-select bg-dark text-light border-secondary">
                            <option value="Admin" {{ $viewData['user']->getRole() == 'Admin' ? 'selected' : '' }}>
                                {{ __('messages.adminRoleTitle') }}
                            </option>

                            <option value="Client" {{ $viewData['user']->getRole() == 'Client' ? 'selected' : '' }}>
                                {{ __('messages.clientRoleTitle') }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userPhoneNumber') }}</label>
                        <input type="text" name="phone_number"
                               value="{{ $viewData['user']->getPhoneNumber() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userBirthday') }}</label>
                        <input type="date" name="birthday"
                               value="{{ $viewData['user']->getBirthday() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary">{{ __('messages.userAddress') }}</label>
                        <input type="text" name="address"
                               value="{{ $viewData['user']->getAddress() }}"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                </div>

            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-warning">
                    {{ __('messages.saveButton') }}
                </button>

                <a href="{{ route('admin.user.index') }}" class="btn btn-outline-light">
                    {{ __('messages.backButton') }}
                </a>
            </div>

        </form>

    </div>
</div>

@endsection