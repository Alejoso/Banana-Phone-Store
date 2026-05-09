@extends('layouts.app')
@section('content')
<div class="container py-4">

    <form method="GET" action="{{ route('phone.search') }}" class="mb-4 d-flex gap-2">
        <input type="text" name="name" value="{{ request('name') }}" placeholder="{{ __('phone.searchPhonePlaceholder') }}" class="form-control">
        <button type="submit" class="btn btn-dark">
            {{ __('button.searchButton') }}
        </button>
    </form>

    @if (request('name') && $viewData['phones']->isEmpty())
        <div class="alert alert-warning">
            {{ __('phone.phoneNotFound') }}
        </div>
    @endif

    <div class="row g-4">
        @foreach ($viewData['phones'] as $phone)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="bg-light d-flex align-items-center justify-content-center p-4" style="height: 260px;">
                        <img 
                            src="{{ asset('storage/'.$phone->getImage()) }}" 
                            alt="{{ $phone->getName() }}"
                            class="img-fluid"
                            style="max-height: 220px; object-fit: contain;"
                        >
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-2">{{ $phone->getName() }}</h5>

                        <p class="text-muted mb-1">
                            <span class="fw-semibold">{{ __('phone.brandTitle') }}:</span> {{ $phone->getBrand() }}
                        </p>

                        <p class="text-muted mb-3">
                            <span class="fw-semibold">{{ __('phone.memoryTitle') }}:</span> {{ $phone->getMemory() }}
                        </p>

                        <div class="mt-auto">
                            <h4 class="fw-bold text-dark mb-3">${{ number_format($phone->getPrice() , 0 , "," , ".") }}</h4>

                            <div class="d-flex align-items-center gap-2">
                                <a 
                                    href="{{ route('phone.show', ['id' => $phone->getId()]) }}"
                                    class="btn btn-dark rounded-pill flex-grow-1"
                                >
                                    {{ __('phone.detailsTitle') }}
                                </a>

                                <a 
                                    href="{{ route('cart.add', ['id' => $phone->getId()]) }}"
                                    class="btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 42px; height: 42px;"
                                    title="{{ __('cart.addToCartButton') }}"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .49.402L2.89 3H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.49-.402L1.61 2H.5A.5.5 0 0 1 0 1.5M3.102 4l1.313 6h8.18l1.286-6zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection