<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;  // Add this line to import Str facade
use Google_Client;
use Exception;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        // Redirecting the user to Google OAuth page
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleToken(Request $request)
    {
        $token = $request->token;

        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);

        try {
            $payload = $client->verifyIdToken($token);

            if ($payload) {
                $googleId = $payload['sub']; 
                $email = $payload['email'];
                $user = User::where('email', $email)->first();

                if (!$user) {
                    $user = User::create([
                        'firstname' => $payload['given_name'],
                        'lastname' => $payload['family_name'],
                        'email' => $email,
                        'google_id' => $googleId,
                        'password' => bcrypt(Str::random(8)),  // Generate a random password or use another strategy
                    ]);
                }
                Auth::login($user);
                return response()->json(['success' => true, 'token' => $user->createToken('YourAppName')->plainTextToken]);

            } else {
                return response()->json(['error' => 'Invalid Google token'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Google login failed', 'message' => $e->getMessage()], 500);
        }
    }
}
