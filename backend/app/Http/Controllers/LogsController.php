<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\User;

class LogsController extends Controller
{
    /**
     * Display a listing of logs with filters and search.
     */
    public function index(Request $request)
    {
        $query = Log::with('user')->latest();

        // Filter by user
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter by action (e.g., created, updated, deleted)
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        // Filter by entity type (e.g., Guardian, Child, ProgressRecord)
        if ($request->filled('entity_type')) {
            $query->where('entity_type', $request->entity_type);
        }

        // Filter by date range
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('created_at', [
                $request->from_date . ' 00:00:00',
                $request->to_date . ' 23:59:59'
            ]);
        }

        // Search in details
        if ($request->filled('search')) {
            $query->where('details', 'like', '%' . $request->search . '%');
        }

        $logs = $query->paginate(15)->withQueryString();

        // For dropdown filters (users list)
        $users = User::orderBy('email')->get();

        return view('logs.index', compact('logs', 'users'));
    }
}
