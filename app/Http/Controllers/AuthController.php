<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // REGISTER
   public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'message' => 'User registered successfully!',
        'user' => $user,
    ], 201);
}

    // LOGIN
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (! $user || ! \Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid login'], 401);
    }

    // Buat token
    $token = $user->createToken('flutter-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user
    ]);
}

}
