@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.editOffice') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <form action="{{ route('admin.office.update', $viewData['office']->getId()) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label text-secondary">{{ __('messages.nameLabel') }}</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control bg-dark text-light border-secondary"
                    value="{{ $viewData['office']->getName() }}"
                >
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label text-secondary">{{ __('messages.addressTitle') }}</label>
                <input 
                    type="text" 
                    name="address" 
                    class="form-control bg-dark text-light border-secondary"
                    value="{{ $viewData['office']->getAddress() }}"
                >
            </div>

            <!-- Manager -->
            <div class="mb-3">
                <label class="form-label text-secondary">{{ __('messages.managerNameTitle') }}</label>
                <input 
                    type="text" 
                    name="manager_name" 
                    class="form-control bg-dark text-light border-secondary"
                    value="{{ $viewData['office']->getManagerName() }}"
                >
            </div>

            <!-- Actions -->
            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-warning">
                    {{ __('messages.updateButton') }}
                </button>

                <a href="{{ route('admin.office.index') }}" class="btn btn-outline-light">
                    {{ __('messages.cancelButton') }}
                </a>

            </div>

        </form>

    </div>
</div>

@endsection