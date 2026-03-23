@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.topOffices') }}</h2>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
        <thead>
            <tr class="text-warning">
                <th>{{ __('messages.idLabel') }}</th>
                <th>{{ __('messages.officeName') }}</th>
                <th>{{ __('messages.addressTitle') }}</th>
                <th>{{ __('messages.totalInvoices') }}</th>
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