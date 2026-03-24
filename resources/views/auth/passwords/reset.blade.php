@extends('layouts.app')

@section('content')

<h1>{{ __('auth.resetPasswordTitle') }}</h1>

<form method="POST" action="{{ route('password.update') }}">

    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        <label for="email">{{ __('auth.emailAddressTitle') }}</label>

        <input 
            id="email" 
            type="email" 
            name="email" 
            value="{{ $email ?? old('email') }}" 
            required 
            autocomplete="email" 
            autofocus
        >

        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">{{ __('auth.passwordTitle') }}</label>

        <input 
            id="password" 
            type="password" 
            name="password" 
            required 
            autocomplete="new-password"
        >

        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password-confirm">{{ __('auth.confirmPasswordTitle') }}</label>

        <input 
            id="password-confirm" 
            type="password" 
            name="password_confirmation" 
            required 
            autocomplete="new-password"
        >
    </div>

    <button type="submit">
        {{ __('auth.resetPasswordTitle') }}
    </button>

</form>

@endsection