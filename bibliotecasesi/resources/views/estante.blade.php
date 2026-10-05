<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Estante | Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
    @include('layouts.navbar')

    <main class="container py-5">
        <header class="mb-4">
            <p class="small text-danger fw-bold text-uppercase mb-1">Biblioteca pessoal</p>
            <h1 class="display-6 fw-bold mb-2">Minha Estante</h1>
            <p class="text-secondary mb-0">{{ $favorites->count() }} {{ $favorites->count() === 1 ? 'livro salvo' : 'livros salvos' }}.</p>
        </header>

        @if ($favorites->isEmpty())
            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5 text-center">
                    <i class="bi bi-bookmark-heart display-4 text-danger"></i>
                    <h2 class="h4 fw-bold mt-3">Sua estante está vazia</h2>
                    <p class="text-secondary">Explore o catálogo e adicione seus livros favoritos à estante.</p>
                    <a href="{{ route('catalog') }}" class="btn btn-danger">Explorar catálogo</a>
                </div>
            </div>
        @else
            <section class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4" aria-label="Livros salvos na estante">
                @foreach ($favorites as $favorite)
                    <div class="col">
                        <article class="card h-100 shadow-sm">
                            <a href="{{ route('books.show', $favorite['key']) }}" class="ratio ratio-1x1 bg-white rounded-top overflow-hidden">
                                <img src="{{ asset($favorite['image']) }}" class="w-100 h-100 object-fit-contain p-3" alt="Capa de {{ $favorite['title'] }}">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-danger-subtle text-danger align-self-start mb-2">{{ $favorite['category'] }}</span>
                                <h2 class="h5 fw-bold mb-1">
                                    <a href="{{ route('books.show', $favorite['key']) }}" class="link-dark text-decoration-none">{{ $favorite['title'] }}</a>
                                </h2>
                                <p class="small text-secondary flex-grow-1">{{ $favorite['author'] }}</p>
                                <form method="POST" action="{{ route('favorites.destroy', $favorite['key']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">Remover da estante</button>
                                </form>
                            </div>
                        </article>
                    </div>
                @endforeach
            </section>
        @endif
    </main>
</body>

</html>
