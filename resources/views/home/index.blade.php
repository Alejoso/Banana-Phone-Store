@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="row align-items-center gy-4">
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/logo-banana-phone.jpg') }}"
                 alt="{{ __('messages.homeLogoAlt') }}"
                 class="img-fluid rounded shadow"
                 style="max-height: 350px;">
        </div>

        <div class="col-md-6">
            <h1 class="display-4 fw-bold">{{ __('messages.homeTitle') }}</h1>
            <p class="lead text-secondary">
                {{ __('messages.homeSubtitle') }}
            </p>

            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('phone.index') }}" class="btn btn-dark">
                    {{ __('messages.viewCatalogButton') }}
                </a>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">{{ __('messages.whyChooseUsTitle') }}</h2>
        <p class="text-secondary">{{ __('messages.whyChooseUsSubtitle') }}</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('messages.premiumDevicesTitle') }}</h5>
                    <p class="card-text">
                        {{ __('messages.premiumDevicesDescription') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('messages.securePurchaseTitle') }}</h5>
                    <p class="card-text">
                        {{ __('messages.securePurchaseDescription') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('messages.qualityServiceTitle') }}</h5>
                    <p class="card-text">
                        {{ __('messages.qualityServiceDescription') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h2 class="fw-bold">{{ __('messages.featuredProductsTitle') }}</h2>
        <p class="text-secondary mb-4">{{ __('messages.featuredProductsSubtitle') }}</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('messages.featuredIphoneTitle') }}</h5>
                        <p class="card-text">{{ __('messages.featuredIphoneDescription') }}</p>
                        <a href="{{ route('phone.index') }}" class="btn btn-dark">{{ __('messages.viewMoreButton') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('messages.featuredSamsungTitle') }}</h5>
                        <p class="card-text">{{ __('messages.featuredSamsungDescription') }}</p>
                        <a href="{{ route('phone.index') }}" class="btn btn-dark">{{ __('messages.viewMoreButton') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('messages.featuredAccessoriesTitle') }}</h5>
                        <p class="card-text">{{ __('messages.featuredAccessoriesDescription') }}</p>
                        <a href="{{ route('phone.index') }}" class="btn btn-dark">{{ __('messages.viewMoreButton') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection