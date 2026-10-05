<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro | Biblioteca Virtual</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-body-tertiary">
    @include('layouts.navbar')


    <main class="container-fluid p-0">

        <div class="row g-0 min-vh-100">


            <div class="col-lg-6 d-none d-lg-block position-relative">

                <img
                    src="{{ asset('images/biblioteca.jpeg') }}"
                    class="w-100 h-100 position-absolute object-fit-cover"
                    alt="Biblioteca"
                >


                <div
                    class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"
                ></div>


                <div
                    class="position-absolute top-0 start-0 text-white d-flex align-items-center p-4"
                >

                    <div
                        class="bg-white text-danger rounded-3 d-flex justify-content-center align-items-center fw-bold me-3 p-2 fs-5"
                    >
                        ▮▮
                    </div>


                    <div>

                        <h6 class="fw-bold m-0">
                            SESI
                        </h6>

                        <small class="small">
                            CULTURA E CONHECIMENTO
                        </small>

                    </div>

                </div>



                <div
                    class="position-absolute bottom-0 start-0 text-white p-4"
                >

                    <hr class="border border-danger border-3 opacity-100 w-25 mb-3">


                    <h2 class="fw-bold mb-3">
                        Histórias que ampliam horizontes,<br>
                        sempre ao seu alcance.
                    </h2>


                    <p class="text-white-50 mb-0">

                        Explore livros, autores e novos caminhos de leitura
                        onde você estiver.

                    </p>

                </div>

            </div>




            <div
                class="col-12 col-lg-6 d-flex align-items-center justify-content-center p-4 p-md-5 bg-body-tertiary"
            >


                <section
                    class="bg-white rounded-4 shadow-sm p-4 p-md-5 w-100"
                >


                    <div class="d-flex align-items-center mb-4">

                        <div class="bg-danger text-white rounded-3 d-flex align-items-center justify-content-center me-3 fw-bold p-2 fs-5">
                            ▮▮
                        </div>


                        <div>

                            <h5 class="fw-bold m-0">
                                Biblioteca Virtual
                            </h5>

                            <small class="text-danger fw-semibold">
                                SESI
                            </small>

                        </div>

                    </div>



                    <h1 class="fw-bold fs-2 mb-2">
                        Crie sua conta
                    </h1>


                    <p class="text-secondary mb-4">
                        Comece agora sua jornada por novas histórias e descobertas.
                    </p>



                    <form
                        method="POST"
                        action="{{ route('register.submit') }}"
                    >

                        @csrf



                        <div class="mb-3">

                            <label
                                for="name"
                                class="form-label fw-semibold small"
                            >
                                Nome completo
                            </label>


                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control p-3 rounded-3 @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                placeholder="Como você gostaria de ser chamado"
                                autocomplete="name"
                                required
                            >


                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>




                        <div class="mb-3">

                            <label
                                for="email"
                                class="form-label fw-semibold small"
                            >
                                E-mail
                            </label>


                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control p-3 rounded-3 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="seuemail@exemplo.com"
                                autocomplete="email"
                                required
                            >


                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>




                        <div class="mb-3">

                            <label
                                for="password"
                                class="form-label fw-semibold small"
                            >
                                Senha
                            </label>


                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control p-3 rounded-3 @error('password') is-invalid @enderror"
                                placeholder="••••••••"
                                autocomplete="new-password"
                                required
                            >


                            @error('password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>




                        <div class="mb-4">

                            <label
                                for="password_confirmation"
                                class="form-label fw-semibold small"
                            >
                                Confirmar senha
                            </label>


                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-control p-3 rounded-3"
                                placeholder="••••••••"
                                autocomplete="new-password"
                                required
                            >

                        </div>




                        <button
                            type="submit"
                            class="btn btn-danger w-100 py-3 fw-bold rounded-3"
                        >
                            Cadastrar
                        </button>


                    </form>



                    <div class="text-center mt-4">

                        <small class="text-secondary">

                            Já possui uma conta?

                            <a
                                href="{{ route('welcome') }}"
                                class="text-danger text-decoration-none fw-semibold"
                            >
                                Entrar
                            </a>

                        </small>

                    </div>


                </section>


            </div>


        </div>

    </main>


</body>

</html>
