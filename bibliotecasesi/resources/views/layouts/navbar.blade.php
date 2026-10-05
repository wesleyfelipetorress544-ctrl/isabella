<nav class="navbar bg-white border-bottom shadow-sm sticky-top">
    <div class="container-fluid d-flex flex-wrap align-items-center px-3 py-2">
        <a href="{{ auth()->check() ? route('pagina1') : route('welcome') }}" class="d-flex align-items-center me-auto p-0" aria-label="SESI - página inicial">
            <img src="https://guarulhos.sesisp.org.br/images/logo-sesi-bot.jpg" alt="SESI São Paulo" width="180" height="58" class="d-block flex-shrink-0 mw-100 object-fit-cover">
        </a>

        <div class="d-flex flex-grow-1 flex-wrap align-items-center justify-content-center gap-2 gap-md-4">
            @auth
                <a href="{{ route('pagina1') }}" class="small text-decoration-none {{ request()->routeIs('pagina1') ? 'text-danger fw-semibold' : 'link-secondary' }}">Início</a>
                <a href="{{ route('catalog') }}" class="small text-decoration-none {{ request()->routeIs('catalog') ? 'text-danger fw-semibold' : 'link-secondary' }}">Catálogo</a>
                <a href="{{ route('shelf') }}" class="small text-decoration-none {{ request()->routeIs('shelf') ? 'text-danger fw-semibold' : 'link-secondary' }}">Minha Estante</a>
                <a href="{{ route('profile') }}#atividade" class="small text-decoration-none {{ request()->routeIs('profile') ? 'text-danger fw-semibold' : 'link-secondary' }}">Atividade</a>
                <a href="{{ route('shelf') }}" class="small fw-semibold text-decoration-none {{ request()->routeIs('shelf') ? 'text-danger' : 'text-dark' }}">{{ auth()->user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Sair</button>
                </form>
            @else
                <a href="{{ route('welcome') }}" class="small link-secondary text-decoration-none">Entrar</a>
                <a href="{{ route('register') }}" class="btn btn-danger btn-sm">Cadastrar</a>
            @endauth
        </div>
    </div>
</nav>
