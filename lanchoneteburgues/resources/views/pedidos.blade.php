<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#101010">
  <title>Pedidos | Burgues</title><link rel="icon" type="image/png" href="{{ asset('logoburguer.png') }}">
  <style>
    :root{--ink:#111214;--muted:#686c75;--line:#e1e4e9;--yellow:#ffd21a;--paper:#f5f6f8}
    *{box-sizing:border-box}body{margin:0;background:var(--paper);color:var(--ink);font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif;font-size:14px;-webkit-font-smoothing:antialiased}button,input,select{font:inherit}button{cursor:pointer}
    .topbar{height:80px;background:#111;color:#fff;border-bottom:1px solid #2a2a2a}.nav{max-width:1532px;height:100%;margin:auto;display:flex;align-items:center;padding:0 8px;gap:40px}.brand{width:230px;display:flex;align-items:center}.brand img{width:96px;height:68px;object-fit:contain}.nav-links{display:flex;align-items:center;gap:31px;height:100%;flex:1}.nav-link{height:100%;display:flex;align-items:center;gap:10px;color:#f3f3f3;text-decoration:none;font-weight:650;padding:0 8px;border-bottom:3px solid transparent;white-space:nowrap}.nav-link svg{width:20px;height:20px}.nav-link.active{color:var(--yellow);border-color:var(--yellow)}.nav-actions{display:flex;align-items:center;gap:22px;padding-left:34px;border-left:1px solid #393939}.btn{border:1px solid transparent;border-radius:11px;padding:12px 20px;display:inline-flex;align-items:center;justify-content:center;gap:9px;font-weight:700;white-space:nowrap}.btn svg{width:17px;height:17px}.btn-outline{background:transparent;color:#fff;border-color:var(--yellow);min-width:124px;text-decoration:none}.btn-yellow{background:var(--yellow);color:#111;min-width:100px}.mobile-menu{display:none;background:none;border:0;color:white}
    main{max-width:1532px;margin:0 auto;padding:27px 8px 50px}.heading{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:23px}.heading h1{font-size:31px;line-height:1.2;letter-spacing:-1.35px;margin:0 0 5px;font-weight:800}.subtitle{font-size:15px;color:var(--muted);margin:0}.heading-actions{display:flex;gap:10px}.control{height:43px;border:1px solid var(--line);border-radius:10px;background:#fff;color:#272a30;padding:0 13px;outline:none}.control:focus{border-color:#d7a800;box-shadow:0 0 0 3px #ffd21a2b}.btn-filter{display:flex;align-items:center;gap:9px}.btn-filter svg{width:17px;height:17px}.summary{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;margin-bottom:21px}.summary-card{background:#fff;border-radius:13px;padding:17px 19px;box-shadow:0 4px 18px #10182808}.summary-label{color:#656973;font-size:13px;margin-bottom:6px}.summary-value{font-weight:800;font-size:25px;letter-spacing:-.6px}.summary-detail{font-size:12px;color:#858993;margin-top:4px}.panel{background:#fff;border-radius:14px;padding:19px 20px;box-shadow:0 4px 18px #10182808}.panel-heading{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}.panel h2{font-size:22px;letter-spacing:-.7px;margin:0;font-weight:800}.order-count{background:#fff4d4;color:#8a6200;border-radius:20px;padding:6px 11px;font-size:12px;font-weight:700}.filters{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:10px;margin-bottom:15px}.search{width:100%}.table-scroll{overflow-x:auto}table{border-collapse:collapse;width:100%;min-width:850px}thead{background:#f1f2f4}th{text-align:left;padding:12px 13px;font-size:13px;white-space:nowrap}td{padding:14px 13px;border-bottom:1px solid #f0f1f3}.empty{text-align:center;height:150px;color:#555b65}.empty svg{width:33px;height:33px;display:block;margin:0 auto 8px}.empty small{display:block;margin-top:5px;color:#898d95}.status{display:inline-flex;border-radius:20px;padding:5px 10px;font-size:12px;font-weight:700}.status.novo{background:#e8f1ff;color:#1768c6}.status.preparando{background:#fff2cc;color:#956400}.status.pronto{background:#e3f7e9;color:#16843b}.status.finalizado{background:#eeeef0;color:#666}.status.cancelado{background:#ffebeb;color:#bc3434}.row-action{border:1px solid var(--line);background:#fff;border-radius:8px;padding:7px 10px;font-weight:650}.pagination{display:flex;align-items:center;justify-content:space-between;color:var(--muted);font-size:13px;padding-top:15px}.pages{display:flex;gap:6px}.page{width:33px;height:33px;border:1px solid var(--line);border-radius:8px;background:white}.page.current{background:var(--yellow);border-color:var(--yellow);font-weight:750}
    @media(max-width:1100px){.nav{gap:18px}.brand{width:130px}.nav-links{gap:10px}.nav-actions{gap:10px;padding-left:15px}.summary{grid-template-columns:repeat(2,minmax(0,1fr))}.filters{grid-template-columns:repeat(2,minmax(0,1fr))}}
    @media(max-width:700px){.topbar{height:66px}.nav{padding:0 15px;justify-content:space-between}.brand{width:auto}.brand img{height:57px;width:83px}.mobile-menu{display:block}.nav-links{display:none;position:absolute;top:66px;left:0;right:0;z-index:5;background:#111;height:auto;padding:8px 16px 16px;flex-direction:column;align-items:stretch}.nav-links.open{display:flex}.nav-link{height:45px;border:0;border-left:3px solid transparent}.nav-link.active{border-left-color:var(--yellow)}.nav-actions{border:0;padding:0;gap:8px}.nav-actions .btn{min-width:0;padding:9px 11px}.nav-actions .btn-outline{display:none}main{padding:22px 14px 35px}.heading{gap:12px}.heading h1{font-size:25px}.subtitle{font-size:13px}.heading-actions .control{width:43px;color:transparent;padding:0}.summary{gap:10px}.summary-card{padding:13px}.summary-value{font-size:21px}.summary-label,.summary-detail{font-size:11px}.panel{padding:15px 12px}.panel h2{font-size:20px}.filters{grid-template-columns:1fr}.pagination{gap:8px;flex-wrap:wrap}}
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
      <a href="{{ route('admin') }}"><span class="nav-label">Painel</span></a>
      <a href="{{ route('pedidos') }}" aria-current="page"><span class="nav-label">Pedidos</span></a>
      <a href="{{ route('produtos') }}"><span class="nav-label">Produtos</span></a>
      <a href="{{ route('motoboys') }}"><span class="nav-label">Motoboys</span></a>
    </nav>
    <a class="burgues-header-order" href="{{ url('/') }}">Ver loja</a>
  </div></header>
  <main>
    <section class="heading"><div><h1>Pedidos</h1><p class="subtitle">Acompanhe e gerencie os pedidos recebidos pela sua loja.</p></div><div class="heading-actions"><select class="control" id="dateFilter" aria-label="Período"><option value="">Hoje · 13/10/2026</option><option>Últimos 7 dias</option><option>Este mês</option><option>Todo o período</option></select></div></section>
    <section class="summary" aria-label="Resumo dos pedidos">
      <article class="summary-card"><div class="summary-label">Total de pedidos</div><div class="summary-value" id="totalCount">{{ $totalCount }}</div><div class="summary-detail">Pedidos registrados</div></article>
      <article class="summary-card"><div class="summary-label">Novos pedidos</div><div class="summary-value" id="newCount">{{ $newCount }}</div><div class="summary-detail">Aguardando confirmação</div></article>
      <article class="summary-card"><div class="summary-label">Em preparo</div><div class="summary-value" id="prepCount">{{ $prepCount }}</div><div class="summary-detail">Na cozinha agora</div></article>
      <article class="summary-card"><div class="summary-label">Vendas registradas</div><div class="summary-value" id="salesTotal">R$ {{ number_format((float) $salesTotal, 2, ',', '.') }}</div><div class="summary-detail">Soma dos pedidos</div></article>
    </section>
    <section class="panel"><div class="panel-heading"><h2>Todos os pedidos</h2><span class="order-count" id="orderCount">0 pedidos</span></div>
      <div class="filters"><input class="control search" id="search" placeholder="Buscar pedido ou cliente..." aria-label="Buscar pedido ou cliente"><select class="control" id="statusFilter" aria-label="Filtrar status"><option value="">Todos os status</option><option>Novo</option><option>Em preparo</option><option>Pronto</option><option>Finalizado</option><option>Cancelado</option></select><select class="control" id="paymentFilter" aria-label="Filtrar pagamento"><option value="">Todas as formas de pagamento</option><option>Pix</option><option>Cartão</option><option>Dinheiro</option></select><select class="control" id="typeFilter" aria-label="Filtrar tipo de entrega"><option value="">Retirada e entrega</option><option>Retirada</option><option>Entrega</option></select></div>
      <div class="table-scroll"><table><thead><tr><th># Pedido</th><th>Cliente</th><th>Telefone</th><th>Endereço</th><th>Itens</th><th>Total</th><th>Status</th><th>Horário</th></tr></thead><tbody id="orderRows">
        @forelse($orders as $order)
          <tr>
            <td>#{{ str_pad((string) $order->id, 6, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->customer_phone }}</td>
            <td>{{ $order->delivery_address }}</td>
            <td>@foreach($order->items as $item){{ $item->quantity }} × {{ $item->product_name }}@if(! $loop->last)<br>@endif @endforeach</td>
            <td>R$ {{ number_format((float) $order->total, 2, ',', '.') }}</td>
            <td><span class="status {{ $order->status === 'preparo' ? 'preparando' : $order->status }}">{{ ['novo' => 'Novo', 'preparo' => 'Em preparo', 'pronto' => 'Pronto', 'finalizado' => 'Finalizado', 'cancelado' => 'Cancelado'][$order->status] ?? $order->status }}</span></td>
            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
          </tr>
        @empty
          <tr><td class="empty" colspan="8"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="5" y="3" width="14" height="19" rx="1"/><path d="M9 3V2h6v1M9 8h6M9 12h6M9 16h4"/></svg>Nenhum pedido registrado.<small>Os novos pedidos da loja aparecerão aqui.</small></td></tr>
        @endforelse
      </tbody></table></div>
      <div class="pagination"><span id="pageInfo">Mostrando {{ $orders->count() }} de {{ $totalCount }} pedidos</span></div>
    </section>
  </main>
  <script>
    
    // Esta tela está pronta para receber os pedidos quando a loja tiver uma API conectada.
    const filters=['search','statusFilter','paymentFilter','typeFilter'];filters.forEach(id=>document.getElementById(id).addEventListener('input',()=>{}));
  </script>
</body>
</html>


