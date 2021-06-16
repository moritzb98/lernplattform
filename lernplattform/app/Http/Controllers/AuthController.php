<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Badges;
use App\Models\BadgesUser;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    // Register function for sanctum
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',],
            'job' => ['nullable','string', 'max:255'],
            'age' => ['nullable', 'integer' , 'between:1,120'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'],),
            'job' => $request['job'],
            'age' => $request['age']
        ]);

        $accessToken = $user->createToken('cool_token')->accessToken;

        $badges = Badges::all();

        foreach($badges as $badge){
            BadgesUser::create([
                'user_id' => $user['id'],
                'badge_id' => $badge['id'],
                'achieved' => false
            ]);
        };

        return response([
            'user' => $user,
            'access_token' => $accessToken,
        ]);
    }

    public function update(Request $request) {

        $userid = Auth::user()->id;

        if($user['user_id'] == $userid){
            User::where('id', $request['id'])->update([
                'name' => $request['name'],
                'password' => $request['password'],
                'email' => $request['email'],
                'age' => $request['age'],
                'job' => $request['job'],

            ]);
            return response()->json(['´success' => 'Profil erfolgreich bearbeitet.'], 200);
        }
        else
        {
            return response()->json(['error' => 'Das ist nicht dein Profil, das kannst du nicht bearbeiten.'], 403);
        }

    }

    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'Logged Out'], 200);
    }

    public function getUser(Request $request){
        return User::where('id', $request['user_id'])->get();
    }
}
