@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">{{ __('cart.invoicePreviewTitle') }}</h2>

    @if($viewData['cartProducts']->isEmpty())
        <div class="alert alert-info">
            {{ __('cart.cartIsEmptyTitle') }}
        </div>
    @else
        <form action="{{ route('purchase.purchase') }}" method="POST">
            @csrf

            <div class="row g-4">
                @foreach ($viewData['cartProducts'] as $phone)
                    <div class="col-12">
                        <div class="card shadow-sm rounded-4 border-0">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">
                                <div>
                                    <h5 class="mb-1">{{ $phone->getName() }}</h5>
                                    <p class="mb-1 text-muted">
                                        {{ __('phone.brandTitle') }}: {{ $phone->getBrand() }}
                                    </p>
                                    <p class="mb-1 text-muted">
                                        {{ __('phone.priceTitle') }}: ${{ number_format($phone->getPrice() , 0 , "," , ".") }}
                                    </p>
                                    <p class="mb-1 text-muted">
                                        {{ __('cart.quantityTitle') }}:
                                        {{ $viewData['cartProductData'][$phone->getId()] ?? 0 }}
                                    </p>
                                    <p class="mb-0 fw-bold">
                                        {{ __('cart.subtotalTitle') }}:
                                        ${{ number_format($phone->getPrice() * $viewData['cartProductData'][$phone->getId()] , 0 , "," , ".") ?? 0 }}
                                    </p>
                                </div>

                                <div class="text-end">
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill">
                                        {{ __('cart.readOnlyPreviewTitle') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card shadow-sm rounded-4 border-0 mt-4">
                <div class="card-body">
                    <div class="row g-3 align-items-end">
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-semibold">
                                {{ __('cart.selectPaymentAccountTitle') }}
                            </label>
                            <select name="savingsAccount" class="form-select" required>
                                <option value="">{{ __('common.selectAnOptionTitle') }}</option>
                                @foreach ($viewData['savingsAccounts'] as $savingsAccount)
                                    <option value="{{ $savingsAccount->getId() }}">
                                        {{ $savingsAccount->getName() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 text-md-end">
                            <h4 class="mb-0">
                                {{ __('cart.totalTitle') }}: ${{ number_format($viewData['total'] , 0 , "," , ".")  }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">
                    {{ __('button.backButton') }}
                </a>

                <button type="submit" class="btn btn-success">
                    {{ __('button.confirmPurchaseButton') }}
                </button>
            </div>
        </form>
    @endif
</div>
@endsection