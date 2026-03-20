@extends('layouts.app')
@section('content')
<div>
  <form method="POST" action="{{ route('invoices.update', ['id'=>$viewData['invoice']->getId()]) }}">
    @csrf
    <label for="date">Date: </label>
    <input type="date" name="date" value="{{ $viewData['invoice']->getDate() }}">
    <input type="text" placeholder="List of invoice lines, in the format: [1, 2, 3]" name="invoice_lines" value="{{ $viewData['invoice']->getInvoiceLines() }}">
    <input type="number" name="custom_user_id" value="{{ $viewData['invoice']->getCustomUser() }}">
    <!-- <input type="number" name="office_id" value="{{ $viewData['invoice']->getOffice() }}"> -->
    <!-- <input type="submit" name="updateInvoice" value="Update"> -->
  </form>
</div>
@endsection

