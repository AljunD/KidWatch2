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
    @if(session('success'))
        <div class="p-12 text-center">
            <div class="max-w-md mx-auto">
                <!-- Icon -->
                <div class="mb-6 bg-green-100 text-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
                    ✓
                </div>
                <!-- Title -->
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Archive Complete</h3>
                <!-- Description -->
                <p class="text-gray-600 mb-8">
                    {{ session('success') }}
                </p>
                <!-- Action Button -->
                <a href="{{ route('guardians.index') }}" 
                class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                    Return to Guardians
                </a>
            </div>
        </div>
    @elseif(session('error'))
        <!-- Archive Failed Message -->
        <div class="p-12 text-center">
            <div class="max-w-md mx-auto">
                <!-- Icon -->
                <div class="mb-6 bg-red-100 text-red-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
                    ✕
                </div>
                <!-- Title -->
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Archive Failed</h3>
                <!-- Description -->
                <p class="text-gray-600 mb-8">
                    {{ session('error') }}
                </p>
                <!-- Action Button -->
                <a href="{{ route('guardians.index') }}" 
                class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                    Back to Guardians
                </a>
            </div>
        </div>
    @else
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
                        @forelse($guardians as $guardian)
                            <tr class="hover:bg-blue-50 transition-colors group">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-bold text-gray-900">
                                            {{ $guardian->first_name }} {{ $guardian->last_name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $guardian->user->email ?? '' }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600">
                                    {{ $guardian->contact_number }}
                                </td>
                                <td class="px-6 py-5 text-sm text-gray-600 max-w-xs truncate">
                                    {{ $guardian->address }}
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                        {{ $guardian->relationship_to_child ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if($guardian->childs->count())
                                        @foreach($guardian->childs as $child)
                                            <div class="text-sm text-gray-900">{{ $child->first_name }} {{ $child->last_name }}</div>
                                        @endforeach
                                    @else
                                        <span class="text-sm text-gray-500">No linked children</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('guardians.show', $guardian->id) }}" 
                                           class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg text-sm font-semibold hover:bg-blue-200 transition">
                                            View
                                        </a>
                                        <a href="{{ route('guardians.edit', $guardian->id) }}" 
                                           class="px-4 py-2 bg-green-100 text-green-700 rounded-lg text-sm font-semibold hover:bg-green-200 transition">
                                            Edit
                                        </a>
                                        <a href="{{ route('guardians.create-child', $guardian->id) }}" 
                                           class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg text-sm font-semibold hover:bg-purple-200 transition">
                                            Link Child
                                        </a>
                                        <form action="{{ route('guardians.destroy', $guardian->id) }}" method="POST" onsubmit="return confirm('Archive this guardian and all linked children?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-lg text-sm font-semibold hover:bg-yellow-200 transition">
                                                Archive
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-5 text-center text-gray-500">
                                    No guardians found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between text-sm">
                {{ $guardians->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
