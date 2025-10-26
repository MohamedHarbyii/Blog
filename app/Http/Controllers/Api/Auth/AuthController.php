<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\storeUserRequest;
use App\Http\Resources\UserResource;
use App\Mail\WelcomeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // Register API
    public function register(StoreUserRequest $request)
    {




        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),



        ]);

        $token = $user->createToken($request->name);
        Mail::to($user->email)->queue(new WelcomeUser($user));
        return ['data'=>new UserResource($user),'token'=>$token->plainTextToken];
    }

    // Login API
    public function login(Request $request)
    {
         $request->validate([
             'email' => 'required|string|email|exists:users,email',
             'password' => 'required|string',
         ]);



         $user = User::where('email', $request->email)->first();



//


        if (! $user || ! Hash::check($request->password, $user->password)) {
             return response()->json(['message'=>'wrong password'],401);
        }

        $token = $user->createToken($user->name);


        return response()->json([
            'data'=> [new UserResource($user),'token' => $token->plainTextToken]

        ]);
    }

    // Logout API
    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
    public function google_auth(Request $request)
    {
        return SocialiteController::loginOrRegister($request, 'google');
    }
}
