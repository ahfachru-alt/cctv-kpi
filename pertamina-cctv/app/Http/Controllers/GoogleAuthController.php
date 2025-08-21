<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GoogleAuthController extends Controller
{
    public function tokenLogin(Request $request)
    {
        $request->validate(['credential' => 'required|string']);

        // Verify ID token using Google public certs via tokeninfo endpoint
        $idToken = $request->string('credential');
        $json = @file_get_contents('https://oauth2.googleapis.com/tokeninfo?id_token='.urlencode($idToken));
        if (! $json) {
            return back()->withErrors(['google' => 'Invalid Google token']);
        }
        $payload = json_decode($json, true);
        if (! is_array($payload) || ($payload['aud'] ?? null) !== env('GOOGLE_CLIENT_ID')) {
            return back()->withErrors(['google' => 'Google token not for this app']);
        }

        $email = $payload['email'] ?? null;
        $name = $payload['name'] ?? ($payload['email'] ?? 'User');
        if (! $email) {
            return back()->withErrors(['google' => 'Google email missing']);
        }

        $user = User::firstOrCreate(
            ['email' => $email],
            ['name' => $name, 'password' => Hash::make(str()->random(32)), 'email_verified_at' => now()]
        );
        // Ensure base role
        try { $user->assignRole('user'); } catch (\Throwable $e) {}

        Auth::login($user, remember: true);
        return redirect()->route('dashboard');
    }
}
