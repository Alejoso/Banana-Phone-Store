@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('adminNavigation.dashboard') }}</h2>

<div class="row g-4">

    <!-- Offices -->
    <div class="col-md-3">
        <div class="card bg-dark border-secondary text-light h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ __('adminNavigation.offices') }}</h5>

                <div class="mt-auto">
                    <a href="{{ route('admin.office.index') }}" class="btn btn-warning btn-sm w-100 mb-2">
                        {{ __('button.viewButton') }}
                    </a>
                    <a href="{{ route('admin.office.create') }}" class="btn btn-outline-warning btn-sm w-100">
                        {{ __('button.createButton') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Users -->
    <div class="col-md-3">
        <div class="card bg-dark border-secondary text-light h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ __('adminNavigation.users') }}</h5>

                <div class="mt-auto">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-sm w-100 mb-2">
                        {{ __('button.viewButton') }}
                    </a>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-outline-warning btn-sm w-100">
                        {{ __('button.createButton') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoices -->
    <div class="col-md-3">
        <div class="card bg-dark border-secondary text-light h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ __('adminNavigation.invoices') }}</h5>

                <div class="mt-auto">
                    <a href="{{ route('admin.invoice.index') }}" class="btn btn-warning btn-sm w-100 mb-2">
                        {{ __('button.viewButton') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Phones -->
    <div class="col-md-3">
        <div class="card bg-dark border-secondary text-light h-100">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ __('adminNavigation.phones') }}</h5>

                <div class="mt-auto">
                    <a href="{{ route('admin.phone.index') }}" class="btn btn-warning btn-sm w-100 mb-2">
                        {{ __('button.viewButton') }}
                    </a>
                    <a href="{{ route('admin.phone.create') }}" class="btn btn-outline-warning btn-sm w-100">
                        {{ __('button.createButton') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection