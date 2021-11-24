<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function handle(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // $success = auth()->attempt([
        //     'email' => request('email'),
        //     'password' => request('password')
        // ], request()->has('remember'));

        // if($success) {
        //     return redirect()->to(RouteServiceProvider::HOME);
        // }

        if (Auth::attempt($credentials, request()->has('remember'))) {
            $request->session()->regenerate();
            // return redirect()->intended('home');
            return redirect()->to(RouteServiceProvider::HOME);
        }

        return back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
            // 'password' => Lang::get('auth.failed'),
        ]);
        
    }
}
