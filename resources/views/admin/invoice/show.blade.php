@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">
    {{ __('common.invoiceLabel') }} #{{ $viewData['invoice']->getId() }}
</h2>

<div class="card bg-dark border-secondary text-light mb-4">
    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <p>
                    <span class="text-secondary">{{ __('common.dateTitle') }}:</span>
                    {{ $viewData['invoice']->getDate() }}
                </p>
            </div>

            <div class="col-md-4">
                <p>
                    <span class="text-secondary">{{ __('common.userLabel') }}:</span>
                    {{ $viewData['invoice']->getUser()->getName() }}
                </p>
            </div>

            <div class="col-md-4">
                <p>
                    <span class="text-secondary">{{ __('office.officeNameTitle') }}:</span>
                    {{ $viewData['invoice']->getOffice()->getName() }}
                </p>
            </div>

        </div>

    </div>
</div>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <h5 class="mb-3 text-warning">{{ __('invoiceLine.invoiceLines') }}</h5>

        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">

                <thead>
                    <tr class="text-warning">
                        <th>{{ __('common.phoneLabel') }}</th>
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

    <a href="{{ route('admin.invoice.edit', $viewData['invoice']->getId()) }}" 
       class="btn btn-outline-warning">
        {{ __('button.editButton') }}
    </a>

    <form action="{{ route('admin.invoice.destroy', $viewData['invoice']->getId()) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">
            {{ __('button.deleteButton') }}
        </button>
    </form>

    <a href="{{ route('admin.invoice.index') }}" 
       class="btn btn-outline-light">
        {{ __('button.backButton') }}
    </a>

</div>

@endsection