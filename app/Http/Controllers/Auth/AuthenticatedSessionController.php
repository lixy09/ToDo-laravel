<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
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
        $attemptsKey = 'login|' . $request->ip();
        $maxAttempts = config('auth.login_max_attempts', env('LOGIN_MAX_ATTEMPTS', 3));

        try {
            $request->authenticate();
            RateLimiter::clear($attemptsKey);
        } catch (\Throwable $e) {
            RateLimiter::hit($attemptsKey);
            $remainingAttempts = $maxAttempts - RateLimiter::attempts($attemptsKey);
            return back()->withErrors(['password' => 'The provided credentials do not match our records.'])
                ->with('remainingAttempts', $remainingAttempts);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('tasks.index', absolute: false));
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
