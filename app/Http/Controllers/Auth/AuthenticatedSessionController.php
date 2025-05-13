<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        // dd($request->all());
        try {
            $request->session()->regenerate();
            activity()
                ->useLog(Auth::user()->role->slug)
                ->causedBy(Auth::user())
                ->withProperties(['ip' => $request->ip()])
                ->event('Login')
                ->log('Login Melalui Website');
            if (Auth::user()->role_id == 1) {
                if (Auth::user()->status == 0) {
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->with('error', 'Akun anda tidak Aktif!')->withInput();
                } else {
                    return to_route('admin.dashboard');
                }
            } else if (Auth::user()->role_id == 2) {
                if (Auth::user()->status == 0) {
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->with('error', 'Akun anda tidak Aktif!')->withInput();
                } else {
                    return to_route('admin.dashboard');
                }
            } else if (Auth::user()->role_id == 3) {
                if (Auth::user()->status == 0) {
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->with('error', 'Akun anda tidak Aktif!')->withInput();
                } else {
                    return to_route('store.dashboard');
                }
            } else {
                return to_route('login')->with('error', 'Akun anda tidak ditemukan!')->withInput();
            }
        } catch (\Throwable $th) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return back()->with('error', 'Akun anda tidak ditemukan!')->withInput();
        }

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
