@extends('layouts.app')
@section('content')

<div class="container">
    <h1>{{ __('savingsAccount.createSavingsAccount') }}</h1>
    <form method="POST" action="{{ route('savingsAccount.save') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('savingsAccount.savingsAccountName') }}</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>

        <label>{{ __('savingsAccount.savingsAccountType') }}</label>
        <div class="mb-3">
            <select name="type">
                <option value="Savings">{{ __('savingsAccount.savingsOption') }}</option>
                <option value="Checking">{{ __('savingsAccount.checkingOption') }}</option>
                <option value="Other">{{ __('savingsAccount.otherOption') }}</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('savingsAccount.savingsAccountBalance') }}</label>
            <input type="number" name="balance" value="{{ old('balance') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('button.saveButton') }}
        </button>

        <input type="hidden" name="user_id" value="{{ auth()->user()->getId() }}">
    </form>
</div>

@endsection