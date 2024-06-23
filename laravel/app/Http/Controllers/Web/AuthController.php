<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('pages.sign-in-static');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('inicio');
        }
        return redirect()->route('sign-in')->withErrors(['email' => 'Credenciales no válidas']);
    }

    public function signUp()
    {
        return view('pages.sign-up-static');
    }

    public function createAccount(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Asegúrate de encriptar la contraseña
        $user->api_personal_token = Str::random(60); // Generar un token aleatorio
        $user->save();
        $user->assignRole('invitado');

        Auth::login($user, true);

        return redirect()->route('inicio');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('sign-in');
    }
}
