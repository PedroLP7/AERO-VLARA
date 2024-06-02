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
            'userTypeId_fk' => 'required|integer',
        ]);

        $user = User2::create([
            'userName' => $request->userName,
            'LastName1' => $request->LastName1,
            'LastName2' => $request->LastName2 ?? null,
            'Email' => $request->Email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
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

        $user = User2::where('userName', $request->userName)->first();

        if (!$user) {
            Log::warning('User not found: ' . $request->userName);
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            Log::warning('Invalid password for user: ' . $request->userName);
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        $token = $user->createToken('MyAppToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }




public function logout(Request $request)
{
    Log::info('Attempting logout for user:', ['user' => $request->user()]);
    // Verificar si hay un usuario autenticado
    if (Auth::guard('sanctum')->check()) {
        // Invalidar todos los tokens del usuario
        $user = $request->user();
        $user->tokens()->delete();

        Log::info('User logged out:', ['user' => $user]);

        return response()->json(['message' => 'Successfully logged out']);
    } else {
        // El usuario no está autenticado, probablemente ya esté desconectado
        return response()->json(['message' => 'User is not authenticated'], 401);
    }
}





    public function user(Request $request)
    {
        Log::info('Authenticated user:', ['user' => Auth::user()]);
        return response()->json(Auth::user());
    }
}
