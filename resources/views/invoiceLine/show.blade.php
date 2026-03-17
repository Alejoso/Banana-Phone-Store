@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div>
  <p>ID: {{ $viewData['invoiceLine']->getId() }}</p>
  <p>Unit price: {{ $viewData['invoiceLine']->getUnitPrice() }}</p>
  <p>Discount: {{ $viewData['invoiceLine']->getDiscount() }}</p>
  <p>Quantity: {{ $viewData['invoiceLine']->getQuantity() }}</p>
  <p>Reason: {{ $viewData['invoiceLine']->getReason() }}</p>
  <p>Invoice ID: {{ $viewData['invoiceLine']->getInvoiceId() }}</p>
  <!--<p>Phone ID: {{ $viewData['invoiceLine']->getPhoneId() }}</p>-->

  <form method="POST" action="{{ route('invoiceLine.delete', $viewData['invoiceLine]->getId()) }}">
    @csrf
    @method('DELETE')
    <button>Erase invoice line</button>
  </form>
</div>
@endsection

