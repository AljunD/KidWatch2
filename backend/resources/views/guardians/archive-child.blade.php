@extends('components.app')

@section('title', 'Archive Child')

@section('content')
<div class="max-w-5xl mx-auto my-12">
    <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">
        
        <!-- Header -->
        <div class="px-8 py-6 bg-gray-50 border-b border-gray-200">
            <h1 class="text-3xl font-extrabold text-gray-900">Archive Child</h1>
            <p class="text-gray-500 mt-1">Select a child linked to this guardian to archive.</p>
        </div>

        <!-- Success Message -->
        <div id="success-message" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="mb-6 bg-green-100 text-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">✓</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Archive Complete</h3>
                <p class="text-gray-600 mb-8">The child record has been successfully archived.</p>
                <a href="{{ route('guardians.index') }}" 
                   class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                    Done
                </a>
            </div>
        </div>

        <!-- Failed Message -->
        <div id="failed-message" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="mb-6 bg-red-100 text-red-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">✕</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Archive Failed</h3>
                <p class="text-gray-600 mb-8">Something went wrong while archiving the child record. Please try again.</p>
                <a href="{{ route('guardians.index') }}" 
                   class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                    Back to Guardians
                </a>
            </div>
        </div>

        <!-- Child List -->
        <div id="child-list" class="p-8">
            <div class="overflow-x-auto rounded-xl border border-gray-100 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Sex</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Juan Dela Cruz</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Male</td>
                            <td class="px-6 py-4 text-center">
                                <button type="button" class="archive-btn px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-red-700 transition transform active:scale-95">
                                    Archive Child
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Maria Santos</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Female</td>
                            <td class="px-6 py-4 text-center">
                                <button type="button" class="archive-btn px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-red-700 transition transform active:scale-95">
                                    Archive Child
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Cancel Button -->
            <div class="mt-8 flex justify-end">
                <a href="{{ route('guardians.index') }}" 
                   class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-300 transition">
                    Back to Guardians
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    const childList = document.getElementById('child-list');
    const successMessage = document.getElementById('success-message');
    const failedMessage = document.getElementById('failed-message');

    // Attach event listeners to all Archive buttons
    document.querySelectorAll('.archive-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Hide the child list
            childList.classList.add('hidden');

            // Simulate outcome (replace with actual AJAX/fetch in production)
            const isSuccess = true; // <-- set to false to test failed message

            if (isSuccess) {
                successMessage.classList.remove('hidden');
                failedMessage.classList.add('hidden');
            } else {
                failedMessage.classList.remove('hidden');
                successMessage.classList.add('hidden');
            }

            // Scroll to top for visibility
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
</script>

@endsection
