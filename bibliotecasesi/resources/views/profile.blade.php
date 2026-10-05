<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu perfil | Biblioteca Virtual</title>
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
                <a href="{{ route('catalog') }}" class="link-secondary text-decoration-none small">Catálogo</a>
                <a href="{{ route('pagina1') }}#minha-estante" class="link-secondary text-decoration-none small">Minha Estante</a>
                <span class="small fw-semibold">{{ $user->name }}</span>
            </div>
        </div>
    </nav>
    --}}

    <header class="bg-dark text-white py-4 py-lg-5">
        <div class="container d-flex flex-wrap align-items-center gap-4">
            <div class="bg-white text-danger rounded-circle d-flex align-items-center justify-content-center display-5 fw-bold p-3" aria-hidden="true">
                {{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}
            </div>
            <div class="flex-grow-1">
                <p class="small text-white-50 text-uppercase fw-semibold mb-1">Perfil de leitora</p>
                <h1 class="display-5 fw-bold mb-1">{{ $user->name }}</h1>
                <p class="text-white-50 mb-0">Membro desde {{ $user->created_at->locale('pt_BR')->translatedFormat('F \d\e Y') }}</p>
            </div>
            <a href="#dados-pessoais" class="btn btn-light text-dark"><i class="bi bi-pencil me-2 text-danger"></i>Editar perfil</a>
        </div>
    </header>

    <main class="container py-4 py-lg-5">
        <section class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-5" aria-label="Resumo da conta">
            <div class="col">
                <article class="card h-100 shadow-sm"><div class="card-body d-flex align-items-center gap-3">
                    <span class="bg-danger-subtle text-danger rounded-circle p-3"><i class="bi bi-bookmark-heart"></i></span>
                    <div><h2 class="h4 fw-bold mb-0">{{ $favoriteBooks->count() }}</h2><p class="small fw-semibold mb-0">Livros favoritos</p><small class="text-secondary">Na sua estante</small></div>
                </div></article>
            </div>
            <div class="col">
                <article class="card h-100 shadow-sm"><div class="card-body d-flex align-items-center gap-3">
                    <span class="bg-danger-subtle text-danger rounded-circle p-3"><i class="bi bi-chat-left-text"></i></span>
                    <div><h2 class="h4 fw-bold mb-0">{{ $reviews->count() }}</h2><p class="small fw-semibold mb-0">Avaliações</p><small class="text-secondary">Publicadas por você</small></div>
                </div></article>
            </div>
            <div class="col">
                <article class="card h-100 shadow-sm"><div class="card-body d-flex align-items-center gap-3">
                    <span class="bg-danger-subtle text-danger rounded-circle p-3"><i class="bi bi-star"></i></span>
                    <div><h2 class="h4 fw-bold mb-0">{{ $reviews->isNotEmpty() ? number_format($reviews->avg('rating'), 1, ',', '.') : '—' }}</h2><p class="small fw-semibold mb-0">Média das notas</p><small class="text-secondary">{{ $reviews->count() }} avaliações</small></div>
                </div></article>
            </div>
            <div class="col">
                <article class="card h-100 shadow-sm"><div class="card-body d-flex align-items-center gap-3">
                    <span class="bg-danger-subtle text-danger rounded-circle p-3"><i class="bi bi-calendar3"></i></span>
                    <div><h2 class="h6 fw-bold mb-0">{{ $user->created_at->format('d/m/Y') }}</h2><p class="small fw-semibold mb-0">Conta criada</p><small class="text-secondary">Biblioteca SESI</small></div>
                </div></article>
            </div>
        </section>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <section class="row g-4 mb-5">
            <div class="col-lg-6" id="dados-pessoais">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <p class="small text-danger text-uppercase fw-bold mb-1">Sobre você</p>
                        <h2 class="h3 fw-bold mb-4">Dados pessoais</h2>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nome</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" autocomplete="name" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">E-mail</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <p class="small text-secondary"><i class="bi bi-calendar3 me-2"></i>Conta criada em {{ $user->created_at->format('d/m/Y') }}</p>
                            <button type="submit" class="btn btn-outline-danger">Atualizar dados</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <p class="small text-danger text-uppercase fw-bold mb-1">Seu universo literário</p>
                        <h2 class="h3 fw-bold mb-4">Preferências de leitura</h2>
                        <h3 class="small fw-bold text-uppercase">Gêneros dos seus favoritos</h3>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            @forelse ($favoriteGenres as $genre)
                                <span class="badge rounded-pill bg-danger-subtle text-danger">{{ $genre }}</span>
                            @empty
                                <span class="text-secondary small">Adicione livros aos favoritos para ver seus gêneros aqui.</span>
                            @endforelse
                        </div>
                        <hr>
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                            <div>
                                <h3 class="small fw-bold text-uppercase mb-1">Sua estante</h3>
                                <p class="small text-secondary mb-0">{{ $favoriteBooks->count() }} {{ $favoriteBooks->count() === 1 ? 'livro salvo' : 'livros salvos' }} na sua conta.</p>
                            </div>
                            <a href="{{ route('shelf') }}" class="btn btn-outline-secondary btn-sm">Ver minha estante</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row g-4" id="atividade">
            <div class="col-lg-8">
                <div class="d-flex align-items-end justify-content-between mb-3">
                    <div><p class="small text-danger text-uppercase fw-bold mb-1">Últimos movimentos</p><h2 class="h3 fw-bold mb-0">Atividade recente</h2></div>
                    <a href="{{ route('shelf') }}" class="small text-danger text-decoration-none">Minha estante <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="d-flex flex-column gap-3">
                    @forelse ($recentActivities as $activity)
                        <article class="card shadow-sm"><div class="card-body d-flex align-items-center gap-3">
                            <span class="bg-danger-subtle text-danger rounded-circle p-3"><i class="bi {{ $activity['icon'] }}"></i></span>
                            <div class="flex-grow-1">
                                <h3 class="h6 fw-bold mb-1">{{ $activity['message'] }}</h3>
                                <p class="small text-secondary mb-0">{{ $activity['detail'] }} · {{ $activity['created_at']->format('d/m/Y') }}</p>
                            </div>
                            <i class="bi bi-chevron-right text-secondary"></i>
                        </div></article>
                    @empty
                        <div class="card shadow-sm"><div class="card-body text-secondary">Suas avaliações e livros favoritos aparecerão aqui.</div></div>
                    @endforelse
                </div>
            </div>

            <aside class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold mb-3">Conta</h2>
                        <a href="{{ route('catalog') }}" class="d-flex justify-content-between link-dark text-decoration-none border-bottom py-3"><span><i class="bi bi-search me-2"></i>Explorar catálogo</span><i class="bi bi-chevron-right text-secondary"></i></a>
                        <a href="{{ route('shelf') }}" class="d-flex justify-content-between link-dark text-decoration-none border-bottom py-3"><span><i class="bi bi-bookmark-heart me-2"></i>Minha estante</span><i class="bi bi-chevron-right text-secondary"></i></a>
                        <form method="POST" action="{{ route('logout') }}" class="pt-3">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger text-decoration-none p-0"><i class="bi bi-box-arrow-right me-2"></i>Sair da conta</button>
                        </form>
                    </div>
                </div>
            </aside>
        </section>
    </main>
</body>

</html>
