@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">{{ __('office.officeDetails') }}</h2>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <div class="mb-3">
            <h5 class="text-secondary">{{ __('common.nameLabel') }}</h5>
            <p class="fs-5">{{ $viewData['office']->getName() }}</p>
        </div>

        <div class="mb-3">
            <h5 class="text-secondary">{{ __('office.addressTitle') }}</h5>
            <p>{{ $viewData['office']->getAddress() }}</p>
        </div>

        <div class="mb-4">
            <h5 class="text-secondary">{{ __('office.managerTitle') }}</h5>
            <p>{{ $viewData['office']->getManagerName() }}</p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('admin.office.edit', $viewData['office']->getId()) }}" 
               class="btn btn-outline-warning">
                {{ __('button.editButton') }}
            </a>

            <form action="{{ route('admin.office.destroy', $viewData['office']->getId()) }}" 
                  method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    {{ __('button.deleteButton') }}
                </button>
            </form>

            <a href="{{ route('admin.office.index') }}" 
               class="btn btn-outline-light">
                {{ __('button.backButton') }}
            </a>

        </div>

    </div>
</div>

@endsection