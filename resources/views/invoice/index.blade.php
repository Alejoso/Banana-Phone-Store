@extends('layouts.app')
@section('content')
<div>
  @foreach ($viewData['invoice'] as $invoice)
    <div>
      <p>ID: {{ $invoice->getId() }}</p>
      <p>Date: {{ $invoice->getDate() }}</p>
      <p>Invoice lines: {{ $invoice->getInvoiceLines() }}</p>
      <p><a href="{{ route('invoice.show', ['id'=>$invoice->getId()]) }}">Details</a></p>
      <p><a href="{{ route('invoice.addInvoiceLine', ['id'=>$invoice->getId()]) }}">Edit invoice line</a></p>
    </div>
  @endforeach
</div>
@endsection
