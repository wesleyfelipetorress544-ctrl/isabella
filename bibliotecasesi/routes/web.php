<?php

use App\Models\User;
use App\Models\BookReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create($validated);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('pagina1');
})->name('register.submit');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string'],
    ]);

    if (! Auth::attempt($credentials)) {
        return back()
            ->withErrors(['email' => 'E-mail ou senha incorretos.'])
            ->onlyInput('email');
    }

    $request->session()->regenerate();

    return redirect()->intended(route('pagina1'));
})->name('login.submit');

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('welcome');
})->middleware('auth')->name('logout');

Route::get('/perfil', function () {
    $user = auth()->user();
    $books = config('library.books');
    $reviews = $user->bookReviews()->latest()->get();
    $favoriteBooks = $user->favoriteBooks()->latest()->get()
        ->map(fn ($favorite) => ['key' => $favorite->book_key] + ($books[$favorite->book_key] ?? []))
        ->filter(fn (array $book) => isset($book['title']))
        ->values();
    $favoriteGenres = $favoriteBooks->pluck('category')->filter()->unique()->values();
    $favoriteActivities = $user->favoriteBooks()->latest()->get()->map(function ($favorite) use ($books) {
        $title = $books[$favorite->book_key]['title'] ?? 'um livro';

        return [
            'icon' => 'bi-bookmark-heart',
            'message' => "Adicionou {$title} aos favoritos",
            'detail' => 'Livro salvo na estante',
            'created_at' => $favorite->created_at,
        ];
    });
    $reviewActivities = $reviews->map(function ($review) use ($books) {
        $title = $books[$review->book_key]['title'] ?? 'um livro';

        return [
            'icon' => 'bi-chat-left-text',
            'message' => "Avaliou {$title}",
            'detail' => "Nota: {$review->rating} de 5 estrelas",
            'created_at' => $review->updated_at,
        ];
    });
    $recentActivities = collect($favoriteActivities->all())
        ->merge($reviewActivities->all())
        ->sortByDesc('created_at')
        ->take(6)
        ->values();

    return view('profile', compact('user', 'reviews', 'favoriteBooks', 'favoriteGenres', 'recentActivities'));
})->middleware('auth')->name('profile');

Route::put('/perfil', function (Request $request) {
    $user = $request->user();
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
    ]);

    $user->update($validated);

    return redirect()->route('profile')->with('status', 'Seus dados foram atualizados.');
})->middleware('auth')->name('profile.update');

Route::get('/pagina1', function () {
    $books = config('library.books');
    $favoriteKeys = auth()->user()->favoriteBooks()->pluck('book_key');

    return view('pagina1', compact('books', 'favoriteKeys'));
})->middleware('auth')->name('pagina1');

Route::get('/minha-estante', function () {
    $books = config('library.books');
    $favorites = auth()->user()->favoriteBooks()->latest()->get()
        ->map(fn ($favorite) => ['key' => $favorite->book_key] + ($books[$favorite->book_key] ?? []))
        ->filter(fn (array $book) => isset($book['title']))
        ->values();

    return view('estante', compact('favorites'));
})->middleware('auth')->name('shelf');

Route::get('/catalogo', function (Request $request) {
    $allBooks = config('library.books');
    $genres = collect($allBooks)->pluck('category')->filter()->unique()->sort()->values();
    $selectedGenres = collect($request->query('genre', []))
        ->filter(fn ($genre) => is_string($genre) && $genres->contains($genre))
        ->values();
    $search = trim((string) $request->query('q', ''));
    $sort = $request->query('sort', 'relevance');

    $books = collect($allBooks)
        ->filter(fn ($book) => $selectedGenres->isEmpty() || $selectedGenres->contains($book['category']))
        ->filter(fn ($book) => $search === '' || Str::contains(
            Str::lower($book['title'].' '.$book['author'].' '.$book['category']),
            Str::lower($search),
        ));

    if ($sort === 'title') {
        $books = $books->sortBy('title');
    } elseif ($sort === 'author') {
        $books = $books->sortBy('author');
    }

    $ratings = BookReview::query()
        ->selectRaw('book_key, AVG(rating) as average_rating, COUNT(*) as review_count')
        ->groupBy('book_key')
        ->get()
        ->keyBy('book_key');
    $favoriteKeys = auth()->user()->favoriteBooks()->pluck('book_key');

    return view('catalogo', compact('books', 'genres', 'selectedGenres', 'search', 'sort', 'ratings', 'favoriteKeys'));
})->middleware('auth')->name('catalog');

Route::get('/livros/{bookKey}', function (string $bookKey) {
    $allBooks = config('library.books');
    $book = $allBooks[$bookKey] ?? abort(404);
    $reviews = BookReview::with('user')
        ->where('book_key', $bookKey)
        ->latest()
        ->get();
    $myReview = auth()->user()->bookReviews()->where('book_key', $bookKey)->first();
    $isFavorite = auth()->user()->favoriteBooks()->where('book_key', $bookKey)->exists();
    $relatedBooks = collect($allBooks)->except($bookKey)->take(3);

    return view('books.show', compact('book', 'bookKey', 'reviews', 'myReview', 'isFavorite', 'relatedBooks'));
})->middleware('auth')->name('books.show');

Route::post('/livros/{bookKey}/avaliacoes', function (Request $request, string $bookKey) {
    abort_unless(array_key_exists($bookKey, config('library.books')), 404);

    $validated = $request->validate([
        'rating' => ['required', 'integer', 'between:1,5'],
        'comment' => ['required', 'string', 'min:5', 'max:2000'],
    ]);

    auth()->user()->bookReviews()->updateOrCreate(
        ['book_key' => $bookKey],
        $validated,
    );

    return redirect()->route('books.show', $bookKey)->with('status', 'Sua avaliação foi salva.');
})->middleware('auth')->name('books.reviews.store');

Route::post('/favoritos', function (Request $request) {
    $bookKey = $request->validate([
        'book_key' => ['required', 'string', Rule::in(array_keys(config('library.books')))],
    ])['book_key'];

    auth()->user()->favoriteBooks()->firstOrCreate(['book_key' => $bookKey]);

    return back()->with('status', 'Livro adicionado aos favoritos.');
})->middleware('auth')->name('favorites.store');

Route::delete('/favoritos/{bookKey}', function (string $bookKey) {
    abort_unless(array_key_exists($bookKey, config('library.books')), 404);

    auth()->user()->favoriteBooks()->where('book_key', $bookKey)->delete();

    return back()->with('status', 'Livro removido dos favoritos.');
})->middleware('auth')->name('favorites.destroy');
