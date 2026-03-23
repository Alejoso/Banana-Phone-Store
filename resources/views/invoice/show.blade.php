@extends('layouts.app')

@section('content')

<h2 class="mb-4">Invoice #{{ $viewData['invoice']->getId() }}</h2>

<div class="card border-secondary mb-4">
    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <p><span class="text-secondary">Date:</span> {{ $viewData['invoice']->getDate() }}</p>
            </div>

            <div class="col-md-4">
                <p><span class="text-secondary">User:</span> {{ $viewData['invoice']->user->getName() }}</p>
            </div>

            <div class="col-md-4">
                <p><span class="text-secondary">Office:</span> {{ $viewData['invoice']->office->getName() }}</p>
            </div>

        </div>

    </div>
</div>

<!-- Invoice Lines -->
<div class="card">
    <div class="card-body">

        <h5 class="mb-3">Invoice Lines</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead>
                    <tr class="text-warning">
                        <th>Phone</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    @php $total = 0; @endphp

                    @foreach($viewData['invoice']->invoiceLines as $invoiceLine)

                        @php
                            $lineTotal = ($invoiceLine->getUnitPrice() * $invoiceLine->getQuantity()) * (1 - $invoiceLine->getDiscount());
                            $total += $lineTotal;
                        @endphp 
                        <!-- This is temporal -->

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

        <!-- Total -->
        <div class="text-end mt-3">
            <h4 class="text-warning">Total: ${{ $total }}</h4>
        </div>

    </div>
</div>

<!-- Actions -->
<div class="mt-4 d-flex gap-2">

    <a href="{{ route('invoice.index') }}" 
       class="btn btn-danger">
        Back
    </a>

</div>

@endsection