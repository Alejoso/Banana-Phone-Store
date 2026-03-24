@extends('layouts.app')

@section('content')

<h2 class="mb-4">{{ __('invoice.invoiceTitle') }} #{{ $viewData['invoice']->getId() }}</h2>

<div class="card border-secondary mb-4">
    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <p><span class="text-secondary">{{ __('common.dateTitle') }}:</span> {{ $viewData['invoice']->getDate() }}</p>
            </div>

            <div class="col-md-4">
                <p><span class="text-secondary">{{ __('common.userTitle') }}:</span> {{ $viewData['invoice']->getUser()->getName() }}</p>
            </div>

            <div class="col-md-4">
                <p><span class="text-secondary">{{ __('common.officeTitle') }}:</span> {{ $viewData['invoice']->getOffice()->getName() }}</p>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <h5 class="mb-3">{{ __('invoice.invoiceLinesTitle') }}</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead>
                    <tr class="text-warning">
                        <th>{{ __('common.phoneTitle') }}</th>
                        <th>{{ __('cart.quantityTitle') }}</th>
                        <th>{{ __('invoiceLine.unitPriceTitle') }}</th>
                        <th>{{ __('invoiceLine.discountTitle') }}</th>
                        <th>{{ __('cart.subtotalTitle') }}</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($viewData['invoice']->getInvoiceLines() as $invoiceLine)

                        <tr>
                            <td>{{ $invoiceLine->getPhone()->getName() }}</td>
                            <td>{{ $invoiceLine->getQuantity() }}</td>
                            <td>${{ $invoiceLine->getUnitPrice() }}</td>
                            <td>{{ $invoiceLine->getDiscount() * 100 }}%</td>
                            <td>${{ ($invoiceLine->getUnitPrice() * $invoiceLine->getQuantity()) * (1 - $invoiceLine->getDiscount()) }}</td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="text-end mt-3">
            <h4 class="text-warning">{{ __('cart.totalTitle') }}: ${{ $viewData['total'] }}</h4>
        </div>

    </div>
</div>

<div class="mt-4 d-flex gap-2">
    <a href="{{ route('invoice.index') }}" class="btn btn-danger">
        {{ __('button.backButton') }}
    </a>
</div>

@endsection