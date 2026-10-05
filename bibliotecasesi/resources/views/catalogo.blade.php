<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo | Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    @include('layouts.navbar')
    {{--
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
        <div class="container">
            <a href="{{ route('pagina1') }}" class="navbar-brand d-flex align-items-center gap-2">
                <span class="bg-danger text-white rounded-3 p-2"><i class="bi bi-book-half"></i></span>
                <span class="fw-bold small">Biblioteca Virtual<small class="d-block text-danger">SESI</small></span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('pagina1') }}" class="link-secondary text-decoration-none small">Início</a>
                <a href="{{ route('catalog') }}" class="link-danger text-decoration-none small fw-semibold">Catálogo</a>
                <a href="{{ route('pagina1') }}#minha-estante" class="link-secondary text-decoration-none small d-none d-md-inline">Minha Estante</a>
                <a href="{{ route('profile') }}" class="small fw-semibold text-dark text-decoration-none d-none d-sm-inline">{{ auth()->user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Sair</button>
                </form>
            </div>
        </div>
    </nav>
    --}}

    <header class="bg-dark text-white py-5">
        <div class="container">
            <p class="small text-uppercase text-white-50 fw-semibold mb-2">Explore a biblioteca</p>
            <h1 class="display-5 fw-bold">Encontre sua próxima leitura</h1>
            <p class="text-white-50 col-lg-7">Pesquise entre os títulos, autores e gêneros disponíveis no catálogo.</p>

            <form method="GET" action="{{ route('catalog') }}" class="input-group input-group-lg mt-4">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input
                    type="search"
                    name="q"
                    value="{{ $search }}"
                    class="form-control border-start-0"
                    placeholder="Busque por título, autor ou gênero..."
                    aria-label="Buscar no catálogo"
                >
                @foreach ($selectedGenres as $genre)
                    <input type="hidden" name="genre[]" value="{{ $genre }}">
                @endforeach
                <input type="hidden" name="sort" value="{{ $sort }}">
                <button class="btn btn-danger px-4" type="submit">Buscar</button>
            </form>
        </div>
    </header>

    <main class="container py-5">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <h2 class="h3 fw-bold mb-1">Catálogo completo</h2>
                <p class="text-secondary small mb-0">{{ $books->count() }} {{ $books->count() === 1 ? 'livro encontrado' : 'livros encontrados' }}</p>
            </div>
            <form method="GET" action="{{ route('catalog') }}" class="d-flex align-items-center gap-2">
                <input type="hidden" name="q" value="{{ $search }}">
                @foreach ($selectedGenres as $genre)
                    <input type="hidden" name="genre[]" value="{{ $genre }}">
                @endforeach
                <label for="sort" class="small text-secondary text-nowrap">Ordenar por</label>
                <select id="sort" name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="relevance" @selected($sort === 'relevance')>Mais relevantes</option>
                    <option value="title" @selected($sort === 'title')>Título</option>
                    <option value="author" @selected($sort === 'author')>Autor</option>
                </select>
            </form>
        </div>

        <div class="row g-4">
            <aside class="col-lg-3">
                <form method="GET" action="{{ route('catalog') }}" class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="h5 fw-bold mb-0">Filtrar por gênero</h2>
                            <a href="{{ route('catalog', ['q' => $search, 'sort' => $sort]) }}" class="small text-danger text-decoration-none">Limpar</a>
                        </div>
                        <input type="hidden" name="q" value="{{ $search }}">
                        <input type="hidden" name="sort" value="{{ $sort }}">
                        @forelse ($genres as $genre)
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="genre-{{ $loop->index }}"
                                    name="genre[]"
                                    value="{{ $genre }}"
                                    @checked($selectedGenres->contains($genre))
                                >
                                <label class="form-check-label small" for="genre-{{ $loop->index }}">{{ $genre }}</label>
                            </div>
                        @empty
                            <p class="small text-secondary">Nenhum gênero cadastrado.</p>
                        @endforelse
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 mt-3">Aplicar filtros</button>
                    </div>
                </form>
            </aside>

            <section class="col-lg-9" aria-label="Livros do catálogo">
                @if ($books->isEmpty())
                    <div class="alert alert-light border shadow-sm">Nenhum livro corresponde aos filtros. Tente outro gênero ou busca.</div>
                @endif

                @if ($books->isNotEmpty())
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-4">
                        @foreach ($books as $bookKey => $book)
                            <article class="col">
                                <div class="card h-100 border-0 shadow-sm">
                                    <a href="{{ route('books.show', $bookKey) }}" class="card-img-top bg-body-secondary ratio ratio-1x1 rounded-top overflow-hidden">
                                        <img src="{{ asset($book['image']) }}" alt="Capa de {{ $book['title'] }}" class="w-100 h-100 object-fit-contain p-2">
                                    </a>
                                    <div class="card-body d-flex flex-column">
                                        <span class="badge bg-danger-subtle text-danger align-self-start mb-2">{{ $book['category'] }}</span>
                                        <h3 class="h5 fw-bold mb-1"><a href="{{ route('books.show', $bookKey) }}" class="link-dark text-decoration-none">{{ $book['title'] }}</a></h3>
                                        <p class="small text-secondary mb-2">{{ $book['author'] }}</p>
                                        <p class="small text-secondary flex-grow-1">{{ $book['description'] }}</p>
                                        <div class="d-flex align-items-center justify-content-between gap-2">
                                            @if (isset($ratings[$bookKey]))
                                                <span class="small"><span class="text-warning">★</span> {{ number_format($ratings[$bookKey]->average_rating, 1, ',', '.') }} <span class="text-secondary">({{ $ratings[$bookKey]->review_count }})</span></span>
                                            @else
                                                <span class="small text-secondary">Ainda sem avaliações</span>
                                            @endif
                                            @if ($favoriteKeys->contains($bookKey))
                                                <form method="POST" action="{{ route('favorites.destroy', $bookKey) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light btn-sm rounded-circle" aria-label="Remover {{ $book['title'] }} dos favoritos"><i class="bi bi-bookmark-heart-fill text-danger"></i></button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('favorites.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="book_key" value="{{ $bookKey }}">
                                                    <button type="submit" class="btn btn-light btn-sm rounded-circle" aria-label="Adicionar {{ $book['title'] }} aos favoritos"><i class="bi bi-bookmark-heart"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>
    </main>
</body>

</html>
