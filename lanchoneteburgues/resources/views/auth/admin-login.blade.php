<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#111">
    <title>Entrar no painel | Burguês</title>
    <link rel="icon" type="image/png" href="{{ asset('logoburguer.png') }}">
    <style>
        *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;padding:24px;background:#111;color:#171717;font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif}.login-card{width:min(100%,430px);padding:34px;border-radius:18px;background:#fff;box-shadow:0 20px 60px #0005}.login-logo{display:block;width:112px;height:76px;object-fit:contain;margin:0 auto 14px}.login-card h1{margin:0;text-align:center;font-size:25px}.login-intro{text-align:center;color:#686c75;margin:8px 0 24px}.field{margin-bottom:16px}.field label{display:block;margin-bottom:6px;font-weight:700;font-size:14px}.field input{width:100%;height:46px;border:1px solid #d9dce2;border-radius:9px;padding:0 12px;font:inherit}.field input:focus{outline:3px solid #ffd21a55;border-color:#d7a800}.field-error{display:block;margin-top:5px;color:#b42318;font-size:13px}.login-button{width:100%;height:46px;border:0;border-radius:9px;background:#ffd21a;color:#111;font:inherit;font-weight:700;cursor:pointer}.back-link{display:block;margin-top:18px;text-align:center;color:#555;font-size:13px;text-decoration:none}.back-link:hover{text-decoration:underline}
    </style>
</head>
<body>
    <main class="login-card">
        <img class="login-logo" src="{{ asset('logoburguer.png') }}" alt="Burguês">
        <h1>Painel administrativo</h1>
        <p class="login-intro">Entre com sua conta de administrador.</p>
        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf
            <div class="field">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
                @error('email')<small class="field-error">{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label for="password">Senha</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>
                @error('password')<small class="field-error">{{ $message }}</small>@enderror
            </div>
            <button class="login-button" type="submit">Entrar</button>
        </form>
        <a class="back-link" href="{{ route('home') }}">Voltar para a loja</a>
    </main>
</body>
</html>
