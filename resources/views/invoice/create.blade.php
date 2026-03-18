@extends('layouts.app')
@section('title', $viewData['title'])
@sectioon('content')
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
  <form method="POST" action={{ route('invoice.save') }}>
    @csrf
    <label for="invoiceDate">Date: </label>
    <input type="date" placeholder="Date" name="invoiceDate" value="{{ old('date') }}">
    <input type="text" placeholder="Invoice line" name="invoiceLine" value="{{ old('invoiceLine') }}">
    <!-- <input type="number" placeholder="User ID" name="customUserId" value="{{ old('customUserID') }}"> -->
    <!-- <input type="number" placeholder="Office ID" name="officeId" value="{{ old('officeId') }}"> -->
    <input type="submit" name="registerInvoice" value="Register">
  </form>
</div>
@endsection
