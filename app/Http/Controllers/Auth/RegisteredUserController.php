<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
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
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/[a-zA-Z]/', function ($attribute, $value, $fail) {
                if (strtolower($value) === 'admin') {
                    $fail('Nama ini dicadangkan dan tidak dapat digunakan.');
                }
            }],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class, function ($attribute, $value, $fail) {
                if (strtolower($value) === 'admin' || strpos(strtolower($value), 'admin@') === 0) {
                    $fail('Alamat email ini dicadangkan untuk sistem.');
                }
            }],
            'no_hp' => ['required', 'string', 'regex:/^08[0-9]{10,13}$/'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()],
        ], [
            'name.regex' => 'Username harus mengandung huruf.',
            'no_hp.regex' => 'Nomor HP harus diawali dengan 08 dan berjumlah 12-15 digit.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
