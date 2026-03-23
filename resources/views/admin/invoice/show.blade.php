@extends('layouts.admin')

@section('content')

<h2 class="mb-4 text-warning">
    {{ __('messages.invoiceLabel') }} #{{ $viewData['invoice']->getId() }}
</h2>

<div class="card bg-dark border-secondary text-light mb-4">
    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <p>
                    <span class="text-secondary">{{ __('messages.dateTitle') }}:</span>
                    {{ $viewData['invoice']->getDate() }}
                </p>
            </div>

            <div class="col-md-4">
                <p>
                    <span class="text-secondary">{{ __('messages.userLabel') }}:</span>
                    {{ $viewData['invoice']->user->getName() }}
                </p>
            </div>

            <div class="col-md-4">
                <p>
                    <span class="text-secondary">{{ __('messages.officeNameTitle') }}:</span>
                    {{ $viewData['invoice']->office->getName() }}
                </p>
            </div>

        </div>

    </div>
</div>

<div class="card bg-dark border-secondary text-light">
    <div class="card-body">

        <h5 class="mb-3 text-warning">{{ __('messages.invoiceLines') }}</h5>

        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">

                <thead>
                    <tr class="text-warning">
                        <th>{{ __('messages.phoneLabel') }}</th>
                        <th>{{ __('messages.quantityTitle') }}</th>
                        <th>{{ __('messages.unitPriceTitle') }}</th>
                        <th>{{ __('messages.discountTitle') }}</th>
                        <th>{{ __('messages.subtotalTitle') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @php $total = 0; @endphp

                    @foreach($viewData['invoice']->invoiceLines as $invoiceLine)

                        @php
                            $lineTotal = ($invoiceLine->getUnitPrice() * $invoiceLine->getQuantity()) * (1 - $invoiceLine->getDiscount());
                            $total += $lineTotal;
                        @endphp

                        <tr>
                            <td>{{ $invoiceLine->phone->getName() }}</td>
                            <td>{{ $invoiceLine->getQuantity() }}</td>
                            <td>${{ $invoiceLine->getUnitPrice() }}</td>
                            <td>{{ $invoiceLine->getDiscount() * 100 }}%</td>
                            <td>${{ $lineTotal }}</td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="text-end mt-3">
            <h4 class="text-warning">{{ __('messages.totalTitle') }}: ${{ $total }}</h4>
        </div>

    </div>
</div>

<div class="mt-4 d-flex gap-2">

    <a href="{{ route('admin.invoice.edit', $viewData['invoice']->getId()) }}" 
       class="btn btn-outline-warning">
        {{ __('messages.editButton') }}
    </a>

    <form action="{{ route('admin.invoice.destroy', $viewData['invoice']->getId()) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">
            {{ __('messages.deleteButton') }}
        </button>
    </form>

    <a href="{{ route('admin.invoice.index') }}" 
       class="btn btn-outline-light">
        {{ __('messages.backButton') }}
    </a>

</div>

@endsection