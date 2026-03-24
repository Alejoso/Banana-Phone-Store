@extends('layouts.app')
@section('content')

<h2 class="mb-4">{{ __('invoice.invoicesTitle') }}</h2>

<div class="table-responsive">
    <table class="table table-hover align-middle">

        <thead>
            <tr class="text-warning">
                <th>{{ __('common.idTitle') }}</th>
                <th>{{ __('common.dateTitle') }}</th>
                <th>{{ __('common.userTitle') }}</th>
                <th>{{ __('common.officeTitle') }}</th>
                <th class="text-end">{{ __('common.actionsTitle') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach($viewData['invoices'] as $invoice)
            <tr>
                <td>#{{ $invoice->getId() }}</td>
                <td>{{ $invoice->getDate() }}</td>
                <td>{{ $invoice->user->getName() }}</td>
                <td>{{ $invoice->office->getName() }}</td>

                <td class="text-end">
                    <a href="{{ route('invoice.show', ['id'=> $invoice->getId()]) }}" 
                       class="btn btn-sm btn-outline-warning">
                        {{ __('button.viewButton') }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <a href="{{ route('user.show' , ['id' => auth()->user()->getId()]) }}" 
       class="btn btn-danger">
        {{ __('button.backButton') }}
    </a>
</div>

@endsection