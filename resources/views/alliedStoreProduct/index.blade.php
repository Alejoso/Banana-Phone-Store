@extends('layouts.app')
@section('content')
<div class="container py-4">

<div>
    <h1 class="text-center">
        <a href="{{ $viewData['alliedStoreProducts']['additional_info']['url'] }}">{{ __('alliedStore.alliedStoreName') }}</a>
    </h1>
</div>

    <div>
        <h4 class="text-center">{{ __('alliedStore.alliedProducts') }}</h4>
    </div>

    <div class="row g-4 mt-2">
        @foreach ($viewData['alliedStoreProducts']['data'] as $product)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="bg-light d-flex align-items-center justify-content-center p-4" style="height: 260px;">
                        <img 
                            src="{{ $product['image'] }}" 
                            alt="{{ $product['name'] }}"
                            class="img-fluid"
                            style="max-height: 220px; object-fit: contain;"
                        >
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-2">{{ $product['name'] }}</h5>

                        <p class="text-muted mb-1">
                            <span class="fw-semibold">{{ __('alliedStore.description') }}:</span> {{ Str::words($product['description'], 10) }}...
                        </p>

                        <p class="text-muted mb-3">
                            <span class="fw-semibold">{{ __('alliedStore.stockAmount') }}:</span> {{ $product['stock'] }}
                        </p>

                        <div class="mt-auto">
                            <h4 class="fw-bold text-dark mb-3">${{ number_format($product['price'] , 0 , "," , ".") }}</h4>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <a 
                                href="{{ $product['url'] }}"
                                class="btn btn-dark rounded-pill flex-grow-1"
                            >
                                {{ __('alliedStore.linkToProduct') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection