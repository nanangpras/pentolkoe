<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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
        return view('auth.login-new');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $url = $request->url;

        if (Auth::user() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }elseif(Auth::user() && Auth::user()->role == 'user'){
            if ($url) {
                return redirect()->to($url);
            }else{
                return redirect()->route('member.dashboard');
            }
        }else{
            Auth::guard('web')->logout();
            // return redirect()->route('login')->with('status','You are not authorized to access this page');
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        // return redirect()->intended(RouteServiceProvider::HOME);

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
