@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.invoiceLineDetails') }} #{{ $viewData['invoiceLine']->getId() }}</h2>

<div class="card bg-secondary text-light p-4 mb-4" style="max-width: 600px;">
    <p><strong>{{ __('messages.phoneLabel') }}:</strong> {{ $viewData['invoiceLine']->getPhone()->getName() }}</p>
    <p><strong>{{ __('messages.quantityTitle') }}:</strong> {{ $viewData['invoiceLine']->getQuantity() }}</p>
    <p><strong>{{ __('messages.unitPriceTitle') }}:</strong> {{ $viewData['invoiceLine']->getUnitPrice() }}</p>
    <p><strong>{{ __('messages.discountTitle') }}:</strong> {{ $viewData['invoiceLine']->getDiscount() }}</p>
    <p><strong>{{ __('messages.reasonTitle') }}:</strong> {{ $viewData['invoiceLine']->getReason() }}</p>
</div>

<a href="{{ route('admin.invoiceLine.edit', $viewData['invoiceLine']->getId()) }}" class="btn btn-outline-warning me-2">
    {{ __('messages.editButton') }}
</a>

<form action="{{ route('admin.invoiceLine.destroy', $viewData['invoiceLine']->getId()) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        {{ __('messages.deleteButton') }}
    </button>
</form>

<a href="{{ route('admin.invoiceLine.index') }}" class="btn btn-outline-light ms-2">
    {{ __('messages.backButton') }}
</a>

@endsection