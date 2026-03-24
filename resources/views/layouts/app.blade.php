<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', __('layout.appTitle'))</title>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">
            {{ __('layout.appTitle') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="{{ __('layout.toggleNavigationTitle') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <a class="nav-link active" href="{{ route('home.index') }}">{{ __('layout.homeNavTitle') }}</a>
                <a class="nav-link active" href="{{ route('office.index') }}">{{ __('layout.viewOfficesButton') }}</a>
                <a class="nav-link active" href="{{ route('phone.index') }}">{{ __('layout.viewPhonesButton') }}</a>
                
                @if (auth()->check())
                    <a href="{{ route('cart.index') }}"
                    class="btn btn-light rounded-pill ms-lg-3 position-relative d-inline-flex align-items-center justify-content-center"
                    style="width: 46px; height: 46px;"
                    title="{{ __('layout.cartTitle') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .49.402L2.89 3H14.5a.5.5 0 0 1 .49.598l-1.5 7A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.49-.402L1.61 2H.5A.5.5 0 0 1 0 1.5M3.102 4l1.313 6h8.18l1.286-6zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                    </a>

                    @if(!empty(session()->get('cart_product_data', [])))
                        <li class="text-white">{{ count(session()->get('cart_product_data')) }}</li>
                    @endif

                    <a class="nav-link active" href="{{ route('user.show' , auth()->user()->getId()) }}">{{ __('layout.manageAccountButton') }}</a>
                @endif

                @if (auth()->check() && auth()->user()->role === 'Admin')
                    <a class="nav-link active" href="{{ route('admin.home.index') }}">
                        {{ __('layout.adminPanelTitle') }}
                    </a>
                @endif

                

                @if (!auth()->check())
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('layout.loginButton') }}</a>
                @endif

                <form action="{{ route('language.switch') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        {{ app()->getLocale() === 'es' ? 'EN' : 'ES' }}
                    </button>
                </form>

            </div>
        </div>
    </div>
</nav>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

<div class="container my-4">
    @yield('content')
</div>

<div class="copyright py-4 text-center text-white">
    <div class="container">
        <small>
            {{ __('layout.copyrightTitle') }} -
            <a class="text-reset fw-bold text-decoration-none" target="_blank" href='#'>
                {{ __('layout.appDevsTitle') }}
            </a>
        </small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>

</body>
</html>