@extends('components.app')

@section('title', 'Guardians')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Guardians</h1>
            <p class="text-sm text-gray-500">Manage and view all registered child guardians.</p>
        </div>
        <a href="{{ route('guardians.create') }}" 
           class="px-6 py-3 bg-blue-600 text-white text-sm font-semibold rounded-xl shadow hover:bg-blue-700 transition transform active:scale-95">
            Add Guardian
        </a>
    </div>

    <!-- Archive Success Message -->
    <div id="success-message" class="hidden p-12 text-center">
        <div class="max-w-md mx-auto">
            <!-- Icon -->
            <div class="mb-6 bg-green-100 text-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
                ✓
            </div>
            <!-- Title -->
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Archive Complete</h3>
            <!-- Description -->
            <p class="text-gray-600 mb-8">
                The guardian and all linked children have been successfully archived.
            </p>
            <!-- Action Button -->
            <a href="{{ route('guardians.index') }}" 
            class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                Return to Guardians
            </a>
        </div>
    </div>

    <!-- Archive Failed Message -->
    <div id="failed-message" class="hidden p-12 text-center">
        <div class="max-w-md mx-auto">
            <!-- Icon -->
            <div class="mb-6 bg-red-100 text-red-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
                ✕
            </div>
            <!-- Title -->
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Archive Failed</h3>
            <!-- Description -->
            <p class="text-gray-600 mb-8">
                Something went wrong while archiving the guardian. Please try again.
            </p>
            <!-- Action Button -->
            <a href="{{ route('guardians.index') }}" 
            class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                Back to Guardians
            </a>
        </div>
    </div>

    <!-- Table -->
    <div id="table-container" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Guardian</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Contact</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Address</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Relationship</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Linked Children</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-widest">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50" id="guardiansTableBody">
                    
                    <!-- Example Row -->
                    <tr class="hover:bg-blue-50 transition-colors group">
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div>
                                <div class="text-sm font-bold text-gray-900">Maria Santos</div>
                                <div class="text-sm text-gray-500">maria.santos@example.com</div>
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">0912 345 6789</td>
                        <td class="px-6 py-5 text-sm text-gray-600 max-w-xs truncate">Barangay San Isidro, Quezon City</td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">Mother</span>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Juan Dela Cruz</div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('guardians.show', 1) }}" 
                                   class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg text-sm font-semibold hover:bg-blue-200 transition">
                                    View
                                </a>
                                <a href="{{ route('guardians.edit', 1) }}" 
                                   class="px-4 py-2 bg-green-100 text-green-700 rounded-lg text-sm font-semibold hover:bg-green-200 transition">
                                    Edit
                                </a>
                                <a href="{{ route('guardians.create-child', 1) }}" 
                                   class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg text-sm font-semibold hover:bg-purple-200 transition">
                                    Link Child
                                </a>
                                <!-- Archive Guardian (Soft Delete) -->
                                <button type="button" id="archiveBtn"
                                        class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-lg text-sm font-semibold hover:bg-yellow-200 transition"
                                        title="Archive Guardian">
                                    Archive
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Add more rows here, each with class="archive-btn" -->
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between text-sm">
            <p class="text-gray-500">Showing Page 1 of 3</p>
            <div class="flex space-x-2">
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-gray-400 cursor-not-allowed">Previous</button>
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-gray-400 cursor-not-allowed">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Live Search
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const term = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#guardiansTableBody tr');
            let visible = 0;

            rows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                if (rowText.includes(term)) {
                    row.style.display = '';
                    visible++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('resultCount').textContent = visible;
        });
    }

    // Archive Button Simulation
    const tableContainer = document.getElementById('table-container');
    const successMessage = document.getElementById('success-message');
    const failedMessage = document.getElementById('failed-message');
    const archiveBtn = document.getElementById('archiveBtn');

    if (archiveBtn) {
        archiveBtn.addEventListener('click', () => {
            tableContainer.classList.add('hidden');

            const isSuccess = true; // <-- set false to test failed
            if (isSuccess) {
                successMessage.classList.remove('hidden');
                failedMessage.classList.add('hidden');
            } else {
                failedMessage.classList.remove('hidden');
                successMessage.classList.add('hidden');
            }

            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});
</script>
@endsection
