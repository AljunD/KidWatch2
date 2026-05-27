@extends('components.auth')

@section('title', 'Verify Your Email')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh] px-6">

    {{-- Header --}}
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Verify Your Email</h1>
        <p class="text-gray-600 text-lg max-w-md mx-auto">
            We’ve sent a verification link to your email address. Please check your inbox.
        </p>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-lg mb-6 shadow max-w-md w-full text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Resend Form --}}
    <div class="bg-white p-6 rounded-xl shadow-md max-w-sm w-full text-center">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="w-full bg-gray-900 hover:bg-black text-white font-semibold py-3 rounded-lg transition">
                Resend Verification Email
            </button>
        </form>
    </div>

</div>
@endsection
