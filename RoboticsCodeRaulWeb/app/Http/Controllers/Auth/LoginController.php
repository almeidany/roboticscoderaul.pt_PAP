<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Mostra o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o login (método simplificado)
    public function login(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (strlen($credenciais['password']) < 8) {
            return back()
                ->withErrors(['password' => 'A senha deve ter pelo menos 8 caracteres.'])
                ->withInput($request->only('email'));
        }

        if (Auth::attempt($credenciais)) {
            return redirect()->intended('/dashboard');
        }

        // Aqui verifica se o e-mail existe (opcional)
        if (!$user = \App\Models\User::where('email', $credenciais['email'])->first()) {
            return back()
                ->withErrors(['email' => 'E-mail não encontrado.'])
                ->withInput($request->only('email'));
        }

        // Se o e-mail existe, mas a senha está errada
        return back()
            ->withErrors(['password' => 'Senha incorreta.'])
            ->withInput($request->only('email'));
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
