<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
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
                return redirect()->route('admin.dashboard')->with('title', 'Codearena | Home');
            }
        }catch (Exception $e){
            return redirect()->route('admin.login')->with('error', $e->getMessage());
        }
        return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.dashboard');
    }
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
