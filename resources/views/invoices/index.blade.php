@extends('layouts.app')
@section('content')
<div>
  @foreach ($viewData['invoices'] as $invoice)
    <div>
      <p>ID: {{ $invoice->getId() }}</p>
      <p>Date: {{ $invoice->getDate() }}</p>
      <!-- Displaying the array -->
      <p>Invoice lines: {{ $invoice->getInvoiceLines() }}</p>

      <p><a href="{{ route('invoices.show', ['id'=>$invoice->getId()]) }}">Details</a></p>
      <p><a href="{{ route('invoices.edit', ['id'=>$invoice->getId()]) }}">Edit invoice line</a></p>

      <!--Delete invoice-->
      <form method="POST" action="{{ route('invoices.delete', $invoice->getId()) }}">
        @csrf
        @method('DELETE')
        <button>Erase invoice</button>
      </form>
    </div>
  @endforeach
</div>
@endsection
