@extends('components.app')

@section('title', 'Add Student')

@section('content')
<div class="max-w-4xl mx-auto my-10">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <!-- Fixed Header -->
        <div class="px-8 py-8 bg-gray-50 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Add New Student</h1>
                    <p class="text-sm text-gray-500 mt-1">Complete the student profile and family information.</p>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <div id="success-message" class="hidden p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="mb-6 bg-green-100 text-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">✓</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Student Added Successfully</h3>
                <p class="text-gray-600 mb-8">The student profile has been successfully created and linked to the guardian.</p>
                <a href="{{ route('guardians.index') }}" 
                   class="inline-block w-full px-8 py-4 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition transform active:scale-95">
                    Return to Guardians
                </a>
            </div>
        </div>

        <!-- Scrollable Form Area -->
        <div id="form-container" class="p-8 md:p-12 max-h-[calc(100vh-240px)] overflow-y-auto custom-scroll">
            <form id="createStudentForm" class="space-y-10">

                <!-- Student Basic Information -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Student Profile</h2>
                    <p class="text-gray-500">Sociodemographic and personal information.</p>
                </div>

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">First Name <span class="text-red-500">*</span></label>
                            <input type="text" id="studentFirst" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="e.g. Juan">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Middle Name</label>
                            <input type="text" id="studentMiddle" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="e.g. Cruz">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" id="studentLast" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="e.g. Dela Cruz">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Sex <span class="text-red-500">*</span></label>
                            <select id="studentSex" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 border outline-none appearance-none bg-white">
                                <option value="">Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" id="studentDob" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 border outline-none">
                        </div>
                    </div>

                    <!-- Student Address -->
                    <div class="space-y-4">
                        <label class="text-sm font-semibold text-gray-700">Student Address</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm text-gray-600">Barangay</label>
                                <input type="text" id="studentBarangay" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="Barangay">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm text-gray-600">Municipality/City</label>
                                <input type="text" id="studentMunicipality" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="Municipality/City">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm text-gray-600">Province</label>
                                <input type="text" id="studentProvince" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="Province">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm text-gray-600">Region</label>
                                <input type="text" id="studentRegion" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="Region">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Child’s Handedness</label>
                            <select id="studentHandedness" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 border outline-none appearance-none bg-white">
                                <option value="">Select Handedness</option>
                                <option value="right">Right</option>
                                <option value="left">Left</option>
                                <option value="both">Both (Ambidextrous)</option>
                                <option value="not_yet_established">Not yet established</option>
                            </select>
                        </div>
                        <div class="flex items-center space-x-6 pt-8">
                            <label class="text-sm font-semibold text-gray-700">Is the child presently studying?</label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" id="studentStudyingYes" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition">
                                <span class="text-sm font-medium text-gray-700">Yes</span>
                            </label>
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" id="studentStudyingNo" class="w-5 h-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition">
                                <span class="text-sm font-medium text-gray-700">No</span>
                            </label>
                        </div>
                    </div>

                    <div id="schoolNameField" class="space-y-2 hidden">
                        <label class="text-sm font-semibold text-gray-700">School / Learning Center / Day Care</label>
                        <input type="text" id="studentSchool" class="w-full border-gray-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition outline-none border" placeholder="School name">
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Family Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-900">Father’s Information</h3>
                        <div class="space-y-4">
                            <input type="text" id="fatherName" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Full Name">
                            <input type="number" id="fatherAge" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Age">
                            <input type="text" id="fatherOccupation" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Occupation">
                            <input type="text" id="fatherEducation" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Educational Attainment">
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-900">Mother’s Information</h3>
                        <div class="space-y-4">
                            <input type="text" id="motherName" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Full Name">
                            <input type="number" id="motherAge" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Age">
                            <input type="text" id="motherOccupation" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Occupation">
                            <input type="text" id="motherEducation" class="w-full border-gray-200 rounded-xl p-3 border outline-none" placeholder="Educational Attainment">
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 p-6 rounded-2xl grid grid-cols-1 md:grid-cols-2 gap-6 border border-blue-100">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-blue-900">Number of Siblings</label>
                        <input type="number" id="siblings" class="w-full border-blue-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 border outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-blue-900">Birth Order</label>
                        <input type="number" id="birthOrder" class="w-full border-blue-200 rounded-xl p-3 focus:ring-4 focus:ring-blue-500/10 border outline-none">
                    </div>
                </div>

                <!-- Photo Upload -->
                <div class="space-y-4">
                    <label class="text-sm font-semibold text-gray-700">Student Photo Identification</label>
                    <div class="flex items-center space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-32 h-32 rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden">
                                <img id="photoPreview" src="" class="hidden w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="flex-1">
                            <input type="file" id="photoInput" accept="image/*" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                            <p class="mt-2 text-xs text-gray-400">JPG, PNG or GIF. Max size 2MB.</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="pt-8 flex justify-end space-x-4">
                    <a href="{{ route('guardians.index') }}" 
                       class="px-8 py-4 text-gray-600 font-bold hover:text-gray-900 transition">Cancel</a>
                    <button type="button" id="saveBtn"
                            class="px-12 py-4 bg-green-600 text-white font-bold rounded-xl shadow-lg shadow-green-100 hover:bg-green-700 transition transform active:scale-95">
                        Save Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const formContainer = document.getElementById('form-container');
    const successMessage = document.getElementById('success-message');
    const saveBtn = document.getElementById('saveBtn');

    // Save Button - Show Success Message
    saveBtn.addEventListener('click', () => {
        formContainer.classList.add('hidden');
        successMessage.classList.remove('hidden');
        
        // Optional: Scroll to top smoothly
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Photo Preview
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                document.getElementById('photoPreview').src = ev.target.result;
                document.getElementById('photoPreview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Studying Checkbox Logic
    const yesBox = document.getElementById('studentStudyingYes');
    const noBox = document.getElementById('studentStudyingNo');
    const schoolField = document.getElementById('schoolNameField');

    yesBox.addEventListener('change', () => {
        if (yesBox.checked) {
            noBox.checked = false;
            schoolField.classList.remove('hidden');
        }
    });

    noBox.addEventListener('change', () => {
        if (noBox.checked) {
            yesBox.checked = false;
            schoolField.classList.add('hidden');
        }
    });
</script>
@endsection