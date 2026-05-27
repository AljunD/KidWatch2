@extends('components.app')

@section('title', 'Guardians')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Guardians</h1>
            <p class="text-sm text-gray-500">Manage and view all registered student guardians.</p>
        </div>
        <a href="{{ route('guardians.create') }}" 
           class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white text-sm font-semibold rounded-xl shadow hover:bg-blue-700 transition transform active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Guardian
        </a>
    </div>

    <!-- Search & Stats -->
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="relative w-full md:w-96">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <input type="text" id="searchInput" placeholder="Search guardians by name or email..." 
                   class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition">
        </div>

        <div class="text-sm text-gray-500">
            Showing <span class="font-semibold text-gray-700" id="resultCount">3</span> Guardians
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Guardian</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Contact</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Address</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Relationship</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Linked Students</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-widest">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50" id="guardiansTableBody">
                    
                    <!-- Row 1 -->
                    <tr class="hover:bg-blue-50 transition-colors group">
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">MS</div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900">Maria Santos</div>
                                    <div class="text-sm text-gray-500">maria.santos@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">0912 345 6789</td>
                        <td class="px-6 py-5 text-sm text-gray-600 max-w-xs truncate">Barangay San Isidro, Quezon City</td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">Mother</span>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-pink-200 flex items-center justify-center text-xs font-bold">JD</div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">Juan Dela Cruz</div>
                        </td>
<td class="px-6 py-5 whitespace-nowrap text-right">
    <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
        <!-- View -->
        <a href="{{ route('guardians.show', 1) }}" 
           class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition" title="View">
            👁️
        </a>

        <!-- Edit -->
        <a href="{{ route('guardians.edit', 1) }}" 
           class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition" title="Edit">
            ✏️
        </a>

        <!-- Link Student -->
        <a href="{{ route('guardians.create-student', 1) }}" 
           class="p-2 text-purple-600 hover:bg-purple-100 rounded-lg transition" title="Link Student">
            ➕👩‍🎓
        </a>

        <!-- Delete -->
        <form action="{{ route('guardians.destroy', 1) }}" method="POST" class="inline">
            @csrf @method('DELETE')
            <button type="submit" 
                    class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition" 
                    onclick="return confirm('Delete this guardian?')" 
                    title="Delete">
                🗑️
            </button>
        </form>
    </div>
</td>

                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-blue-50 transition-colors group">
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm">RJ</div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900">Roberto Javier</div>
                                    <div class="text-sm text-gray-500">roberto.javier@gmail.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">0927 876 5432</td>
                        <td class="px-6 py-5 text-sm text-gray-600 max-w-xs truncate">Barangay Commonwealth, Quezon City</td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-700">Father</span>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="text-xs text-gray-500">No students linked yet</div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('guardians.show', 3) }}" class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition">👁️</a>
                                <a href="{{ route('guardians.edit', 3) }}" class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition">✏️</a>
                                <button onclick="return confirm('Delete this guardian?')" class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition">🗑️</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-blue-50 transition-colors group">
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold text-sm">AL</div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900">Ana Lopez</div>
                                    <div class="text-sm text-gray-500">ana.lopez@yahoo.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">0918 765 4321</td>
                        <td class="px-6 py-5 text-sm text-gray-600 max-w-xs truncate">Barangay Holy Spirit, Quezon City</td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">Legal Guardian</span>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-sky-200 flex items-center justify-center text-xs font-bold">LJ</div>
                                <div class="w-8 h-8 rounded-full border-2 border-white bg-violet-200 flex items-center justify-center text-xs font-bold">MJ</div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">Luis, Miguel</div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('guardians.show', 3) }}" class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition">👁️</a>
                                <a href="{{ route('guardians.edit', 3) }}" class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition">✏️</a>
                                <button onclick="return confirm('Delete this guardian?')" class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition">🗑️</button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between text-sm">
            <p class="text-gray-500">Showing 1 to 3 of 3 guardians</p>
            <div class="flex space-x-2">
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-gray-400 cursor-not-allowed">Previous</button>
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-gray-400 cursor-not-allowed">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Live Search (Client-side)
    document.getElementById('searchInput').addEventListener('keyup', function() {
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
</script>
@endsection