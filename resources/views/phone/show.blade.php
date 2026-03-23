@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="bg-light d-flex align-items-center justify-content-center h-100 p-4" style="min-height: 420px;">
                            <img 
                                src="{{ asset('storage/'.$viewData['phone']->getImage()) }}" 
                                alt="{{ $viewData['phone']->getName() }}"
                                class="img-fluid"
                                style="max-height: 360px; object-fit: contain;"
                            >
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column">
                            <div class="mb-4">
                                <h1 class="fw-bold mb-2">{{ $viewData['phone']->getName() }}</h1>
                                <p class="text-muted mb-1">
                                    <span class="fw-semibold">{{__('messages.brandTitle')}}:</span> {{ $viewData['phone']->getBrand() }}
                                </p>
                                <p class="text-muted mb-0">
                                    <span class="fw-semibold">{{__('messages.memoryTitle')}}:</span> {{ $viewData['phone']->getMemory() }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <h2 class="fw-bold text-dark">${{ $viewData['phone']->getPrice() }}</h2>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-12 col-sm-6">
                                    <div class="bg-light rounded-4 p-3 h-100">
                                        <p class="text-muted mb-1">{{ __('messages.batteryTitle') }}</p>
                                        <h6 class="fw-semibold mb-0">{{ $viewData['phone']->getBattery() }}</h6>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="bg-light rounded-4 p-3 h-100">
                                        <p class="text-muted mb-1">{{ __('messages.ramTitle') }}</p>
                                        <h6 class="fw-semibold mb-0">{{ $viewData['phone']->getRam() }}</h6>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="bg-light rounded-4 p-3 h-100">
                                        <p class="text-muted mb-1">{{ __('messages.stockTitle') }}</p>
                                        <h6 class="fw-semibold mb-0">{{ $viewData['phone']->getQuantity() }}
                                        @if ($viewData['phone']->getQuantity() > 1)
                                            {{ __('messages.unitTitle') }}s
                                        @else
                                            {{ __('messages.unitTitle') }}
                                        @endif
                                        </h6>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="bg-light rounded-4 p-3 h-100">
                                        <p class="text-muted mb-1">{{ __('messages.availableInTitle') }}</p>
                                        <h6 class="fw-semibold mb-0">
                                            <a href="{{ route('office.show' , $viewData['phone']->getOffice()->getId()) }}">{{ $viewData['phone']->getOffice()->getName() }}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto">
                                <a href="{{ route('phone.index') }}" class="btn btn-outline-dark rounded-pill px-4 me-2">
                                    {{ __('messages.backButton') }}
                                </a>
                                <a href="{{ route('cart.add', ['id' => $viewData['phone']->getId()]) }}" class="btn btn-dark rounded-pill px-4">
                                    {{ __('messages.addToCartButton') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection