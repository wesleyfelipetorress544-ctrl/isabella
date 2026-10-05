<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca Virtual</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-white text-dark">

    @include('layouts.navbar')
    {{--
    <nav class="navbar navbar-expand-lg bg-white py-3 shadow-sm text-dark">

        <div class="container">


            <a
                class="navbar-brand d-flex align-items-center"
                href="{{ url('/pagina1') }}"
            >

                <div>

                    <h6 class="fw-bold m-0">
                        Biblioteca Virtual
                    </h6>

                    <small class="text-danger">
                        SESI
                    </small>

                </div>

            </a>



            <div class="d-flex align-items-center gap-4 text-dark">

                <a
                    href="{{ url('/pagina1') }}"
                    class="text-danger text-decoration-none fw-bold"
                >
                    Início
                </a>

                <a
                    href="{{ route('catalog') }}"
                    class="text-secondary text-decoration-none"
                >
                    Catálogo
                </a>

                <a
                    href="#minha-estante"
                    class="text-secondary text-decoration-none"
                >
                    Minha Estante
                </a>

                <a
                    href="#"
                    class="text-secondary text-decoration-none"
                >
                    Comunidade
                </a>

            </div>



            <div class="d-flex align-items-center text-dark">

                <div
                    class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2 p-2"
                >
                    👤
                </div>

                <div>

                    <a href="{{ route('profile') }}" class="link-dark text-decoration-none fw-bold small">
                        {{ auth()->user()->name }}
                    </a>

                    <small class="text-secondary">
                        {{ $favorites->count() }} favoritos
                    </small>

                </div>

                <form method="POST" action="{{ route('logout') }}" class="ms-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Sair</button>
                </form>

            </div>


        </div>

    </nav>
    --}}




    <section class="bg-dark text-white" style="--bs-dark-rgb: 50, 23, 25;">

        <div class="container-fluid p-0">

            <div class="row g-0 align-items-center">


                <div class="col-lg-6">

                    <div class="p-5 text-white">


                        <small class="text-danger fw-bold">
                            SUA PRÓXIMA HISTÓRIA COMEÇA AQUI
                        </small>


                        <h1 class="display-5 fw-bold mt-3 mb-3">
                            Olá! Que tal encontrar<br>
                            sua próxima leitura?
                        </h1>


                        <p class="text-white-50 mb-4">

                            Descubra novos autores, revisite clássicos
                            e leve sua biblioteca com você.

                        </p>


                        <form method="GET" action="{{ route('catalog') }}" class="bg-white p-2 rounded-3 d-flex w-100">

                            <input
                                type="search"
                                name="q"
                                class="form-control border-0 shadow-none"
                                placeholder="Pesquise por título, autor ou categoria..."
                            >

                            <button
                                class="btn btn-danger px-4 ms-2"
                            >
                                Buscar
                            </button>

                        </form>


                    </div>

                </div>




                <div class="col-lg-6">

                    <img
                        src="{{ asset('images/biblioteca.jpeg') }}"
                        class="img-fluid w-100 object-fit-cover"
                        alt="Biblioteca"
                    >

                </div>


            </div>

        </div>

    </section>




    <section
        class="py-5"
        id="catalogo"
    >

        <div class="container">


            <div
                class="d-flex justify-content-between align-items-end mb-4"
            >

                <div>

                    <small class="text-danger fw-bold">
                        CURADORIA SESI
                    </small>

                    <h2 class="fw-bold mt-2 mb-1">
                        Livros em destaque
                    </h2>

                    <p class="text-secondary mb-0">
                        Algumas histórias selecionadas para você.
                    </p>

                </div>


                <a
                    href="{{ route('catalog') }}"
                    class="text-danger text-decoration-none fw-bold"
                >
                    Ver todos →
                </a>

            </div>




            <form method="POST" action="{{ route('favorites.store') }}" class="d-flex gap-2 flex-wrap mb-4">
                @csrf
                <label for="book_key" class="visually-hidden">Escolha um livro para favoritar</label>
                <select id="book_key" name="book_key" class="form-select w-auto" required>
                    <option value="">Escolha um livro para favoritar</option>
                    @foreach ($books as $bookKey => $book)
                        @unless ($favoriteKeys->contains($bookKey))
                            <option value="{{ $bookKey }}">{{ $book['title'] }}</option>
                        @endunless
                    @endforeach
                </select>
                <button type="submit" class="btn btn-danger">Adicionar aos favoritos</button>
            </form>
            @if (session('status'))
                <p class="text-success small">{{ session('status') }}</p>
            @endif
            @error('book_key')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            <div class="row g-4">



                <div class="col-6 col-md-4 col-lg">

                    <div>


                        <div
                            class="bg-white rounded-4 p-3 shadow-sm position-relative"
                        >

                            <a href="{{ route('books.show', 'torto-arado') }}" class="d-block">
                            <img
                                src="{{ asset('images/tortoarado.jpg') }}"
                                class="w-100 rounded-3 object-fit-contain"
                                alt="Torto Arado"
                            >
                            </a>


                            <span
                                class="position-absolute top-0 start-0 bg-danger text-white rounded-pill px-3 py-1 m-3"
                            >
                                DESTAQUE
                            </span>

                        </div>



                        <p
                            class="text-danger fw-bold mt-3 mb-1"
                        >
                            LITERATURA BRASILEIRA
                        </p>


                        <h5
                            class="fw-bold mb-1"
                        >
                            <a href="{{ route('books.show', 'torto-arado') }}" class="text-dark text-decoration-none">Torto Arado</a>
                        </h5>


                        <small class="text-secondary">
                            Itamar Vieira Junior
                        </small>


                        <p class="mt-2 mb-0">
                            <a href="{{ route('books.show', 'torto-arado') }}" class="text-danger text-decoration-none">Ver avaliações &rarr;</a>
                        </p>


                    </div>

                </div>




                <div class="col-6 col-md-4 col-lg">

                    <div>


                        <div
                            class="bg-white rounded-4 p-3 shadow-sm"
                        >

                            <a href="{{ route('books.show', 'a-hora-da-estrela') }}" class="d-block">
                            <img
                                src="{{ asset('images/estrela.png') }}"
                                class="w-100 rounded-3 object-fit-contain"
                                alt="A Hora da Estrela"
                            >
                            </a>

                        </div>



                        <p
                            class="text-danger fw-bold mt-3 mb-1"
                        >
                            FICÇÃO
                        </p>


                        <h5
                            class="fw-bold mb-1"
                        >
                            <a href="{{ route('books.show', 'a-hora-da-estrela') }}" class="text-dark text-decoration-none">A Hora da Estrela</a>
                        </h5>


                        <small class="text-secondary">
                            Clarice Lispector
                        </small>


                        <p class="mt-2 mb-0">
                            <a href="{{ route('books.show', 'a-hora-da-estrela') }}" class="text-danger text-decoration-none">Ver avaliações &rarr;</a>
                        </p>


                    </div>

                </div>




                <div class="col-6 col-md-4 col-lg">

                    <div>


                        <div
                            class="bg-white rounded-4 p-3 shadow-sm"
                        >

                            <a href="{{ route('books.show', 'cem-anos-de-solidao') }}" class="d-block">
                            <img
                                src="{{ asset('images/cemanos.jpg') }}"
                                class="w-100 rounded-3 object-fit-contain"
                                alt="Cem Anos de Solidão"
                            >
                            </a>

                        </div>



                        <p
                            class="text-danger fw-bold mt-3 mb-1"
                        >
                            REALISMO MÁGICO
                        </p>


                        <h5
                            class="fw-bold mb-1"
                        >
                            <a href="{{ route('books.show', 'cem-anos-de-solidao') }}" class="text-dark text-decoration-none">Cem Anos de Solidão</a>
                        </h5>


                        <small class="text-secondary">
                            Gabriel García Márquez
                        </small>


                        <p class="mt-2 mb-0">
                            <a href="{{ route('books.show', 'cem-anos-de-solidao') }}" class="text-danger text-decoration-none">Ver avaliações &rarr;</a>
                        </p>


                    </div>

                </div>




                <div class="col-6 col-md-4 col-lg">

                    <div>


                        <div
                            class="bg-white rounded-4 p-3 shadow-sm"
                        >

                            <a href="{{ route('books.show', 'o-pequeno-principe') }}" class="d-block">
                            <img
                                src="{{ asset('images/pequenoprincipe.jpg') }}"
                                class="w-100 rounded-3 object-fit-contain"
                                alt="O Pequeno Príncipe"
                            >
                            </a>

                        </div>



                        <p
                            class="text-danger fw-bold mt-3 mb-1"
                        >
                            CLÁSSICO
                        </p>


                        <h5
                            class="fw-bold mb-1"
                        >
                            <a href="{{ route('books.show', 'o-pequeno-principe') }}" class="text-dark text-decoration-none">O Pequeno Príncipe</a>
                        </h5>


                        <small class="text-secondary">
                            Antoine de Saint-Exupéry
                        </small>


                        <p class="mt-2 mb-0">
                            <a href="{{ route('books.show', 'o-pequeno-principe') }}" class="text-danger text-decoration-none">Ver avaliações &rarr;</a>
                        </p>


                    </div>

                </div>




                <div class="col-6 col-md-4 col-lg">

                    <div>


                        <div
                            class="bg-white rounded-4 p-3 shadow-sm"
                        >

                            <a href="{{ route('books.show', 'dom-casmurro') }}" class="d-block">
                            <img
                                src="{{ asset('images/domcasmurro.jpg') }}"
                                class="w-100 rounded-3 object-fit-contain"
                                alt="Dom Casmurro"
                            >
                            </a>

                        </div>



                        <p
                            class="text-danger fw-bold mt-3 mb-1"
                        >
                            CLÁSSICO BRASILEIRO
                        </p>


                        <h5
                            class="fw-bold mb-1"
                        >
                            <a href="{{ route('books.show', 'dom-casmurro') }}" class="text-dark text-decoration-none">Dom Casmurro</a>
                        </h5>


                        <small class="text-secondary">
                            Machado de Assis
                        </small>


                        <p class="mt-2 mb-0">
                            <a href="{{ route('books.show', 'dom-casmurro') }}" class="text-danger text-decoration-none">Ver avaliações &rarr;</a>
                        </p>


                    </div>

                </div>


            </div>

        </div>

    </section>




    

    <section class="bg-white text-dark py-5">

        <div class="container">

            <div class="row align-items-center">


                <div class="col-md-8">

                    <small class="text-danger fw-bold">
                        CONTINUE EXPLORANDO
                    </small>


                    <h2
                        class="fw-bold mt-2"
                    >
                        Sempre existe uma nova história esperando por você.
                    </h2>


                    <p class="text-secondary mb-0">
                        Explore nosso catálogo e encontre sua próxima leitura.
                    </p>

                </div>



                <div class="col-md-4 text-md-end mt-4 mt-md-0">

                    <a
                        href="{{ route('catalog') }}"
                        class="btn btn-danger px-4 py-3"
                    >
                        Explorar catálogo
                    </a>

                </div>


            </div>

        </div>

    </section>




    <footer class="py-4">

        <div class="container">

            <div
                class="d-flex justify-content-between align-items-center"
            >

                <div>

                    <strong>
                        Biblioteca Virtual
                    </strong>

                    <span class="text-danger ms-1">
                        SESI
                    </span>

                </div>


                <small class="text-secondary">
                    Sua biblioteca, onde você estiver.
                </small>

            </div>

        </div>

    </footer>


</body>

</html>
