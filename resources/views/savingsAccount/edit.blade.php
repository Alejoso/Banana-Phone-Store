@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{ __('messages.editSavingsAccount') }}</h1>
    <form method="POST" action="{{ route('savingsAccount.update' , ['id' => $viewData['savingsAccount']->getId()]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">{{ __('messages.savingsAccountType') }}</label>
            <input type="text" name="type" value="{{ $viewData['savingsAccount']->getType() }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.savingsAccountBalance') }}</label>
            <input type="number" name="balance" value="{{ $viewData['savingsAccount']->getBalance() }}" class="form-control">
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->user()->getId() }}">
        
        <button type="submit" class="btn btn-primary">
            {{ __('messages.saveButton') }}
        </button>
    </form>
</div>

@endsection