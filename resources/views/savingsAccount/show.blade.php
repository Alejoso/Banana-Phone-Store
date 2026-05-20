@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{ __('savingsAccount.savingsAccountDetails') }}</h1>
    <ul class="list-group">

        <li class="list-group-item">
            <strong>{{ __('savingsAccount.name') }}:</strong> {{ $viewData['savingsAccount']->getName() }}
        </li>

        <li class="list-group-item">
            <strong>{{ __('savingsAccount.savingsAccountType') }}:</strong> {{ $viewData['savingsAccount']->getType() }}
        </li>

        <li class="list-group-item">
            <strong>{{ __('savingsAccount.savingsAccountBalance') }}:</strong> {{ $viewData['savingsAccount']->getBalance() }}
        </li>

    </ul>
    <a href="{{ route('user.show' , ['id' => auth()->user()->getId()]) }}" class="btn btn-secondary mt-3">
        {{ __('button.backButton') }}
    </a>
</div>

@endsection