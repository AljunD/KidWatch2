<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // POST /guardian/login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        // Ensure only guardians can log in here
        if ($user->role !== 'guardian') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Create Sanctum token
        $token = $user->createToken('guardian-token')->plainTextToken;

        return response()->json([
            'token'    => $token,
            'guardian' => $user->guardian // guardian profile from guardians table
        ], 200);
    }

    // POST /guardian/logout
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out'], 200);
        }

        return response()->json(['error' => 'No active session'], 401);
    }

    // OPTIONAL: Logout everywhere (delete all tokens)
    public function logoutAll(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();
            return response()->json(['message' => 'Logged out from all devices'], 200);
        }

        return response()->json(['error' => 'No active session'], 401);
    }
}
