@extends('layouts.app')
@section('content')
<div class="container py-4">

    <div>
        <h1 class="text-center">Productos aliados!!! (Cambiar a lang !!!!!)</h1>
    </div>

    <div class="row g-4">
        @foreach ($viewData['alliedStoreProducts'] as $phone)
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="bg-light d-flex align-items-center justify-content-center p-4" style="height: 260px;">
                        <img 
                            src="{{ asset('storage/'.$phone['image']) }}" 
                            alt="{{ $phone['name'] }}"
                            class="img-fluid"
                            style="max-height: 220px; object-fit: contain;"
                        >
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-2">{{ $phone['name'] }}</h5>

                        <p class="text-muted mb-1">
                            <span class="fw-semibold">{{ __('phone.brandTitle') }}:</span> {{ $phone['brand'] }}
                        </p>

                        <p class="text-muted mb-3">
                            <span class="fw-semibold">{{ __('phone.memoryTitle') }}:</span> {{ $phone['memory'] }}
                        </p>

                        <div class="mt-auto">
                            <h4 class="fw-bold text-dark mb-3">${{ number_format($phone['price'] , 0 , "," , ".") }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection