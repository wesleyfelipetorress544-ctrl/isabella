<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
class AdminAuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check() && Auth::user()->is_admin) { return redirect()->route('reports.index'); }
        return view('auth.admin-login');
    }
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate(['cpf' => ['required', 'string'], 'password' => ['required', 'string']]);
        $credentials['cpf'] = preg_replace('/\D+/', '', $credentials['cpf']);
        $credentials['is_admin'] = true;
        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['cpf' => 'CPF ou senha de administrador inválidos.'])->onlyInput('cpf');
        }
        $request->session()->regenerate();
        return redirect()->intended(route('reports.index'));
    }
}