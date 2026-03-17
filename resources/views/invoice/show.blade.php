@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div>
  <p>ID: {{ $viewData['invoice']->getId() }}</p>
  <p>Date: {{ $viewData['date']->getDate() }}</p>
  <p>Invoice lines: {{ $viewData['invoice']->getInvoiceLines() }}</p>
  <!--<p>User: {{ $viewData['invoice']->getCustomUser() }}</p>-->
  <!--<p>Office: {{ $viewData['invoice']->getOffice() }}</p>-->

  <form method="POST" action="{{ route('invoice.delete', $viewData['invoice']->getId()) }}">
    @csrf
    @method('DELETE')
    <button>Erase invoice</button>
  </form>
</div>
@endsection
