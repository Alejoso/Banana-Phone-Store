@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('phone.mostPurchasedPhones') }}</h2>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">
        <thead>
            <tr class="text-warning">
                <th>{{ __('common.idLabel') }}</th>
                <th>{{ __('common.nameLabel') }}</th>
                <th>{{ __('phone.brandTitle') }}</th>
                <th>{{ __('phone.priceTitle') }}</th>
                <th>{{ __('phone.totalPurchased') }}</th>
                <th class="text-end">{{ __('common.actionsLabel') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['phones'] as $phone)
            <tr>
                <td>{{ $phone->getId() }}</td>
                <td>{{ $phone->getName() }}</td>
                <td>{{ $phone->getBrand() }}</td>
                <td>${{ $phone->getPrice() }}</td>
                <td>{{ $phone->invoice_lines_sum_quantity ?? 0 }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.phone.show', ['id' => $phone->getId()]) }}"
                       class="btn btn-sm btn-outline-warning">
                        {{ __('button.viewButton') }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection