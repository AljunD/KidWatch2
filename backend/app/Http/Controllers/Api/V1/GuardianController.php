<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;

class GuardianController extends Controller
{
    // GET /guardian/profile
    public function profile(Request $request)
    {
        return response()->json($request->user()->guardian, 200);
    }

    // GET /guardian/children
    public function children(Request $request)
    {
        return response()->json($request->user()->guardian->children, 200);
    }

    // GET /guardian/children/{id}
    public function showChild(Request $request, $id)
    {
        $child = Child::where('guardian_id', $request->user()->guardian->id)
                      ->findOrFail($id);

        return response()->json($child, 200);
    }

    // GET /guardian/views
    public function views(Request $request)
    {
        $guardian = $request->user()->guardian;

        if (!$guardian) {
            return response()->json(['error' => 'Guardian profile not found'], 404);
        }

        // Load guardian with related children and their progress records/domains/scores
        $guardian->load([
            'children.progressRecords.teacher',
            'children.progressRecords.domains.domainResults',
            'children.progressRecords.domainScores'
        ]);

        return response()->json([
            'profile'  => $guardian,
            'children' => $guardian->children
        ], 200);
    }
}
