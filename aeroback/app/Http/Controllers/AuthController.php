<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|max:255|unique:users2',
            'LastName1' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:users2',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'userTypeId_fk' => 'required|integer', // Assuming this is the foreign key for user type
        ]);

        $user = User2::create([
            'userName' => $request->userName,
            'LastName1' => $request->userLastName1,
            'LastName2' => $request->userLastName2 ?? null, // Assuming this field is optional
            'Email' => $request->userEmail,
            'phone' => $request->userPhone,
            'password' => Hash::make($request->userPassword),
            'userTypeId_fk' => $request->userTypeId_fk,
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'userName' => 'required|string',
            'password' => 'required|string',
        ]);

        Log::info('Attempting login for userName: ' . $request->userName);

        // Recuperar el usuario por userName
        $user = User2::where('userName', $request->userName)->first();

        if (!$user) {
            Log::warning('User not found: ' . $request->userName);
            return response()->json(['message' => 'Invalid login details'], 401);
        }


        $passwordCheck = Hash::check($request->password, $user->password);
        // Log::warning('Password check for user: ' . $request->userName . '. Provided: ' . $request->password . ' Encrypted: ' . $user->password . ' Result: ' . ($passwordCheck ? 'Match' : 'Mismatch'));

        if (!$passwordCheck) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        // Autenticar al usuario
        Auth::login($user);

        Log::info('Login successful for user: ' . $request->userName);
        return response()->json(Auth::user());
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
