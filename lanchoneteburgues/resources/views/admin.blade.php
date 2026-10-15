<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#101010">
  <title>Painel administrativo | Burgues</title><link rel="icon" type="image/png" href="{{ asset('logoburguer.png') }}">
  <style>
    :root{--ink:#111214;--muted:#686c75;--line:#e1e4e9;--yellow:#ffd21a;--gold:#e7a900;--paper:#f5f6f8;--radius:14px}
    *{box-sizing:border-box}body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif;font-size:14px;-webkit-font-smoothing:antialiased}
    button,input,select{font:inherit}button{cursor:pointer}.topbar{height:80px;background:#111;color:white;border-bottom:1px solid #2a2a2a}.nav{max-width:1532px;height:100%;margin:auto;display:flex;align-items:center;padding:0 8px;gap:40px}.brand{width:230px;display:flex;align-items:center}.brand img{width:96px;height:68px;object-fit:contain}.nav-links{display:flex;align-items:center;gap:31px;height:100%;flex:1}.nav-link{height:100%;display:flex;align-items:center;gap:10px;color:#f3f3f3;text-decoration:none;font-weight:650;padding:0 8px;border-bottom:3px solid transparent;white-space:nowrap}.nav-link svg{width:20px;height:20px}.nav-link.active{color:var(--yellow);border-color:var(--yellow)}.nav-actions{display:flex;align-items:center;gap:22px;padding-left:34px;border-left:1px solid #393939}.btn{border:1px solid transparent;border-radius:11px;padding:12px 20px;display:inline-flex;align-items:center;justify-content:center;gap:9px;font-weight:700;white-space:nowrap;text-decoration:none}.btn svg{width:17px;height:17px}.btn-outline{background:transparent;color:#fff;border-color:var(--yellow);min-width:124px}.btn-yellow{background:var(--yellow);color:#111;min-width:100px}.btn-light{background:#fff;color:#9a6700;border:1px solid #f5bd00}.btn-small{padding:8px 14px;font-size:13px}.mobile-menu{display:none;background:none;border:0;color:white}
    main{max-width:1532px;margin:0 auto;padding:24px 8px 48px}.heading{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}.heading h1{font-size:31px;line-height:1.2;letter-spacing:-1.35px;margin:0 0 4px;font-weight:800}.subtitle{font-size:15px;color:var(--muted);margin:0}.date-wrap{position:relative}.date-button{background:#fff;border:1px solid var(--line);border-radius:11px;padding:12px 16px;display:flex;align-items:center;gap:10px;font-size:13px;font-weight:650}.date-button svg{width:18px;height:18px}.date-input{position:absolute;inset:0;width:100%;height:100%;opacity:0;cursor:pointer}
    .stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;margin-bottom:20px}.stat{min-height:110px;background:#fff;border-radius:12px;padding:17px 19px;display:flex;align-items:center;gap:21px;box-shadow:0 4px 18px #10182808}.stat-icon{height:63px;width:63px;flex:none;border-radius:50%;display:grid;place-items:center}.stat-icon svg{height:26px;width:26px;stroke-width:2.5}.stat-icon.amber{background:#fff4d4;color:#dfa900}.stat-icon.blue{background:#e6f1ff;color:#0873eb}.stat-icon.green{background:#e1f9e9;color:#07943d}.stat-icon.violet{background:#f0e9ff;color:#5b1be2}.stat-label{font-size:13px;color:#535762;margin-bottom:5px}.stat-value{font-size:25px;line-height:1.2;font-weight:800;letter-spacing:-.6px}.stat-note{font-size:13px;color:#686c75;margin-top:5px}
    .panel{background:#fff;border-radius:14px;padding:17px 20px;margin-bottom:20px;box-shadow:0 4px 18px #10182808}.panel-heading{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:12px}.panel h2{font-size:23px;letter-spacing:-.8px;line-height:1.3;margin:0;font-weight:800}.panel-subtitle{font-size:14px;color:var(--muted);margin:2px 0 0}.table-scroll{overflow-x:auto}table{width:100%;border-collapse:collapse;min-width:680px}thead{background:#f1f2f4}th{text-align:left;padding:11px 13px;font-size:13px;font-weight:700;white-space:nowrap;text-decoration:none}td{padding:12px 13px;border-bottom:1px solid #f1f2f4}.empty-cell{text-align:center;height:76px;color:#36383d;font-size:13px}.empty-state{display:flex;flex-direction:column;align-items:center;gap:5px}.empty-state svg{width:27px;height:27px;stroke-width:1.8}.products-head{margin-bottom:12px}.product-controls{display:grid;grid-template-columns:1.55fr .92fr 1fr;gap:10px;margin-bottom:8px}.control{height:41px;width:100%;border:1px solid var(--line);border-radius:10px;background:#fff;color:#272a30;padding:0 13px;outline:none}.control:focus{border-color:#d7a800;box-shadow:0 0 0 3px #ffd21a2b}.search-control{position:relative}.search-control svg{position:absolute;left:15px;top:12px;width:17px;height:17px}.search-control input{padding-left:46px}.control::placeholder{color:#81858f}.form-panel{padding-bottom:20px}.form-heading{margin-bottom:4px}.required-pill{border-radius:10px;padding:9px 15px;background:#fff4d4;color:#986700;font-size:12px;font-weight:700}.product-form{display:grid;grid-template-columns:1.45fr 1.2fr .78fr 1fr;gap:14px 19px}.field label{display:block;font-size:13px;font-weight:700;margin:0 0 4px}.field .control{height:42px}.field textarea{height:85px;resize:vertical;padding-top:11px}.wide{grid-column:span 2}.form-actions{grid-column:1/-1;display:flex;justify-content:flex-end;gap:10px}.notice{display:none;padding:10px 12px;margin:10px 0 0;background:#e7f8ed;color:#12652f;border-radius:8px}
    @media(max-width:1100px){.nav{gap:18px}.brand{width:130px}.nav-links{gap:10px}.nav-actions{gap:10px;padding-left:15px}.stats{grid-template-columns:repeat(2,minmax(0,1fr))}.product-form{grid-template-columns:repeat(2,minmax(0,1fr))}}
    @media(max-width:700px){.topbar{height:66px}.nav{padding:0 17px;justify-content:space-between}.brand{width:auto}.brand img{height:57px;width:83px}.mobile-menu{display:block}.nav-links{display:none;position:absolute;top:66px;left:0;right:0;z-index:5;background:#111;height:auto;padding:8px 16px 16px;flex-direction:column;align-items:stretch}.nav-links.open{display:flex}.nav-link{height:45px;border-bottom-width:0;border-left:3px solid transparent}.nav-link.active{border-left-color:var(--yellow)}.nav-actions{border:0;padding:0;gap:8px}.nav-actions .btn{min-width:0;padding:9px 11px}.nav-actions .btn-outline{display:none}main{padding:21px 15px 35px}.heading{align-items:flex-start;gap:12px}.heading h1{font-size:25px}.subtitle{font-size:13px}.date-button{padding:10px;font-size:0;gap:5px}.date-button strong{font-size:12px}.date-button .date-label{display:none}.stats{gap:10px}.stat{min-height:94px;padding:12px;gap:11px}.stat-icon{width:46px;height:46px}.stat-icon svg{width:21px}.stat-value{font-size:20px}.stat-label,.stat-note{font-size:11px}.panel{padding:15px 13px;margin-bottom:14px}.panel h2{font-size:20px}.product-controls{grid-template-columns:1fr;gap:8px}.product-form{grid-template-columns:1fr;gap:12px}.wide{grid-column:auto}.required-pill{font-size:10px;padding:8px}.panel-heading{align-items:flex-start}.form-heading{align-items:center}}
  /* Barra de navegação compartilhada */
.topbar{height:74px!important;background:#111!important;color:#fff;border-bottom:1px solid #2a2a2a}.nav{max-width:1532px!important;height:100%!important;margin:0 auto!important;padding:0 8px!important;display:flex!important;align-items:center!important;gap:40px!important}.brand{width:230px!important;flex:none!important;display:flex!important;align-items:center!important}.brand img{width:96px!important;height:68px!important;object-fit:contain!important}.nav-links{display:flex!important;align-items:center!important;gap:26px!important;height:100%!important;flex:1!important}.nav-link{height:100%!important;display:flex!important;align-items:center!important;gap:10px!important;padding:0 8px!important;color:#f3f3f3!important;text-decoration:none!important;font-weight:650!important;white-space:nowrap!important;border:0!important;border-bottom:3px solid transparent!important}.nav-link svg{width:20px!important;height:20px!important;flex:none!important}.nav-link.active{color:#ffd21a!important;border-bottom-color:#ffd21a!important}.nav-actions{display:flex!important;align-items:center!important;gap:20px!important;padding-left:34px!important;border-left:1px solid #393939!important}.nav-store,.nav-actions .btn-outline{height:44px;min-width:124px;display:inline-flex;align-items:center;justify-content:center;gap:9px;padding:0 18px!important;border:1px solid #ffd21a!important;border-radius:11px!important;background:transparent!important;color:#fff!important;text-decoration:none!important;font-weight:700!important;white-space:nowrap}.nav-store:hover,.nav-actions .btn-outline:hover{text-decoration:none}.nav-exit,.nav-actions .btn-yellow{height:44px;min-width:100px;display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:0 18px!important;border:0!important;border-radius:11px!important;background:#ffd21a!important;color:#111!important;font-weight:700!important;white-space:nowrap}.nav-store svg,.nav-actions .btn-outline svg{width:16px!important;height:16px!important;flex:none!important}.nav-exit svg,.nav-actions .btn-yellow svg{display:block;width:17px!important;height:17px!important;flex:none!important}
@media(max-width:1100px){.nav{gap:18px!important}.brand{width:130px!important}.nav-links{gap:10px!important}.nav-actions{gap:10px!important;padding-left:15px!important}}
@media(max-width:700px){.topbar{height:66px!important}.nav{padding:0 15px!important;justify-content:space-between!important}.brand{width:auto!important}.brand img{height:57px!important;width:83px!important}.mobile-menu{display:block!important}.nav-links{display:none!important;position:absolute!important;top:66px!important;left:0!important;right:0!important;z-index:5!important;background:#111!important;height:auto!important;padding:8px 16px 16px!important;flex-direction:column!important;align-items:stretch!important}.nav-links.open{display:flex!important}.nav-link{height:45px!important;border:0!important;border-left:3px solid transparent!important}.nav-link.active{border-left-color:#ffd21a!important;border-bottom-color:transparent!important}.nav-actions{border:0!important;padding:0!important;gap:8px!important}.nav-store,.nav-actions .btn-outline{display:none!important}.nav-exit,.nav-actions .btn-yellow{min-width:0;height:39px;padding:0 12px!important}}</style>
<style>
@keyframes softRise{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:translateY(0)}}
main>section,main>.heading{animation:softRise .45s ease-out both}
main>section:nth-of-type(2){animation-delay:.05s}main>section:nth-of-type(3){animation-delay:.1s}main>section:nth-of-type(4){animation-delay:.15s}
.panel,.stat,.summary-card{transition:transform .2s ease,box-shadow .2s ease}
.panel:hover,.stat:hover,.summary-card:hover{transform:translateY(-2px);box-shadow:0 8px 24px #10182812}
.btn,.nav-store,.nav-exit,.nav-actions button{transition:transform .16s ease,box-shadow .16s ease,background-color .16s ease}
.btn:hover,.nav-store:hover,.nav-exit:hover,.nav-actions button:hover{transform:translateY(-1px);box-shadow:0 4px 12px #10182818}
.nav-link{transition:color .16s ease,background-color .16s ease}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;animation-iteration-count:1!important;scroll-behavior:auto!important;transition-duration:.01ms!important}}
@keyframes navDrop{from{opacity:0;transform:translateY(-7px)}to{opacity:1;transform:translateY(0)}}
@keyframes menuReveal{from{opacity:0;transform:translateY(-5px)}to{opacity:1;transform:translateY(0)}}
.topbar .nav{animation:navDrop .42s ease-out both}
.topbar .nav-link{position:relative;transition:color .18s ease,transform .18s ease,background-color .18s ease;border-bottom-color:transparent!important}
.topbar .nav-link::after{content:"";position:absolute;left:8px;right:8px;bottom:0;height:3px;background:#ffd21a;transform:scaleX(0);transform-origin:center;transition:transform .2s ease}
.topbar .nav-link.active::after{transform:scaleX(1)}
.topbar .nav-link:hover{color:#ffd21a!important;transform:translateY(-1px)}
.topbar .nav-link svg{transition:transform .18s ease}.topbar .nav-link:hover svg{transform:scale(1.1)}
.topbar .nav-store,.topbar .nav-exit,.topbar .nav-actions .btn{transition:transform .18s ease,box-shadow .18s ease,background-color .18s ease}
.topbar .nav-store:hover,.topbar .nav-exit:hover,.topbar .nav-actions .btn:hover{transform:translateY(-1px);box-shadow:0 4px 13px #0003}
.topbar .mobile-menu{transition:transform .18s ease,color .18s ease}.topbar .mobile-menu:hover{transform:scale(1.08);color:#ffd21a}
@media(max-width:700px){.topbar .nav-link::after{display:none}.topbar .nav-link.active{border-left-color:#ffd21a!important}.topbar .nav-links.open{animation:menuReveal .2s ease-out both}}
@media(prefers-reduced-motion:reduce){.topbar .nav,.topbar .nav-links.open{animation:none!important}.topbar .nav-link,.topbar .nav-link::after,.topbar .nav-link svg,.topbar .nav-store,.topbar .nav-exit,.topbar .mobile-menu{transition:none!important}}</style>
<style>
  .field-error{display:block;color:#b42318;font-size:12px;margin-top:5px}.status-message{padding:12px 14px;border-radius:9px;background:#e7f8ed;color:#12652f;margin:0 0 14px;font-weight:650}.status-warning{background:#fff4d4;color:#805b00}.product-thumb{width:64px;height:48px;object-fit:cover;border-radius:8px}.product-description{max-width:340px;white-space:normal}.admin-product-form{margin-top:10px}.admin-logout{padding:0;border:0;background:none}.delete-product-form{margin:0}.btn-danger{background:#fff1f0;border:1px solid #f0b8b3;color:#a4261d}.store-status-panel{display:flex;align-items:center;justify-content:space-between;gap:20px}.store-status-heading{display:flex;align-items:center;gap:12px}.store-status-heading h2{margin:0}.store-status-badge{display:inline-flex;align-items:center;gap:7px;border-radius:999px;padding:7px 12px;font-size:12px;font-weight:750}.store-status-badge::before{content:"";width:8px;height:8px;border-radius:50%;background:currentColor}.store-status-badge.is-open{background:#e7f8ed;color:#12652f}.store-status-badge.is-closed{background:#fff1f0;color:#a4261d}.store-status-panel .status-message{margin:12px 0 0}
</style>
</head>
<body>
  <style>
    .burgues-header{position:relative;z-index:1000;width:100%;min-height:98px;background:#1d1d1d;color:#fff}
    .burgues-header::before{content:"";position:absolute;top:-30px;left:0;width:100%;height:30px;background:#1d1d1d}
    .burgues-header-inner{min-height:98px;width:100%;padding:0 clamp(20px,4vw,72px);display:flex;align-items:center;justify-content:space-between;gap:28px;transform:translateY(-10px)}
    .burgues-header-brand img{display:block;width:128px;height:88px;object-fit:contain;transform-origin:left center;transition:transform .25s ease}
    .burgues-header-brand:hover img,.burgues-header-brand:focus-visible img{transform:translateY(-14px) scale(1.025);filter:drop-shadow(0 8px 18px rgba(0,0,0,.22))}
    .burgues-header-links{display:flex;align-items:center;justify-content:center;gap:clamp(16px,2.4vw,42px)}
    .burgues-header-links a{display:inline-block;padding:14px 6px;color:#fff;font:700 16px 'DM Sans',Arial,sans-serif;text-decoration:none;white-space:nowrap;cursor:pointer;animation:burgues-admin-nav-enter .65s ease-out both;transition:color .25s ease}
    .burgues-header-links a:nth-child(1){animation-delay:.08s}.burgues-header-links a:nth-child(2){animation-delay:.18s}.burgues-header-links a:nth-child(3){animation-delay:.28s}.burgues-header-links a:nth-child(4){animation-delay:.38s}
    .burgues-header-links .nav-label{display:inline-block;pointer-events:none;transform-origin:left center;transition:transform .25s ease,text-shadow .25s ease}
    .burgues-header-links a:hover,.burgues-header-links a:focus-visible,.burgues-header-links a[aria-current=page]{color:#ffcc00}
    .burgues-header-links a:hover .nav-label,.burgues-header-links a:focus-visible .nav-label{transform:translateY(-14px) scale(1.025);text-shadow:0 8px 18px rgba(0,0,0,.22)}
    .burgues-header-order{min-height:48px;padding:0 20px;border:0;border-radius:5px;background:#ffcc00;color:#111;font:700 14px 'DM Sans',Arial,sans-serif;text-decoration:none;display:inline-flex;align-items:center;white-space:nowrap;transition:transform .18s ease,box-shadow .18s ease}
    .burgues-header-order:hover,.burgues-header-order:focus-visible{transform:translateY(-1px);box-shadow:0 4px 13px #0003}
    @keyframes burgues-admin-nav-enter{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
    @media(max-width:850px){.burgues-header-inner{flex-wrap:wrap;gap:10px 18px;padding:8px 18px}.burgues-header-links{order:3;width:100%;justify-content:flex-start;flex-wrap:wrap;gap:12px 20px}.burgues-header-links a{font-size:13px}.burgues-header-brand img{width:102px;height:68px}}
    @media(prefers-reduced-motion:reduce){.burgues-header-links a{animation:none!important}}
  </style>
  <header class="burgues-header"><div class="burgues-header-inner">
    <a class="burgues-header-brand" href="{{ route('admin') }}" aria-label="Burguês, painel"><img src="{{ asset('logoburguer.png') }}" alt="Burguês"></a>
    <nav class="burgues-header-links" aria-label="Navegação administrativa">
      <a href="{{ route('admin') }}" aria-current="page"><span class="nav-label">Painel</span></a>
      <a href="{{ route('pedidos') }}"><span class="nav-label">Pedidos</span></a>
      <a href="{{ route('produtos') }}"><span class="nav-label">Produtos</span></a>
      <a href="{{ route('motoboys') }}"><span class="nav-label">Motoboys</span></a>
    </nav>
    <a class="burgues-header-order" href="{{ url('/') }}">Ver loja</a>
    <form class="admin-logout" method="POST" action="{{ route('admin.logout') }}">@csrf<button class="burgues-header-order" type="submit">Sair</button></form>
  </div></header>
  <main id="inicio">
    <section class="heading"><div><h1>Bora movimentar a chapa.</h1><p class="subtitle">Resumo da operação <span aria-hidden="true">•</span> <span id="todayText">Terça-feira, 13 de outubro de 2026</span></p></div><div class="date-wrap"><button class="date-button" type="button"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 17h.01M12 17h.01"/></svg><span class="date-label">Hoje ·</span><strong id="dateLabel">13/10/2026</strong><span>⌄</span></button><input class="date-input" id="datePicker" aria-label="Selecionar data" type="date"></div></section>
    <section class="panel store-status-panel" aria-labelledby="store-status-title">
      <div>
        <div class="store-status-heading">
          <h2 id="store-status-title">Status da loja</h2>
          <span class="store-status-badge {{ $storeIsOpen ? 'is-open' : 'is-closed' }}">{{ $storeIsOpen ? 'Loja aberta' : 'Loja fechada' }}</span>
        </div>
        <p class="panel-subtitle">{{ $storeIsOpen ? 'O cardápio e os pedidos estão disponíveis para clientes.' : 'O site público está bloqueado até a loja ser reaberta.' }}</p>
        @if(session('store_status'))<p class="status-message" role="status">{{ session('store_status') }}</p>@endif
      </div>
      <form method="POST" action="{{ route('admin.store-status.update') }}">
        @csrf
        <input type="hidden" name="is_open" value="{{ $storeIsOpen ? '0' : '1' }}">
        <button class="btn {{ $storeIsOpen ? 'btn-danger' : 'btn-yellow' }}" type="submit">{{ $storeIsOpen ? 'Fechar loja' : 'Abrir loja' }}</button>
      </form>
    </section>
    <section class="stats" aria-label="Resumo do dia">
      <article class="stat"><div class="stat-icon amber"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 19V11h4v8M10 19V5h4v14M16 19v-9h4v9M3 21h18"/></svg></div><div><div class="stat-label">Vendas do dia</div><div class="stat-value">R$ {{ number_format((float) $todaySales, 2, ',', '.') }}</div><div class="stat-note">Total dos pedidos de hoje</div></div></article>
      <article class="stat"><div class="stat-icon blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 8h14v13H5zM9 8V6a3 3 0 0 1 6 0v2M8 12h.01M16 12h.01"/></svg></div><div><div class="stat-label">Pedidos recebidos</div><div class="stat-value">{{ $todayOrderCount }}</div><div class="stat-note">{{ $orderCount }} pedido(s) registrados</div></div></article>
      <article class="stat"><div class="stat-icon green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 6h16v4a3 3 0 0 0 0 6v3H4v-3a3 3 0 0 0 0-6V6Z"/><path d="M12 8v2m0 4v2"/></svg></div><div><div class="stat-label">Ticket médio</div><div class="stat-value">R$ {{ number_format((float) $averageTicket, 2, ',', '.') }}</div><div class="stat-note">Média dos pedidos de hoje</div></div></article>
      <article class="stat"><div class="stat-icon violet"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 8 9 5 9-5M3 8v9l9 5 9-5V8M12 13v9"/></svg></div><div><div class="stat-label">Produtos ativos</div><div class="stat-value" id="activeCount">{{ $productCount }}</div><div class="stat-note">Produtos cadastrados</div></div></article>
    </section>
    <section class="panel" id="pedidos"><div class="panel-heading"><h2>Pedidos recentes</h2><a class="btn btn-light btn-small" href="{{ route('pedidos') }}">Ver todos <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div><div class="table-scroll"><table><thead><tr><th># Pedido</th><th>Cliente</th><th>Itens</th><th>Total</th><th>Status</th><th>Horário</th></tr></thead><tbody>
      @forelse($orders as $order)
        <tr>
          <td>#{{ str_pad((string) $order->id, 6, '0', STR_PAD_LEFT) }}</td>
          <td>{{ $order->customer_name }}</td>
          <td>@foreach($order->items as $item){{ $item->quantity }} × {{ $item->product_name }}@if(! $loop->last)<br>@endif @endforeach</td>
          <td>R$ {{ number_format((float) $order->total, 2, ',', '.') }}</td>
          <td>{{ ['novo' => 'Novo', 'preparo' => 'Em preparo', 'pronto' => 'Pronto', 'finalizado' => 'Finalizado', 'cancelado' => 'Cancelado'][$order->status] ?? $order->status }}</td>
          <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
        </tr>
      @empty
        <tr><td class="empty-cell" colspan="6"><div class="empty-state"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="5" y="3" width="14" height="19" rx="1"/><path d="M9 3V2h6v1M9 8h6M9 12h6M9 16h4"/></svg><span>Nenhum pedido registrado.</span></div></td></tr>
      @endforelse
    </tbody></table></div></section>
    <section class="panel form-panel" id="produtos">
      <div class="panel-heading form-heading"><div><h2>Cadastrar produto</h2><p class="panel-subtitle">Adicione lanches, bebidas e acompanhamentos ao cardápio.</p></div><span class="required-pill">Campos obrigatórios</span></div>
      @if(session('status'))<p class="status-message" role="status">{{ session('status') }}</p>@endif
      @if(session('warning'))<p class="status-message status-warning" role="alert">{{ session('warning') }}</p>@endif
      <form class="product-form admin-product-form" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="field"><label for="product-name">Nome do produto *</label><input class="control" id="product-name" name="name" value="{{ old('name') }}" maxlength="120" required>@error('name')<small class="field-error">{{ $message }}</small>@enderror</div>
        <div class="field"><label for="product-category">Categoria *</label><select class="control" id="product-category" name="category" required><option value="">Selecione</option><option value="lanches" @selected(old('category') === 'lanches')>Lanches</option><option value="bebidas" @selected(old('category') === 'bebidas')>Bebidas</option><option value="acompanhamentos" @selected(old('category') === 'acompanhamentos')>Acompanhamentos</option></select>@error('category')<small class="field-error">{{ $message }}</small>@enderror</div>
        <div class="field"><label for="product-price">Preço (R$) *</label><input class="control" id="product-price" name="price" type="number" min="0.01" max="999999.99" step="0.01" value="{{ old('price') }}" required>@error('price')<small class="field-error">{{ $message }}</small>@enderror</div>
        <div class="field" id="burger-type-field" @if(old('category') !== 'lanches') hidden @endif><label for="burger-type">Tipo de lanche *</label><select class="control" id="burger-type" name="burger_type" @if(old('category') === 'lanches') required @endif><option value="">Selecione</option><option value="classicos" @selected(old('burger_type') === 'classicos')>Clássicos</option><option value="smash" @selected(old('burger_type') === 'smash')>Smash</option><option value="frango" @selected(old('burger_type') === 'frango')>Frango</option><option value="vegetariano" @selected(old('burger_type') === 'vegetariano')>Vegetariano</option></select>@error('burger_type')<small class="field-error">{{ $message }}</small>@enderror</div>
        <div class="field wide"><label for="product-description">Descrição *</label><textarea class="control" id="product-description" name="description" maxlength="1000" required>{{ old('description') }}</textarea>@error('description')<small class="field-error">{{ $message }}</small>@enderror</div>
        <div class="field wide"><label for="product-image">Imagem (JPG, PNG ou WEBP; até 2 MB, será redimensionada para 800 × 600) *</label><input class="control" id="product-image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required>@error('image')<small class="field-error">{{ $message }}</small>@enderror</div>
        <div class="form-actions"><button class="btn btn-yellow" type="submit">＋ Cadastrar produto</button></div>
      </form>
    </section>
    <section class="panel">
      <div class="panel-heading"><div><h2>Produtos cadastrados</h2><p class="panel-subtitle">{{ $productCount }} produto(s) no cardápio.</p></div></div>
      <div class="table-scroll"><table><thead><tr><th>Imagem</th><th>Produto</th><th>Categoria</th><th>Preço</th><th>Descrição</th><th>Ações</th></tr></thead><tbody>
        @forelse($products as $product)
          <tr><td><img class="product-thumb" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"></td><td>{{ $product->name }}</td><td>{{ $product->category === 'lanches' ? \App\Models\Product::BURGER_TYPES[$product->burger_type] : \App\Models\Product::CATEGORIES[$product->category] }}</td><td>R$ {{ number_format((float) $product->price, 2, ',', '.') }}</td><td class="product-description">{{ $product->description }}</td><td><form class="delete-product-form" method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Tem certeza de que deseja remover este produto?')">@csrf @method('DELETE')<button class="btn btn-danger btn-small" type="submit">Remover</button></form></td></tr>
        @empty
          <tr><td class="empty-cell" colspan="6">Nenhum produto cadastrado ainda.</td></tr>
        @endforelse
      </tbody></table></div>
    </section>
    <section class="panel" id="motoboys"><div class="panel-heading"><div><h2>Motoboys</h2><p class="panel-subtitle">Gerencie os entregadores cadastrados.</p></div><a class="btn btn-yellow" href="{{ route('motoboys') }}">＋ Ver motoboys</a></div><p class="panel-subtitle">Acesse a página de motoboys para cadastrar e atualizar sua equipe.</p></section>
  </main>
  <script>
    document.getElementById("datePicker").addEventListener("change",event=>{if(event.target.value){const d=new Date(`${event.target.value}T12:00:00`);document.getElementById("dateLabel").textContent=d.toLocaleDateString("pt-BR");document.getElementById("todayText").textContent=d.toLocaleDateString("pt-BR",{weekday:"long",day:"numeric",month:"long",year:"numeric"})}});
    const categorySelect=document.getElementById("product-category"),burgerTypeField=document.getElementById("burger-type-field"),burgerTypeSelect=document.getElementById("burger-type");
    function updateBurgerTypeField(){const isBurger=categorySelect.value==="lanches";burgerTypeField.hidden=!isBurger;burgerTypeSelect.required=isBurger;if(!isBurger){burgerTypeSelect.value=""}}
    categorySelect.addEventListener("change",updateBurgerTypeField);updateBurgerTypeField();
  </script>
</body>
