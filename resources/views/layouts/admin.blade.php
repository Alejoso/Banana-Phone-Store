<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('layout.adminPanelTitle') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="d-flex">

    <div class="bg-black border-end border-secondary vh-100 position-fixed p-3" style="width: 240px;">
        
        <h4 class="text-warning fw-bold mb-4">{{ __('layout.bananaAdminTitle') }}</h4>

        <ul class="nav flex-column gap-2">

            <li>
                <a href="{{ route('admin.home.index') }}" class="nav-link text-secondary">
                    {{ __('layout.dashboardTitle') }}
                </a>
            </li>

            <li>
                <a href="{{ route('admin.phone.index') }}" class="nav-link text-secondary">
                    {{ __('layout.phonesTitle') }}
                </a>
            </li>

            <li>
                <a href="{{ route('admin.office.index') }}" class="nav-link text-secondary">
                    {{ __('layout.officesTitle') }}
                </a>
            </li>

            <li>
                <a href="{{ route('admin.user.index') }}" class="nav-link text-secondary">
                    {{ __('layout.usersTitle') }}
                </a>
            </li>

            <li>
                <a href="{{ route('admin.invoice.index') }}" class="nav-link text-secondary">
                    {{ __('invoice.invoicesTitle') }}
                </a>
            </li>

            <li>
                <a href="{{ route('admin.office.topOffices') }}" class="nav-link text-secondary">
                    {{ __('office.topOffices') }}
                </a>
            </li>

            <li>
                <a href="{{ route('admin.phone.mostPurchased') }}" class="nav-link text-secondary">
                    {{ __('phone.mostPurchasedPhones') }}
                </a>
            </li>

        </ul>
    </div>

    <div class="w-100" style="margin-left: 240px;">

        <div class="bg-dark border-bottom border-secondary px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-warning">{{ __('layout.adminPanelTitle') }}</h5>

            <span class="text-secondary">
                {{ auth()->user()->name ?? __('layout.adminTitle') }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">{{ __('button.logoutButton') }}</button>
            </form>
            
        </div>

        <div class="container-fluid p-4">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>