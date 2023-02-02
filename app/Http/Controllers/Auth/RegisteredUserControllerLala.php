<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Activation;
use App\Models\Register;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'cif' => ['required', 'numeric'],
            'nip' => ['required', 'numeric'],
            'ttl' => ['required'],
            'noHp' => ['required', 'numeric'],
            'noKtp' => ['required', 'numeric'],
            'tipeHp' => ['required'],
            'statusAktivasi' => ['required'],
            'kodeUnik' => ['required'],
            'aksesAbsen' => ['required'],
            'aksesMpay' => ['required'],
            'aksesKpai' => ['required'],
            'aksesKunKer' => ['required'],
            'aksesListPekerjaan' => ['required'],

            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Activation::create([
            'cif' => $request->cif,
            'nip' => $request->nip,
            'ttl' => $request->ttl,
            'noHp' => $request->noHp,
            'noKtp' => $request->noKtp,
            'tipeHp' => $request->tipeHp,
            'statusAktivasi' => $request->statusAktivasi,
            'kodeUnik' => $request->kodeUnik,
            'aksesAbsen' => $request->aksesAbsen,
            'aksesMpay' => $request->aksesMpay,
            'aksesKpai' => $request->aksesKpai,
            'aksesKunKer' => $request->aksesKunKer,
            'aksesListPekerjaan' => $request->aksesListPekerjaan,
            // 'email' => $request->email,
            // 'password' => Hash::make($request->password),
        ]);
        dd($user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
