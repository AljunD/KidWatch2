@extends('components.app')

@section('title', 'Edit Guardian')

@section('content')
<div class="max-w-4xl mx-auto my-10">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <!-- Header -->
        <div class="px-8 py-8 bg-gray-50 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Edit Guardian</h1>
                    <p class="text-sm text-gray-500 mt-1">Update guardian account and linked information</p>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <div id="success-message" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="mb-6 bg-green-100 text-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">✓</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Update Complete</h3>
                <p class="text-gray-600 mb-8">The guardian account and profile have been successfully updated.</p>
                <a href="{{ route('guardians.index') }}" 
                   class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                    Return to Guardians List
                </a>
            </div>
        </div>

        <!-- Failed Message -->
        <div id="failed-message" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="mb-6 bg-red-100 text-red-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">✕</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Update Failed</h3>
                <p class="text-gray-600 mb-8">Something went wrong while updating the guardian profile. Please try again.</p>
                <a href="{{ route('guardians.index') }}" 
                   class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                    Back to Guardians
                </a>
            </div>
        </div>

        <!-- Form Container -->
        <div id="form-container" class="p-8 md:p-12">
            <form id="editGuardianForm" class="space-y-10">
                
                <!-- User Account Section -->
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-4">User Account</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Email Address</label>
                            <input type="email" id="guardianEmail" value="{{ old('email', $guardian->user->email ?? '') }}" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Role</label>
                            <input type="text" value="guardian" readonly 
                                   class="w-full border-gray-100 bg-gray-50 text-gray-500 rounded-xl p-3 cursor-not-allowed border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">New Password <span class="text-gray-400 text-xs">(optional)</span></label>
                            <input type="password" id="guardianPassword" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" 
                                   placeholder="Leave blank to keep current password">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Confirm New Password</label>
                            <input type="password" id="guardianConfirmPassword" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                    </div>
                </div>

                <!-- Guardian Details -->
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Guardian Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">First Name</label>
                            <input type="text" id="guardianFirst" value="{{ old('first_name', $guardian->first_name ?? '') }}" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Middle Name</label>
                            <input type="text" id="guardianMiddle" value="{{ old('middle_name', $guardian->middle_name ?? '') }}" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Last Name</label>
                            <input type="text" id="guardianLast" value="{{ old('last_name', $guardian->last_name ?? '') }}" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2 mt-6">
                            <label class="text-sm font-semibold text-gray-700">Sex</label>
                            <select id="guardianSex" name="sex"
                                    class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                                <option value="" disabled>Select sex</option>
                                <option value="Male" {{ old('sex', $guardian->sex ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('sex', $guardian->sex ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Contact Number</label>
                            <input type="tel" id="guardianContact" value="{{ old('contact_number', $guardian->contact_number ?? '') }}" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Relationship to Child</label>
                            <input type="text" id="guardianRelation" value="{{ old('relationship_to_child', $guardian->relationship_to_child ?? '') }}" 
                                   class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                    </div>
                </div>

                <!-- Guardian Address -->
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Guardian Address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm text-gray-600">Barangay</label>
                            <input type="text" id="guardianBarangay" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-gray-600">Municipality/City</label>
                            <input type="text" id="guardianMunicipality" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-gray-600">Province</label>
                            <input type="text" id="guardianProvince" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-gray-600">Region</label>
                            <input type="text" id="guardianRegion" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border">
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-8 border-t border-gray-100">
                    <a href="{{ route('guardians.index') }}" 
                       class="px-8 py-3 text-gray-600 font-semibold hover:text-gray-900 transition">Cancel</a>
                    <button type="button" id="updateBtn"
                            class="px-10 py-3 bg-green-600 text-white font-semibold rounded-xl shadow-lg shadow-green-100 hover:bg-green-700 transition transform active:scale-95">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const formContainer = document.getElementById('form-container');
    const successMessage = document.getElementById('success-message');
    const failedMessage = document.getElementById('failed-message');
    const updateBtn = document.getElementById('updateBtn');

    updateBtn.addEventListener('click', () => {
        // Hide form
        formContainer.classList.add('hidden');

        // Simulate outcome (replace with actual AJAX/fetch in production)
        const isSuccess = true; // toggle this for preview

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
</script>

@endsection