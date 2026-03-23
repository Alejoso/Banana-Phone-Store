@extends('layouts.app')

@section('content')

<h1>{{ __('messages.verifyEmailAddressTitle') }}</h1>

@if (session('resent'))
    <p>{{ __('messages.verificationLinkSentMessage') }}</p>
@endif

<p>{{ __('messages.checkEmailForVerificationMessage') }}</p>

<p>{{ __('messages.didNotReceiveEmailMessage') }}:</p>

<form method="POST" action="{{ route('verification.resend') }}">

    @csrf

    <button type="submit">
        {{ __('messages.requestAnotherVerificationButton') }}
    </button>

</form>

@endsection