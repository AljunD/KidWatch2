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
        // Static view for now
        return view('guardians.index');

        // Later: $guardians = Guardian::all();
        // return view('guardians.index', compact('guardians'));
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
        // Static placeholder
        return redirect()->route('guardians.index')
                         ->with('success', 'Guardian created (static placeholder).');

        // Later: validate and save
        // $data = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'contact_number' => 'required|string|max:20',
        //     'address' => 'required|string|max:255',
        //     'email' => 'required|email|unique:guardians,email',
        // ]);
        // Guardian::create($data);
    }

    /**
     * Display the specified guardian.
     */
    public function show($id)
    {
        return view('guardians.show');

        // Later: $guardian = Guardian::findOrFail($id);
        // return view('guardians.show', compact('guardian'));
    }

    /**
     * Show the form for editing the specified guardian.
     */
    public function edit($id)
    {
        return view('guardians.edit');

        // Later: $guardian = Guardian::findOrFail($id);
        // return view('guardians.edit', compact('guardian'));
    }

    /**
     * Update the specified guardian in storage.
     */
    public function update(Request $request, $id)
    {
        // Static placeholder
        return redirect()->route('guardians.index')
                         ->with('success', 'Guardian updated (static placeholder).');

        // Later: validate and update
        // $data = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'contact_number' => 'required|string|max:20',
        //     'address' => 'required|string|max:255',
        //     'email' => 'required|email|unique:guardians,email,' . $id,
        // ]);
        // $guardian = Guardian::findOrFail($id);
        // $guardian->update($data);
    }

    /**
     * Soft delete the specified guardian.
     */
    public function destroy($id)
    {
        // Static placeholder
        return redirect()->route('guardians.index')
                         ->with('success', 'Guardian soft deleted (static placeholder).');

        // Later: soft delete
        // $guardian = Guardian::findOrFail($id);
        // $guardian->delete(); // with SoftDeletes trait, this sets deleted_at
    }
    /**
     * Show the form for creating a child linked to the specified guardian.
     */
    public function createChild($id)
    {
        // Static placeholder
        return view('guardians.create-child');

        // Later: $guardian = Guardian::findOrFail($id);
        // return view('guardians.create-child', compact('guardian'));
    }
}
