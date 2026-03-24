@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="mb-4 text-center">
        <p class="text-muted mb-2">{{ __('office.ourOfficesTitle') }}</p>
        <h1 class="fw-bold">{{ __('office.findOurStoresTitle') }}</h1>
    </div>

    <div class="row g-4">
        @foreach($viewData['offices'] as $office)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-3">
                            <h4 class="fw-bold mb-2">{{ $office->getName() }}</h4>
                            <p class="text-muted mb-0">{{ $office->getAddress() }}</p>
                        </div>

                        <div class="mt-auto">
                            <a 
                                href="{{ route('office.show', ['id' => $office->getId()]) }}"
                                class="btn btn-dark rounded-pill w-100"
                            >
                                {{ __('office.viewOfficeButton') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection