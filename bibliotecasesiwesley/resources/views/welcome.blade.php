@extends('layouts.auth')

@section('title', 'Entrar | Biblioteca Sesi-Tatuí')

@section('content')
    <h1 class="display-5 fw-bold mb-2">Bem-vindo(a)</h1>
    <p class="fs-4 text-secondary mb-4">Identifique-se para entrar na Biblioteca Sesi-Tatuí</p>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <div class="mb-3">
            <label for="cpf" class="form-label fw-semibold">CPF</label>
            <input class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" type="text" inputmode="numeric" autocomplete="username" placeholder="Somente números" value="{{ old('cpf') }}" required autofocus>
            @error('cpf') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Senha</label>
            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" autocomplete="current-password" placeholder="Insira sua senha" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1">
                <label class="form-check-label" for="remember">Lembrar-me</label>
            </div>
            <span class="small text-secondary">Esqueceu a senha? Fale com a biblioteca.</span>
        </div>
        <button class="btn btn-danger w-100" type="submit" style="--bs-btn-bg: #ed1c24; --bs-btn-border-color: #ed1c24; --bs-btn-hover-bg: #ed1c24; --bs-btn-hover-border-color: #ed1c24; --bs-btn-active-bg: #ed1c24; --bs-btn-active-border-color: #ed1c24; --bs-btn-focus-shadow-rgb: 237, 28, 36;">Entrar</button>
    </form>

    <p class="text-center mt-4 mb-2">Ainda não tem cadastro? <a href="{{ route('register') }}" class="link-danger">Criar conta</a></p>
    <p class="text-center small mb-0"><a href="{{ route('admin.login') }}" class="link-secondary text-decoration-none"><i class="bi bi-shield-lock me-1" aria-hidden="true"></i>Acesso de administrador</a></p>
@endsection





