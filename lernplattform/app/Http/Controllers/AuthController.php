<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    // Register function for sanctum
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3',],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'],),
        ]);

        $accessToken = $user->createToken('cool_token')->accessToken;
        return response([
            'user' => $user,
            'access_token' => $accessToken,
        ]);
    }

    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'Logged Out'], 200);
    }
}
