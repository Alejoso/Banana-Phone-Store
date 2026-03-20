@extends('layouts.app')
@section('content')
<div>
  <h1>Create new invoice line</h1>

  @if (session()->has('message'))
    {{ session->get('message') }}
  @endif
  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li> - {{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <!--Form-->
  <form method="POST" action="{{ route('invoiceLine.save') }}">
    @csrf
    <input type="number" placeholder="Unit price (allows decimals)" step="0.01" min="1.00" name="unit_price" value="{{ old('unit_price') }}">
    <input type="number" placeholder="Discount (allows decimals)" step="0.01" min="0.00" name="discount" value="{{ old('discount') }}">
    <input type="number" placeholder="Quantity" step="1" min="1" name="quantity" value="{{ old('quantity') }}">
    <input type="text" placeholder="Reason" name="reason" value="{{ old('reason') }}">
    <input type="number" placeholder="Invoice ID" step="1" min="1" name="invoice_id" value="{{ old('invoice_id') }}">
    <input type="submit" name="registerInvoiceLine" value="Register">
  </form>
</div>
@endsection
