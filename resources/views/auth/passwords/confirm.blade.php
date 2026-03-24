@extends('layouts.app')
@section('content')

<h1>{{ __('auth.confirmPasswordTitle') }}</h1>
<p>{{ __('auth.confirmPasswordMessage') }}</p>

<form method="POST" action="{{ route('password.confirm') }}">

    @csrf

    <div>
        <label for="password">{{ __('auth.passwordTitle') }}</label>

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
        {{ __('auth.confirmPasswordTitle') }}
    </button>

</form>

@if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
        {{ __('auth.forgotPasswordTitle') }}
    </a>
@endif

@endsection