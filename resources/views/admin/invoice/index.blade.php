@extends('layouts.admin')
@section('content')

<h2 class="mb-4 text-warning">{{ __('messages.invoices') }}</h2>

<div class="table-responsive">
    <table class="table table-dark table-hover align-middle">

        <thead>
            <tr class="text-warning">
                <th>{{ __('messages.idLabel') }}</th>
                <th>{{ __('messages.dateTitle') }}</th>
                <th>{{ __('messages.userLabel') }}</th>
                <th>{{ __('messages.officeNameTitle') }}</th>
                <th class="text-end">{{ __('messages.actionsLabel') }}</th>
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

                    <a href="{{ route('admin.invoice.show', ['id'=> $invoice->getId()]) }}" 
                       class="btn btn-sm btn-outline-warning">
                        {{ __('messages.viewButton') }}
                    </a>

                    <a href="{{ route('admin.invoice.edit', ['id'=> $invoice->getId()]) }}" 
                       class="btn btn-sm btn-outline-light">
                        {{ __('messages.editButton') }}
                    </a>

                    <form action="{{ route('admin.invoice.destroy', ['id'=> $invoice->getId()]) }}" 
                          method="POST" 
                          class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            {{ __('messages.deleteButton') }}
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection