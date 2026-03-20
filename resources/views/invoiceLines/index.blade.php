@extends('layouts.app')
@section('content')
<div>
  @foreach ($viewData['invoiceLines'] as $invoiceLine)
    <div>
      <p>ID: {{ $invoiceLine->getId() }}</p>
      <p>Unit price: {{ $invoiceLine->getUnitPrice() }}</p>
      <p>Reason: {{ $invoiceLine->getReason() }}</p>
      <p><a href="{{ route('invoiceLines.show', ['id'=>$invoiceLine->getId()]) }}">Details</a></p>
    </div>
  @endforeach
</div>
@endsection

