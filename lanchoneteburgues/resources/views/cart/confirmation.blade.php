<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedido enviado | Burguês</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f7f6f2;color:#1d1d1d;font-family:'DM Sans',Arial,sans-serif}.confirmation{width:min(640px,100% - 32px);margin:70px auto;padding:34px;border:1px solid #e7e4dc;border-radius:16px;background:#fff;text-align:center}.confirmation-icon{display:grid;place-items:center;width:58px;height:58px;margin:0 auto 18px;border-radius:50%;background:#e7f8ed;color:#12652f;font-size:28px}.confirmation h1{margin:0 0 10px;font-size:30px}.confirmation p{color:#555;line-height:1.6}.confirmation-items{margin:22px 0;padding:0;list-style:none;text-align:left}.confirmation-items li{display:flex;justify-content:space-between;gap:12px;padding:10px 0;border-bottom:1px solid #eee}.confirmation-total{margin:20px 0;font-size:20px;font-weight:800}.confirmation .cart-button{display:inline-flex;align-items:center;justify-content:center;min-height:44px;padding:0 18px;border-radius:7px;background:#ffcc00;color:#111;font-weight:800;text-decoration:none}
    </style>
</head>
<body style="background:#f7f6f2">
    @include('partials.public-navbar')
    <main class="confirmation">
        <div class="confirmation-icon" aria-hidden="true">✓</div>
        <h1>Pedido enviado!</h1>
        <p>Obrigado, {{ $order->customer_name }}. A loja recebeu seu pedido e entrará em contato pelo telefone {{ $order->customer_phone }}.</p>
        <p>Número do pedido: <strong>#{{ str_pad((string) $order->id, 6, '0', STR_PAD_LEFT) }}</strong></p>
        <ul class="confirmation-items">
            @foreach($order->items as $item)
                <li><span>{{ $item->quantity }} × {{ $item->product_name }}</span><strong>R$ {{ number_format((float) $item->line_total, 2, ',', '.') }}</strong></li>
            @endforeach
        </ul>
        <p class="confirmation-total">Total: R$ {{ number_format((float) $order->total, 2, ',', '.') }}</p>
        <a class="cart-button" href="{{ route('home') }}#cardapio">Voltar ao cardápio</a>
    </main>
</body>
</html>
