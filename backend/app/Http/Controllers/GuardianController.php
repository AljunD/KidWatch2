<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianController extends Controller
{
    /**
     * Display a listing of guardians.
     */
    public function index()
    {
        $guardians = Guardian::with('childs')->paginate(10);

        return view('guardians.index', compact('guardians'));
    }

    /**
     * Show the form for creating a new guardian.
     */
    public function create()
    {
        return view('guardians.create');
    }

    /**
     * Store a newly created guardian in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'             => 'required|string|max:255',
            'middle_name'            => 'nullable|string|max:255',
            'last_name'              => 'required|string|max:255',
            'sex'                    => 'required|string|max:10',
            'contact_number'         => 'required|string|max:20',
            'address'                => 'required|string|max:500',
            'relationship_to_child'  => 'required|string|max:255',
        ]);

        $guardian = Guardian::create($data);

        // Log creation
        recordLog('created', 'Guardian', $guardian->id, 'Guardian created: ' . $guardian->first_name . ' ' . $guardian->last_name);

        return redirect()->route('guardians.index')
                         ->with('success', 'Guardian created successfully.');
    }

    /**
     * Display the specified guardian.
     */
    public function show($id)
    {
        $guardian = Guardian::with('childs')->findOrFail($id);

        return view('guardians.show', compact('guardian'));
    }

    /**
     * Show the form for editing the specified guardian.
     */
    public function edit($id)
    {
        $guardian = Guardian::findOrFail($id);

        return view('guardians.edit', compact('guardian'));
    }

    /**
     * Update the specified guardian in storage.
     */
    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $data = $request->validate([
            'first_name'             => 'required|string|max:255',
            'middle_name'            => 'nullable|string|max:255',
            'last_name'              => 'required|string|max:255',
            'sex'                    => 'required|string|max:10',
            'contact_number'         => 'required|string|max:20',
            'address'                => 'required|string|max:500',
            'relationship_to_child'  => 'required|string|max:255',
        ]);

        $guardian->update($data);

        // Log update
        recordLog('updated', 'Guardian', $guardian->id, 'Guardian updated: ' . $guardian->first_name . ' ' . $guardian->last_name);

        return redirect()->route('guardians.index')
                         ->with('success', 'Guardian updated successfully.');
    }

    /**
     * Soft delete the specified guardian and linked user.
     */
    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);

        $guardian->delete();

        if ($guardian->user) {
            $guardian->user->delete();
        }

        // Log deletion
        recordLog('deleted', 'Guardian', $guardian->id, 'Guardian archived: ' . $guardian->first_name . ' ' . $guardian->last_name);

        return redirect()->route('guardians.index')
                         ->with('success', 'Guardian and linked user archived successfully.');
    }

    /**
     * Show the form for creating a child linked to the specified guardian.
     */
    public function createChild($id)
    {
        $guardian = Guardian::findOrFail($id);

        return view('guardians.create-child', compact('guardian'));
    }

    /**
     * Show the archive child preview page (static).
     */
    public function archiveChild()
    {
        return view('guardians.archive-child');
    }
}
