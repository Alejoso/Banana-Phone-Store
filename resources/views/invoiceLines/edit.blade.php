@extends('layouts.app')
@section('content')
<div>
  <form method="POST" action="{{ route('invoiceLines.update', ['id'=>$viewData['invoiceLine']->getId()]) }}">
    @csrf
    @method('PUT')
    <input type="number" name="unit_price" step="0.01" value="{{ $viewData['invoiceLine']->getUnitPrice() }}">
    <input type="number" name="discount" step="0.01" value="{{ $viewData['invoiceLine']->getDiscount() }}">
    <input type="number" name="quantity" step="1" value="{{ $viewData['invoiceLine']->getQuantity() }}">
    <input type="text" name="reason" value="$viewData['invoiceLine']->getReason()">
    <input type="number" name="invoice_id" step="1" value="{{ $viewData['invoiceLine']->getInvoiceId() }}">
    <input type="submit" name="update" value="Update">
  </form>
</div>
@endsection
