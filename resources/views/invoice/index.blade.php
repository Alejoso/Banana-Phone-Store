@extends('layouts.app')
@section('content')

<h2 class="mb-4">{{ __('messages.invoicesTitle') }}</h2>

<div class="table-responsive">
    <table class="table table-hover align-middle">

        <thead>
            <tr class="text-warning">
                <th>{{ __('messages.idTitle') }}</th>
                <th>{{ __('messages.dateTitle') }}</th>
                <th>{{ __('messages.userTitle') }}</th>
                <th>{{ __('messages.officeTitle') }}</th>
                <th class="text-end">{{ __('messages.actionsTitle') }}</th>
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
                        {{ __('messages.viewButton') }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <a href="{{ route('user.show' , ['id' => auth()->user()->getId()]) }}" 
       class="btn btn-danger">
        {{ __('messages.backButton') }}
    </a>
</div>

@endsection