@extends('layouts.app')
@section('content')

<h1>{{ __('messages.confirmPasswordTitle') }}</h1>
<p>{{ __('messages.confirmPasswordMessage') }}</p>

<form method="POST" action="{{ route('password.confirm') }}">

    @csrf

    <div>
        <label for="password">{{ __('messages.passwordTitle') }}</label>

        <input 
            id="password" 
            type="password" 
            name="password" 
            required 
            autocomplete="current-password"
        >

        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">
        {{ __('messages.confirmPasswordTitle') }}
    </button>

</form>

@if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
        {{ __('messages.forgotPasswordTitle') }}
    </a>
@endif

@endsection