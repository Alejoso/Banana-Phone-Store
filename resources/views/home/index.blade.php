@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="row align-items-center gy-4">
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/logo-banana-phone.jpg') }}"
                 alt="{{ __('home.homeLogoAlt') }}"
                 class="img-fluid rounded shadow"
                 style="max-height: 350px;">
        </div>

        <div class="col-md-6">
            <h1 class="display-4 fw-bold">{{ __('home.homeTitle') }}</h1>
            <p class="lead text-secondary">
                {{ __('home.homeSubtitle') }}
            </p>

            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('phone.index') }}" class="btn btn-dark">
                    {{ __('home.viewCatalogButton') }}
                </a>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">{{ __('home.whyChooseUsTitle') }}</h2>
        <p class="text-secondary">{{ __('home.whyChooseUsSubtitle') }}</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('home.premiumDevicesTitle') }}</h5>
                    <p class="card-text">
                        {{ __('home.premiumDevicesDescription') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('home.securePurchaseTitle') }}</h5>
                    <p class="card-text">
                        {{ __('home.securePurchaseDescription') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ __('home.qualityServiceTitle') }}</h5>
                    <p class="card-text">
                        {{ __('home.qualityServiceDescription') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h2 class="fw-bold">{{ __('home.featuredProductsTitle') }}</h2>
        <p class="text-secondary mb-4">{{ __('home.featuredProductsSubtitle') }}</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('home.featuredIphoneTitle') }}</h5>
                        <p class="card-text">{{ __('home.featuredIphoneDescription') }}</p>
                        <a href="{{ route('phone.index') }}" class="btn btn-dark">{{ __('home.viewMoreButton') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('home.featuredSamsungTitle') }}</h5>
                        <p class="card-text">{{ __('home.featuredSamsungDescription') }}</p>
                        <a href="{{ route('phone.index') }}" class="btn btn-dark">{{ __('home.viewMoreButton') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('home.featuredAccessoriesTitle') }}</h5>
                        <p class="card-text">{{ __('home.featuredAccessoriesDescription') }}</p>
                        <a href="{{ route('phone.index') }}" class="btn btn-dark">{{ __('home.viewMoreButton') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection