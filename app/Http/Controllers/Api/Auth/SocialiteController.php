<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class SocialiteController extends Controller
{
    /************************************************
     $driver: is the provider the u will sign in for
     *************************************************/
    public static function loginOrRegister(Request $request,$driver)
    {
        self::validateProvider($driver);
        $request->validate([
            'token' => 'required',
        ]);


        try {
            // نجيب بيانات المستخدم من Google باستخدام التوكن اللي جاينا من الفرونت
            $User = Socialite::driver($driver)->stateless()->userFromToken($request->token);

            // نشوف لو المستخدم موجود
            $user = User::where('email', $User->getEmail())->first();

            if (!$user) {
                // لو جديد نسجله
                $user = User::create([
                    'name' => $User->getName(),
                    'email' => $User->getEmail(),
                    'google_id' => $User->getId(),
                    'password' => bcrypt(str()->random(12)),
                ]);
            }

            // لو عندك sanctum أو passport
            $token = $user->createToken($user->name)->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => new UserResource($user),
                'token' => $token,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Invalid Google token',
                'details' => $e->getMessage(),
            ], 401);
        }
    }
    protected static function validateProvider($provider)
    {
        // ضيف هنا أي provider جديد بتدعمه
        if (!in_array($provider, ['google']))
        {
            throw ValidationException::withMessages([
                'provider' => 'Provider not supported.',
            ]);
        }
    }
}
