@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.createInvoiceLine') }}</h2>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="card bg-secondary text-light p-4" style="max-width: 600px;">
    <form method="POST" action="{{ route('admin.invoiceLine.save') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('messages.invoiceLabel') }}</label>
            <select name="invoice_id" class="form-select bg-dark text-light border-secondary">
                @foreach($viewData['invoices'] as $invoice)
                    <option value="{{ $invoice->getId() }}"
                        @if(old('invoice_id') == $invoice->getId()) selected @endif>
                        Invoice #{{ $invoice->getId() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.phoneLabel') }}</label>
            <select name="phone_id" class="form-select bg-dark text-light border-secondary">
                @foreach($viewData['phones'] as $phone)
                    <option value="{{ $phone->getId() }}"
                        @if(old('phone_id') == $phone->getId()) selected @endif>
                        {{ $phone->getName() }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.quantityTitle') }}</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.unitPriceTitle') }}</label>
            <input type="number" name="unit_price" value="{{ old('unit_price') }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.discountTitle') }}</label>
            <input type="number" name="discount" step="0.01" value="{{ old('discount') }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.reasonTitle') }}</label>
            <input type="text" name="reason" value="{{ old('reason') }}" class="form-control bg-dark text-light border-secondary">
        </div>

        <button type="submit" class="btn btn-warning">
            {{ __('messages.saveButton') }}
        </button>
    </form>
</div>

@endsection