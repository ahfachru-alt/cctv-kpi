<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PasswordOtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordOtpController extends Controller
{
    public function requestOtp(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expires = now()->addMinutes(10);
        DB::table('password_otps')->insert([
            'email' => $validated['email'],
            'code' => $code,
            'expires_at' => $expires,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($user = User::where('email', $validated['email'])->first()) {
            $user->notify(new PasswordOtpNotification($code));
        }

        return back()->with('success', 'Kode OTP telah dikirim ke email.');
    }

    public function verifyOtp(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'code' => ['required', 'string', 'max:10'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $otp = DB::table('password_otps')
            ->where('email', $validated['email'])
            ->where('code', $validated['code'])
            ->whereNull('used_at')
            ->where('expires_at', '>', now())
            ->latest('id')->first();
        if (! $otp) {
            return back()->with('error', 'Kode OTP tidak valid atau kadaluarsa.');
        }
        DB::table('users')->where('email', $validated['email'])->update(['password' => Hash::make($validated['password'])]);
        DB::table('password_otps')->where('id', $otp->id)->update(['used_at' => now()]);

        return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}
