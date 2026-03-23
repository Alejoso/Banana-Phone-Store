@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">{{ __('messages.invoicePreviewTitle') }}</h2>

    @if($viewData['cartProducts']->isEmpty())
        <div class="alert alert-info">
            {{ __('messages.cartIsEmptyTitle') }}
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
                                        {{ __('messages.brandTitle') }}: {{ $phone->getBrand() }}
                                    </p>
                                    <p class="mb-1 text-muted">
                                        {{ __('messages.priceTitle') }}: ${{ $phone->getPrice() }}
                                    </p>
                                    <p class="mb-1 text-muted">
                                        {{ __('messages.quantityTitle') }}:
                                        {{ $viewData['cartProductData'][$phone->getId()] ?? 0 }}
                                    </p>
                                    <p class="mb-0 fw-bold">
                                        {{ __('messages.subtotalTitle') }}:
                                        ${{ $phone->getPrice() * ($viewData['cartProductData'][$phone->getId()] ?? 0) }}
                                    </p>
                                </div>

                                <div class="text-end">
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill">
                                        {{ __('messages.readOnlyPreviewTitle') }}
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
                                {{ __('messages.selectPaymentAccountTitle') }}
                            </label>
                            <select name="savingsAccount" class="form-select" required>
                                <option value="">{{ __('messages.selectAnOptionTitle') }}</option>
                                @foreach ($viewData['savingsAccounts'] as $savingsAccount)
                                    <option value="{{ $savingsAccount->getId() }}">
                                        {{ $savingsAccount->getType() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 text-md-end">
                            <h4 class="mb-0">
                                {{ __('messages.totalTitle') }}: ${{ $viewData['total'] }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">
                    {{ __('messages.backButton') }}
                </a>

                <button type="submit" class="btn btn-success">
                    {{ __('messages.confirmPurchaseButton') }}
                </button>
            </div>
        </form>
    @endif
</div>
@endsection