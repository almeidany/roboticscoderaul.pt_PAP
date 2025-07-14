<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Para onde redirecionar após login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';  // ajustei para seu /dashboard

    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('message', 'Foi desconectado com sucesso.');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Sobrescreve o método padrão login para incluir sua validação personalizada
    public function login(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        // Validação simples para a senha
        if (strlen($credenciais['password']) < 8) {
            return back()
                ->withErrors(['password' => 'A senha deve ter pelo menos 8 caracteres.'])
                ->withInput($request->only('email'));
        }

        // Tenta autenticar o usuário
        if (Auth::attempt($credenciais)) {
            return redirect()->intended($this->redirectTo);
        }

        // Verifica se o e-mail existe
        if (! $user = \App\Models\User::where('email', $credenciais['email'])->first()) {
            return back()
                ->withErrors(['email' => 'E-mail não encontrado.'])
                ->withInput($request->only('email'));
        }

        // Se o e-mail existe, mas senha está incorreta
        return back()
            ->withErrors(['password' => 'Senha incorreta.'])
            ->withInput($request->only('email'));
    }

    // Mostra o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
