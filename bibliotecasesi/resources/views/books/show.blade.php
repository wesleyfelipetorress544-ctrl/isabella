<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book['title'] }} | Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary text-dark">
    @include('layouts.navbar')
    {{--
    <header class="bg-white border-bottom shadow-sm">
        <nav class="container d-flex align-items-center justify-content-between py-2" aria-label="Navegação principal">
            <a href="{{ route('pagina1') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                <span class="bg-danger text-white rounded-3 p-2"><i class="bi bi-book-half"></i></span>
                <span class="fw-bold small text-dark">Biblioteca Virtual <small class="d-block text-danger">SESI</small></span>
            </a>
            <div class="d-none d-md-flex align-items-center gap-3">
                <a href="{{ route('pagina1') }}" class="link-secondary small text-decoration-none">Início</a>
                <a href="{{ route('catalog') }}" class="link-danger small text-decoration-none">Catálogo</a>
                <a href="{{ route('pagina1') }}#minha-estante" class="link-secondary small text-decoration-none">Minha Estante</a>
                <a href="{{ route('pagina1') }}#reviews" class="link-secondary small text-decoration-none">Comunidade</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="rounded-circle bg-light d-grid place-items-center p-2"><i class="bi bi-bell"></i></span>
                <a href="{{ route('profile') }}" class="small fw-semibold text-dark text-decoration-none">{{ auth()->user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-link text-secondary p-1" aria-label="Sair"><i class="bi bi-box-arrow-right"></i></button>
                </form>
            </div>
        </nav>
    </header>
    --}}

    <main class="container py-4">
        <nav class="d-flex align-items-center gap-2 small text-secondary mb-4" aria-label="Breadcrumb">
            <a class="link-secondary text-decoration-none" href="{{ route('pagina1') }}">Início</a><span>›</span>
            <a class="link-secondary text-decoration-none" href="{{ route('catalog') }}">Catálogo</a><span>›</span>
            <span class="text-danger fw-semibold">{{ $book['title'] }}</span>
        </nav>

        <section class="bg-white rounded-4 shadow p-4 p-lg-5 mb-5">
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-md-4 col-lg-3">
                    <div class="bg-body-secondary rounded-4 p-2 shadow-sm">
                        <div class="ratio ratio-1x1">
                            <img src="{{ asset($book['image']) }}" alt="Capa de {{ $book['title'] }}" class="w-100 h-100 object-fit-contain rounded-3">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
                        <span class="badge bg-danger-subtle text-danger text-uppercase">{{ $book['category'] }}</span>
                        <span class="badge bg-success-subtle text-success"><i class="bi bi-check-circle-fill me-1"></i>Disponível no catálogo</span>
                    </div>
                    <h1 class="display-5 fw-bold mb-1">{{ $book['title'] }}</h1>
                    <p class="text-secondary mb-3">por <strong class="text-dark">{{ $book['author'] }}</strong></p>

                    <div class="d-flex flex-wrap align-items-center gap-3 mb-3 small text-secondary">
                        @if ($reviews->isNotEmpty())
                            <span><span class="text-warning">★</span> {{ number_format($reviews->avg('rating'), 1, ',', '.') }} <small>({{ $reviews->count() }} {{ $reviews->count() === 1 ? 'avaliação' : 'avaliações' }})</small></span>
                        @else
                            <span><span class="text-warning">☆</span> Ainda sem avaliações</span>
                        @endif
                        <span><i class="bi bi-people me-1"></i>{{ $reviews->where('rating', '>=', 4)->count() }} recomendam</span>
                    </div>

                    <p class="text-secondary lh-lg">{{ $book['description'] }}</p>

                    <div class="d-flex flex-wrap gap-2 my-3">
                        <a href="#write-review" class="btn btn-danger px-3"><i class="bi bi-chat-square-text me-2"></i>Avaliar livro</a>
                        @if ($isFavorite)
                            <form method="POST" action="{{ route('favorites.destroy', $bookKey) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"><i class="bi bi-bookmark-check me-2"></i>Na minha estante</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('favorites.store') }}">
                                @csrf
                                <input type="hidden" name="book_key" value="{{ $bookKey }}">
                                <button type="submit" class="btn btn-outline-danger"><i class="bi bi-bookmark me-2"></i>Adicionar à estante</button>
                            </form>
                        @endif
                    </div>

                    <div class="alert alert-success py-2 mt-3 mb-0 small"><i class="bi bi-info-circle-fill me-2"></i>Explore este título e compartilhe sua opinião com a comunidade.</div>
                </div>
            </div>
        </section>

        <section class="row g-4 mb-5">
            <article class="col-lg-8">
                <span class="text-danger small fw-bold text-uppercase">Sobre o livro</span>
                <h2 class="h2 fw-bold mt-2 mb-3">Uma história que permanece</h2>
                <p class="text-secondary lh-lg">{{ $book['description'] }}</p>
                <p class="text-secondary lh-lg">{{ $book['story'] }}</p>
                @if ($reviews->isNotEmpty())
                    <blockquote class="bg-danger-subtle text-dark rounded-4 p-4 mt-4 mb-0">
                        <span class="fs-2 text-danger">“</span>
                        <span class="fw-bold">{{ $reviews->first()->comment }}</span>
                        <footer class="small text-danger mt-2">{{ $reviews->first()->user->name }} · avaliação de leitor</footer>
                    </blockquote>
                @endif
            </article>

            <aside class="col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body p-4">
                    <h2 class="h5 fw-bold mb-3">Informações do livro <i class="bi bi-journal-text text-danger float-end"></i></h2>
                    <div class="d-flex justify-content-between gap-3 border-bottom py-2 small"><span class="text-secondary">Autor</span><strong>{{ $book['author'] }}</strong></div>
                    <div class="d-flex justify-content-between gap-3 border-bottom py-2 small"><span class="text-secondary">Categoria</span><strong>{{ $book['category'] }}</strong></div>
                    <div class="d-flex justify-content-between gap-3 border-bottom py-2 small"><span class="text-secondary">Idioma</span><strong>Português</strong></div>
                    <div class="d-flex justify-content-between gap-3 border-bottom py-2 small"><span class="text-secondary">Avaliações</span><strong>{{ $reviews->count() }}</strong></div>
                    <div class="mt-3">
                        <small class="text-danger fw-bold text-uppercase">Temas</small>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            <span class="badge bg-body-secondary text-secondary">Leitura</span>
                            <span class="badge bg-body-secondary text-secondary">Literatura</span>
                            <span class="badge bg-body-secondary text-secondary">Comunidade</span>
                        </div>
                    </div>
                    </div>
                </div>
            </aside>
        </section>

        <section class="bg-dark text-light rounded-4 p-4 mb-5" id="reviews">
            <div class="row align-items-center g-3">
                <div class="col-md-3 border-md-end">
                    <div class="display-5 fw-bold">{{ $reviews->isNotEmpty() ? number_format($reviews->avg('rating'), 1, ',', '.') : '—' }}</div>
                    <div class="text-warning">{{ $reviews->isNotEmpty() ? str_repeat('★', (int) round($reviews->avg('rating'))) : '☆☆☆☆☆' }}</div>
                    <small class="text-white-50">{{ $reviews->count() }} avaliações da comunidade</small>
                </div>
                <div class="col-md-9">
                    @if ($reviews->isNotEmpty())
                        <blockquote class="mb-2 fw-bold">“{{ $reviews->first()->comment }}”</blockquote>
                        <small class="text-white-50">{{ $reviews->first()->user->name }} · leitor(a) da Biblioteca SESI</small>
                    @else
                        <blockquote class="mb-2">Sua opinião pode ajudar outras pessoas a escolher a próxima leitura.</blockquote>
                        <a href="#write-review" class="text-white small">Escreva a primeira avaliação <i class="bi bi-arrow-right"></i></a>
                    @endif
                </div>
            </div>
        </section>

        <section class="row g-4 mb-5" id="write-review">
            <div class="col-lg-5">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                    <h2 class="h4 fw-bold mb-2">{{ $myReview ? 'Atualize sua avaliação' : 'Escreva uma avaliação' }}</h2>
                    <p class="text-secondary small">Sua avaliação ficará salva na sua conta.</p>
                    @if (session('status'))
                        <div class="alert alert-success py-2">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('books.reviews.store', $bookKey) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="rating" class="form-label fw-semibold">Sua nota</label>
                            <select id="rating" name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                                <option value="">Escolha de 1 a 5 estrelas</option>
                                @foreach (range(5, 1) as $rating)
                                    <option value="{{ $rating }}" @selected((string) old('rating', $myReview?->rating) === (string) $rating)>{{ $rating }} de 5 estrelas</option>
                                @endforeach
                            </select>
                            @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label fw-semibold">Comentário</label>
                            <textarea id="comment" name="comment" rows="4" maxlength="2000" class="form-control @error('comment') is-invalid @enderror" required>{{ old('comment', $myReview?->comment) }}</textarea>
                            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Salvar avaliação</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                    <h2 class="h4 fw-bold mb-4">O que os leitores dizem</h2>
                    @forelse ($reviews as $review)
                        <article class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between gap-3">
                                <strong>{{ $review->user->name }}</strong>
                                <span class="text-warning" aria-label="Nota {{ $review->rating }} de 5">{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</span>
                            </div>
                            <p class="text-secondary mt-2 mb-1">{{ $review->comment }}</p>
                            <small class="text-muted">{{ $review->updated_at->format('d/m/Y') }}</small>
                        </article>
                    @empty
                        <p class="text-secondary mb-0">Ainda não há avaliações para este livro. Seja a primeira pessoa a compartilhar sua opinião.</p>
                    @endforelse
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="d-flex align-items-end justify-content-between mb-3">
                <div><span class="text-danger small fw-bold text-uppercase">Leituras relacionadas</span><h2 class="h3 fw-bold mt-2">Você também pode gostar</h2></div>
                <a href="{{ route('catalog') }}" class="small text-danger text-decoration-none">Ver catálogo <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="row g-3">
                @foreach ($relatedBooks as $relatedKey => $relatedBook)
                    <div class="col-6 col-md-4">
                        <a class="card card-body text-decoration-none text-dark p-3 h-100" href="{{ route('books.show', $relatedKey) }}">
                            <div class="ratio ratio-1x1 mb-3 bg-body-secondary rounded">
                                <img src="{{ asset($relatedBook['image']) }}" alt="Capa de {{ $relatedBook['title'] }}" class="w-100 h-100 object-fit-contain rounded">
                            </div>
                            <h3 class="h6 fw-bold mb-1">{{ $relatedBook['title'] }}</h3>
                            <small class="text-secondary">{{ $relatedBook['author'] }}</small>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</body>
</html>
