<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class User2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User2 $user2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User2 $user2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User2 $user2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User2 $user2)
    {
        //
    }

    public function login(Request $request)
    {
        $user = User2::where('userName', $request->userName)->first();
        if ($user && Hash::check($request->userPassword, $user->userPassword)) {
            return response()->json($user, 200);
        } else {
            return response()->json('Usuario o contraseña incorrectos', 401);
        }

    }
}
