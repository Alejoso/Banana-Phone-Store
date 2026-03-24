@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4 p-lg-5">
                    <div class="mb-4">
                        <p class="text-muted mb-2">{{ __('office.officeNameTitle') }}</p>
                        <h1 class="fw-bold mb-0">{{ $viewData['office']->getName() }}</h1>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <div class="bg-light rounded-4 p-3">
                                <p class="text-muted mb-1">{{ __('office.addressTitle') }}</p>
                                <h6 class="fw-semibold mb-0">{{ $viewData['office']->getAddress() }}</h6>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="bg-light rounded-4 p-3">
                                <p class="text-muted mb-1">{{ __('office.managerNameTitle') }}</p>
                                <h6 class="fw-semibold mb-0">{{ $viewData['office']->getManagerName() }}</h6>
                            </div>
                        </div>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark rounded-pill px-4">
                        {{ __('button.backButton') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection