@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.editInvoiceLine') }}</h2>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif

<div class="card bg-secondary text-light p-4" style="max-width: 600px;">
    <form action="{{ route('admin.invoiceLine.update', $viewData['invoiceLine']->getId()) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">{{ __('messages.phoneLabel') }}</label>
            <select name="phone_id" class="form-select bg-dark text-light border-secondary">
                @foreach($viewData['phones'] as $phone)
                    <option value="{{ $phone->getId() }}"
                        @if($phone->getId() == $viewData['invoiceLine']->getPhoneId()) selected @endif>
                        {{ $phone->getName() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.quantityTitle') }}</label>
            <input type="number" name="quantity" value="{{ $viewData['invoiceLine']->getQuantity() }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.unitPriceTitle') }}</label>
            <input type="number" name="unit_price" value="{{ $viewData['invoiceLine']->getUnitPrice() }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.discountTitle') }}</label>
            <input type="number" name="discount" step="0.01" min="0" max="1" value="{{ $viewData['invoiceLine']->getDiscount() }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.reasonTitle') }}</label>
            <input type="text" name="reason" value="{{ $viewData['invoiceLine']->getReason() }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <button type="submit" class="btn btn-warning me-2">
            {{ __('messages.editButton') }}
        </button>
        <a href="{{ route('admin.invoiceLine.show', $viewData['invoiceLine']->getId()) }}" class="btn btn-outline-light">
            {{ __('messages.backButton') }}
        </a>
    </form>
</div>

@endsection