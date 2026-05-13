@extends('layouts.app')
@section('content')
<div class="container py-5">

    <div class="mb-4 text-center">
        <p class="text-muted mb-2">{{ __('currency.subtitle') }}</p>
        <h1 class="fw-bold">{{ __('currency.pageTitle') }}</h1>
    </div>

    @if(session('error'))
        <div class="alert alert-danger rounded-4 text-center">
            {{ session('error') }}
        </div>
    @endif

    @if(!empty($viewData['rates']))
        <div class="row g-3 mb-5 justify-content-center">
            @foreach($viewData['rates'] as $currency => $rate)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card border-0 shadow-sm rounded-4 text-center p-3">
                        <p class="text-muted mb-1 small">{{ $currency }}</p>
                        <h5 class="fw-bold mb-0">{{ number_format($rate, 4) }}</h5>
                        <p class="text-muted mb-0" style="font-size: 0.75rem;">{{ __('currency.perCOP') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-4">
            @foreach($viewData['phones'] as $phone)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-1">{{ $phone->getName() }}</h5>
                            <p class="text-muted mb-3 small">{{ $phone->getBrand() }}</p>

                            <div class="bg-light rounded-4 p-3 mb-2 d-flex justify-content-between">
                                <span class="text-muted">COP</span>
                                <span class="fw-semibold">$ {{ number_format($phone->getPrice(), 0, ',', '.') }}</span>
                            </div>

                            @foreach($viewData['rates'] as $currency => $rate)
                                <div class="bg-light rounded-4 p-3 mb-2 d-flex justify-content-between">
                                    <span class="text-muted">{{ $currency }}</span>
                                    <span class="fw-semibold">
                                        {{ number_format($phone->getPrice() * $rate, 2) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="text-muted text-center mt-5 mb-0" style="font-size: 0.8rem;">
            {{ __('currency.poweredBy') }}
            <a href="https://www.exchangerate-api.com" target="_blank" class="text-dark">ExchangeRate API</a>
        </p>
    @endif

</div>
@endsection