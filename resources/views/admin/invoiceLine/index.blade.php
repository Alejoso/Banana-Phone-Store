@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.invoiceLines') }}</h2>

<div class="mb-3">
    <a href="{{ route('admin.invoiceLine.create') }}" class="btn btn-warning">
        {{ __('messages.createInvoiceLine') }}
    </a>
</div>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
        <thead>
            <tr class="text-warning">
                <th>{{ __('messages.idLabel') }}</th>
                <th>{{ __('messages.phoneLabel') }}</th>
                <th>{{ __('messages.quantityTitle') }}</th>
                <th>{{ __('messages.discountTitle') }}</th>
                <th class="text-end">{{ __('messages.actionsLabel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['invoiceLines'] as $invoiceLine)
            <tr>
                <td>{{ $invoiceLine->getId() }}</td>
                <td>{{ $invoiceLine->getPhone()->getName() }}</td>
                <td>{{ $invoiceLine->getQuantity() }}</td>
                <td>{{ $invoiceLine->getDiscount() }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.invoiceLine.show', ['id' => $invoiceLine->getId()]) }}"
                       class="btn btn-sm btn-outline-warning">
                        {{ __('messages.viewButton') }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection