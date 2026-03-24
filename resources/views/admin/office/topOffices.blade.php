@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('office.topOffices') }}</h2>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
        <thead>
            <tr class="text-warning">
                <th>{{ __('common.idLabel') }}</th>
                <th>{{ __('office.officeName') }}</th>
                <th>{{ __('office.addressTitle') }}</th>
                <th>{{ __('office.totalInvoices') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach($viewData['offices'] as $office)
            <tr>
                <td>{{ $office->getId() }}</td>
                <td>{{ $office->getName() }}</td>
                <td>{{ $office->getAddress() }}</td>
                <td>{{ $office->invoices_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection