@extends('layouts.app')
@section('content')
<div>
  @foreach ($viewData['invoiceLine'] as $invoiceLine)
    <div>
      <p>ID: {{ $invoiceLine->getId() }}</p>
      <p>Unit price: {{ $invoiceLine->getUnitPrice() }}</p>
      <p>Reason: {{ $invoiceLine->getReason() }}</p>
      <p><a href="{{ route('invoiceLine.show', ['id'=>$invoiceLine->getId()]) }}">Details</a></p>
      <!--<p>Phone ID: {{ $invoiceLine->getPhoneId() }}</p>-->
    </div>
  @endforeach
</div>
@endsection

