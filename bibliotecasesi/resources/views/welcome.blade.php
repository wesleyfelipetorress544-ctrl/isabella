<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca Virtual</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    @include('layouts.navbar')

    <div class="container-fluid p-0">

        <div class="row g-0 min-vh-100">

            <div class="col-lg-6 d-none d-lg-flex align-items-center position-relative">

                <img
                    src="{{ asset('images/biblioteca.jpeg') }}"
                    class="img-fluid vh-100 w-auto object-fit-contain"
                    alt="Biblioteca"
                >


            </div>

            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center p-4">

                <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 w-100">

                    <div class="d-flex align-items-center mb-5">

                        <div class="bg-danger text-white rounded-3 d-flex justify-content-center align-items-center me-3 p-2 fs-4">
                            <i class="bi bi-book-fill fs-4"></i>
                        </div>

                        <div>

                            <h5 class="fw-bold mb-0">
                                Biblioteca Virtual
                            </h5>

                            <small class="text-danger">
                                SESI
                            </small>

                        </div>

                    </div>

                    <h1 class="fw-bold fs-2 mb-2">
                        Bem-vindo à sua<br>
                        biblioteca!
                    </h1>

                    <p class="text-secondary mb-4">
                        Entre para continuar sua jornada de leitura.
                    </p>

                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">E-mail</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control p-3 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Senha</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control p-3"
                                autocomplete="current-password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-danger w-100 py-3 fw-bold rounded-3">
                            Entrar
                        </button>
                    </form>

                    <p class="text-center text-secondary mt-4 mb-0">
                        Ainda não tem uma conta?
                        <a href="{{ route('register') }}" class="text-danger fw-bold text-decoration-none">Cadastre-se</a>
                    </p>

                    <hr class="my-4">

                    <div class="text-center">

                        <small class="text-secondary">
                            Explore livros, autores e novas histórias.
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
