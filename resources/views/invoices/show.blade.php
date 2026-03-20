@extends('layouts.app')
@section('content')
<div>
  <p>ID: {{ $viewData['invoice']->getId() }}</p>
  <p>Date: {{ $viewData['invoice']->getDate() }}</p>
  <p>Invoice lines: {{ $viewData['invoice']->getInvoiceLines() }}</p>
  <br>
  <p><a href="{{ route('invoices.index') }}">Back</a></p>
</div>
@endsection
