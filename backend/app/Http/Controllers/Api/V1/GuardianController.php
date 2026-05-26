<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class GuardianController extends Controller
{
    // GET /guardian/profile
    public function profile(Request $request)
    {
        return response()->json($request->user()->guardian, 200);
    }

    // GET /guardian/students
    public function students(Request $request)
    {
        return response()->json($request->user()->guardian->students, 200);
    }

    // GET /guardian/students/{id}
    public function showStudent(Request $request, $id)
    {
        $student = Student::where('guardian_id', $request->user()->guardian->id)
                          ->findOrFail($id);

        return response()->json($student, 200);
    }

    // GET /guardian/views
    public function views(Request $request)
    {
        $guardian = $request->user()->guardian;

        if (!$guardian) {
            return response()->json(['error' => 'Guardian profile not found'], 404);
        }

        // Load guardian with related students and their progress records/domains/scores
        $guardian->load([
            'students.progressRecords.teacher',
            'students.progressRecords.domains.domainResults',
            'students.progressRecords.domainScores'
        ]);

        return response()->json([
            'profile'  => $guardian,
            'students' => $guardian->students
        ], 200);
    }
}
