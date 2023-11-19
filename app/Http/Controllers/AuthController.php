<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login-register');
    }

    public function login(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try{
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $validated['email'] = strtolower($validated['email']);
            if (auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
                $request->session()->put('expires_at', now()->addMinutes(60 * 24 * 7));
                $request->session()->regenerate();
                return redirect('/')->route('home')->with('title', 'Codearena | Home');
            }
        }catch (Exception $e){
            return redirect()->route('login')->with('error', $e->getMessage());
        }
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function register(Request $request): RedirectResponse
    {

        try {
            $validated = $request->validate([
                'name' => 'required|max:255',
                "email" => 'required|unique:users|email',
                "password" => 'required|min:6',
                "confirm_password" => 'required|same:password'
            ]);
            $validated['password'] = Hash::make($validated['password']);
            $validated['role'] = 'user';
            User::create($validated);
            return redirect()->route('login')->with('success', 'Account created successfully. Login now!');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
