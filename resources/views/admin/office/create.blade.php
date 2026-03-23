@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.createOffice') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.office.save') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label text-secondary">{{ __('messages.nameLabel') }}</label>
                <input 
                    type="text" 
                    class="form-control bg-dark text-light border-secondary" 
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="{{ __('messages.enterNamePlaceholder') }}"
                >
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label text-secondary">{{ __('messages.addressTitle') }}</label>
                <input 
                    type="text" 
                    class="form-control bg-dark text-light border-secondary" 
                    name="address" 
                    value="{{ old('address') }}"
                    placeholder="{{ __('messages.enterAddressPlaceholder') }}"
                >
            </div>

            <!-- Manager -->
            <div class="mb-3">
                <label class="form-label text-secondary">{{ __('messages.managerNameTitle') }}</label>
                <input 
                    type="text" 
                    class="form-control bg-dark text-light border-secondary" 
                    name="manager_name" 
                    value="{{ old('manager_name') }}"
                    placeholder="{{ __('messages.enterManagerNamePlaceholder') }}"
                >
            </div>

            <!-- Actions -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">
                    {{ __('messages.saveButton') }}
                </button>

                <a href="{{ route('admin.office.index') }}" class="btn btn-outline-light">
                    {{ __('messages.cancelButton') }}
                </a>
            </div>

        </form>

    </div>
</div>

@endsection