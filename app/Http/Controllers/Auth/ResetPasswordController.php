<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function show(string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
        ]);
    }

    public function handle()
    {
        request()->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $status = Password::reset(
            request(['email', 'password', 'password_confirmation', 'token']),
            // function ($user, $password) {
            //     $user->update(['password' => Hash::make($password)]);
            //     $user->setRememberToken(Str::random(60));
            // }
            function ($user, $password) {
                $user->update(['password' => Hash::make($password)]);
                $user->forceFill(['password' => Hash::make($password)]);
                $user->setRememberToken(Str::random(60));
                $user->save();
        });

        // Note: It's important to have protected $guarded = []; on your User model. 
        // If you use fillable fields instead, you should use this code in the callback:
        // function ($user, $password) {
        //     $user->update(['password' => Hash::make($password)]);
        //     $user->forceFill(['password' => Hash::make($password)]);
        //     $user->setRememberToken(Str::random(60));
        //     $user->save();
        // };

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Your password has been reset!')
            : back()->withErrors(['email' => 'This password reset token is invalid.']);
    }
}
