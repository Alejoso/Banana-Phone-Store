@extends('layouts.app')
@section('title' $viewData['title'])
@section('content')
<div>
  <h1>Add an invoice line to this invoice</h1>

  <form>
    <input type="text" placeholder="List of invoice lines, in the format: [1, 2, 3]" name="invoiceLineList" value="{{ old('invoiceLineList') }}">
    <input type="submit" name="updateInvoice" value="Update">
  </form>
</div>
@endsection

