<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;

class ArchiveController extends Controller
{
    /**
     * Display a listing of archived guardians.
     */
    public function index()
    {
        // Fetch guardians that are soft deleted, include linked user (even if user is also soft deleted)
        $archivedGuardians = Guardian::onlyTrashed()
            ->with(['user' => function ($query) {
                $query->withTrashed(); // include soft-deleted users so their email shows
            }])
            ->paginate(10);

        return view('archives.index', compact('archivedGuardians'));
    }

    /**
     * Restore an archived guardian and linked user.
     */
    public function restore($id)
    {
        try {
            $guardian = Guardian::withTrashed()->findOrFail($id);

            // Restore guardian
            $guardian->restore();

            // Restore linked user if exists
            if ($guardian->user) {
                $guardian->user->restore();
            }

            return redirect()->route('archives.index')
                             ->with('success', 'Guardian and linked user restored successfully.');
        } catch (\Exception $e) {
            return redirect()->route('archives.index')
                             ->with('error', 'Failed to restore guardian. Please try again.');
        }
    }
}
