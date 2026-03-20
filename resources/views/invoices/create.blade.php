@extends('layouts.app')
@section('content')
<div>
  <h1>Create new invoice</h1>

  @if (session()->has('message'))
    {{ session()->get('message') }}
  @endif
  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li> - {{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <!--Form-->
  <form method="POST" action="{{ route('invoices.save') }}">
    @csrf
    <label for="invoiceDate">Date: </label>
    <input type="date" placeholder="Date" name="date" value="{{ old('date') }}">
    <input type="text" placeholder="List of invoice lines, in the format: [1, 2, 3]" name="invoice_lines" value="{{ old('invoice_lines') }}">
    <!-- <input type="number" placeholder="User ID" name="custom_user_id" value="{{ old('custom_user_id') }}"> -->
    <!-- <input type="number" placeholder="Office ID" name="office_id" value="{{ old('office_id') }}"> -->
    <input type="submit" name="registerInvoice" value="Register">
  </form>
</div>
@endsection
