@extends('components.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-100 text-green-700 px-6 py-4 font-semibold shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Dashboard Header --}}
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-gray-900">Welcome, {{ Auth::user()->name }}</h1>
        <p class="mt-2 text-gray-600">Here’s your profile information and quick overview.</p>
    </div>

    {{-- Profile + Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">

        {{-- Profile Card --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">My Profile</h2>
            <ul class="space-y-2 text-gray-700">
                <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                @if(Auth::user()->teacher)
                    <li><strong>Contact Number:</strong> {{ Auth::user()->teacher->contact_number }}</li>
                    <li><strong>Address:</strong> {{ Auth::user()->teacher->address }}</li>
                @endif
            </ul>
        </div>

        {{-- Quick Stats --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Stats</h2>
            <div class="grid grid-cols-2 gap-6 text-center">
                <div>
                    <p class="text-3xl font-bold text-gray-900">12</p>
                    <p class="text-gray-500 text-sm">Children</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-gray-900">3</p>
                    <p class="text-gray-500 text-sm">Classes</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-gray-900">5</p>
                    <p class="text-gray-500 text-sm">Reports</p>
                </div>
                <div>
                    <p class="text-3xl font-bold text-gray-900">2</p>
                    <p class="text-gray-500 text-sm">Notifications</p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
