@extends('components.app')

@section('title', 'Guardian Profile')

@section('content')
<div class="max-w-6xl mx-auto my-10 px-4">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <nav class="flex mb-2" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="{{ route('guardians.index') }}" class="hover:text-blue-600 transition">Guardians</a></li>
                    <li><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg></li>
                    <li class="font-medium text-gray-900">Maria Santos</li>
                </ol>
            </nav>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Guardian Profile</h1>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('guardians.index') }}" 
               class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-xl hover:bg-gray-200 transition shadow-sm flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to List
            </a>
            <a href="{{ route('guardians.edit', 1) }}" 
               class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-semibold rounded-xl hover:bg-gray-50 transition shadow-sm flex items-center">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                Edit Details
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            
            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50">
                    <h2 class="text-lg font-bold text-gray-800">Personal Information</h2>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Full Name</label>
                            <p class="mt-1 text-lg font-semibold text-gray-900">Maria Santos</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Relationship to Child</label>
                            <p class="mt-1 text-lg font-semibold text-blue-600">Mother</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Contact Number</label>
                            <p class="mt-1 text-gray-800 font-medium">0912 345 6789</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-widest">Home Address</label>
                            <p class="mt-1 text-gray-800 leading-relaxed">
                                Barangay 123, Quezon City<br>
                                Metro Manila, NCR
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-gray-800">Linked Children</h2>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">2 Records</span>
                </div>
                <div class="divide-y divide-gray-100">
                    <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-500 font-bold text-xl overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name=Juan+Dela+Cruz&background=DBEAFE&color=1E40AF" alt="Juan">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Juan Dela Cruz</h4>
                                <p class="text-xs text-gray-500 font-medium">Primary Ward</p>
                            </div>
                        </div>
                        <a href="/children/1" class="p-2 text-gray-400 hover:text-blue-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <div class="p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <div class="flex items-center space-x-4">
                            <div class="w-14 h-14 rounded-2xl bg-pink-50 border border-pink-100 flex items-center justify-center text-pink-500 font-bold text-xl overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name=Ana+Dela+Cruz&background=FCE7F3&color=9D174D" alt="Ana">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Ana Dela Cruz</h4>
                                <p class="text-xs text-gray-500 font-medium">Secondary Ward</p>
                            </div>
                        </div>
                        <a href="/children/2" class="p-2 text-gray-400 hover:text-blue-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-gray-900 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl"></div>
                
                <h2 class="text-xs font-bold uppercase tracking-[0.2em] text-gray-400 mb-6">Account Status</h2>
                
                <div class="space-y-6 relative z-10">
                    <div>
                        <p class="text-xs text-gray-400 mb-1">Email Address</p>
                        <p class="font-medium">maria@example.com</p>
                        <span class="mt-2 inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-green-500/20 text-green-400 border border-green-500/30 uppercase tracking-tighter">
                            Verified Account
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-white/10">
                        <div>
                            <p class="text-xs text-gray-400 mb-1">System Role</p>
                            <p class="text-sm font-semibold text-blue-400">Guardian</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 mb-1">Account ID</p>
                            <p class="text-sm font-semibold">#GRD-9021</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6">
                <div class="space-y-4">
                    <div class="flex items-center gap-3 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <div class="text-xs">
                            <p class="font-bold text-gray-400 uppercase">Created</p>
                            <p class="text-gray-900">May 01, 2026 • 10:00 AM</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        <div class="text-xs">
                            <p class="font-bold text-gray-400 uppercase">Last Activity</p>
                            <p class="text-gray-900">May 20, 2026 • 02:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection