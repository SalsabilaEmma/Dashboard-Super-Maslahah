<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class AuthenticatedSessionController extends Controller
{

    protected $redirectTo = '/dashboard';
    protected function redirectTo()
    {
        if (auth()->user()->role == 'Admin') {
            if (auth()->user()->status == '1') {
                // return '/dashboard';
                return route('dashboard');
            }
        }
        return '/';
    }
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
        // dd($request->all());
        $captcha = $request->captcha;
        $sess_index = Session::get('data_recapt');
        if ($captcha == $sess_index) {
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return redirect()->back()->with('error', 'Captcha Salah!');

        // if (Auth::user()->role == 'Admin') {
        //     return redirect()->intended(route('dashboard'));
        // } elseif (Auth::user()->role == 'Super Admin') {
        //     return redirect()->intended(route('user.suma'));
        // }
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
