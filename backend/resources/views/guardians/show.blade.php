@extends('components.app')

@section('title', 'Guardian Profile')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Guardian Profile</h1>
    <p class="text-sm text-gray-500">Detailed information about the guardian and linked user account.</p>
</div>

<!-- Back Button -->
<div class="mb-6">
    <a href="/guardians" 
       class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 text-sm font-semibold rounded-xl shadow-sm hover:bg-gray-200 transition active:scale-95">
        ← Back to Guardians
    </a>
</div>

<!-- User Account Section -->
<div class="bg-white shadow-lg rounded-2xl p-8 space-y-6 border border-gray-100 mb-8">
    <h2 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">User Account</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Email</p>
            <p class="text-sm font-semibold text-gray-800 flex items-center">
                maria@example.com
                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">
                    Verified
                </span>
            </p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Role</p>
            <p class="text-sm font-semibold text-gray-800">Guardian</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Created At</p>
            <p class="text-sm text-gray-700">2026-05-01 10:00 AM</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Updated At</p>
            <p class="text-sm text-gray-700">2026-05-20 02:30 PM</p>
        </div>
    </div>
</div>

<!-- Guardian Details Card -->
<div class="bg-white shadow-lg rounded-2xl p-8 space-y-6 border border-gray-100 mb-8">
    <!-- Guardian Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Full Name</p>
            <p class="text-lg font-bold text-gray-900">Maria Santos</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Email</p>
            <p class="text-sm text-gray-700">maria@example.com</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Contact Number</p>
            <p class="text-sm text-gray-700">09123456789</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Relationship to Child</p>
            <p class="text-sm text-gray-700">Mother</p>
        </div>
    </div>

    <!-- Address -->
    <div class="pt-6 border-t border-gray-200">
        <h2 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">Address</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-xs text-gray-500 uppercase">Barangay</p>
                <p class="font-semibold text-gray-800">Barangay 123</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase">Municipality/City</p>
                <p class="font-semibold text-gray-800">Quezon City</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase">Province</p>
                <p class="font-semibold text-gray-800">Metro Manila</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase">Region</p>
                <p class="font-semibold text-gray-800">NCR</p>
            </div>
        </div>
    </div>
</div>

<!-- Linked Children Section -->
<div class="bg-white shadow-lg rounded-2xl p-8 space-y-6 border border-gray-100">
    <h2 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4">Linked Children</h2>
    <div class="divide-y divide-gray-200">
        <!-- Example Child -->
        <div class="py-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/64" alt="Child Image" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <p class="text-sm font-bold text-gray-900">Juan Dela Cruz</p>
                </div>
            </div>
            <a href="/children/1" 
               class="px-4 py-2 bg-blue-600 text-white text-xs font-semibold rounded-xl shadow-sm hover:bg-blue-700 transition active:scale-95">
                View Profile
            </a>
        </div>
        <div class="py-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/64" alt="Child Image" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <p class="text-sm font-bold text-gray-900">Ana Dela Cruz</p>
                </div>
            </div>
            <a href="/children/2" 
               class="px-4 py-2 bg-blue-600 text-white text-xs font-semibold rounded-xl shadow-sm hover:bg-blue-700 transition active:scale-95">
                View Profile
            </a>
        </div>
    </div>
</div>
@endsection
