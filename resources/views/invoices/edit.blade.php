@extends('layouts.app')
@section('content')
<div>
  <form method="POST" action="{{ route('invoices.update', ['id'=>$viewData['invoice']->getId()]) }}">
    @csrf
    @method('PUT')
    <label for="date">Date: </label>
    <input type="date" name="date" value="{{ $viewData['invoice']->getDate() }}">
    <input type="text" placeholder="List of invoice lines, in the format: [1, 2, 3]" name="invoice_lines" value="{{ $viewData['invoice']->getInvoiceLines() }}">
    <input type="submit" name="updateInvoice" value="Update">
  </form>
</div>
@endsection

