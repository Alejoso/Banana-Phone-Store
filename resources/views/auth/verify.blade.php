@extends('layouts.app')

@section('content')

<h1>{{ __('auth.verifyEmailAddressTitle') }}</h1>

@if (session('resent'))
    <p>{{ __('auth.verificationLinkSentMessage') }}</p>
@endif

<p>{{ __('auth.checkEmailForVerificationMessage') }}</p>

<p>{{ __('auth.didNotReceiveEmailMessage') }}:</p>

<form method="POST" action="{{ route('verification.resend') }}">

    @csrf

    <button type="submit">
        {{ __('auth.requestAnotherVerificationButton') }}
    </button>

</form>

@endsection