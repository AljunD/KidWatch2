@extends('components.app')

@section('title', 'Delete Guardian')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-red-600">Delete Guardian</h1>
    <p class="text-gray-600">Are you sure you want to delete this guardian?</p>
</div>

<div class="bg-white shadow rounded-lg p-6 space-y-2">
    <p><strong>Name:</strong> Maria Santos</p>
    <p><strong>Email:</strong> maria@example.com</p>
</div>

<div class="mt-4 flex space-x-3">
    <button class="px-4 py-2 bg-red-600 text-white rounded-md">Confirm Delete</button>
    <a href="{{ route('guardians.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Cancel</a>
</div>
@endsection
