@extends('layouts.app')
@section('content')
<div>
  <p>ID: {{ $viewData['invoiceLine']->getId() }}</p>
  <p>Unit price: {{ $viewData['invoiceLine']->getUnitPrice() }}</p>
  <p>Discount: {{ $viewData['invoiceLine']->getDiscount() }}</p>
  <p>Quantity: {{ $viewData['invoiceLine']->getQuantity() }}</p>
  <p>Reason: {{ $viewData['invoiceLine']->getReason() }}</p>
  <p>Invoice ID: {{ $viewData['invoiceLine']->getInvoiceId() }}</p>
  <!--<p>Phone ID: {{ $viewData['invoiceLine']->getPhoneId() }}</p>-->
</div>
@endsection

