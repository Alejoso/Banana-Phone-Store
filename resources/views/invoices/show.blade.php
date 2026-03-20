@extends('layouts.app')
@section('content')
<div>
  <p>ID: {{ $viewData['invoice']->getId() }}</p>
  <p>Date: {{ $viewData['invoice']->getDate() }}</p>
  <p>Invoice lines: {{ $viewData['invoice']->getInvoiceLines() }}</p>
  <!--<p>User: {{ $viewData['invoice']->getCustomUser() }}</p>-->
  <!--<p>Office: {{ $viewData['invoice']->getOffice() }}</p>-->
  <br>
  <p><a href="{{ route('invoice.index') }}">Back</a></p>
</div>
@endsection
