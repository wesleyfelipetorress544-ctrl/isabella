<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1d1d1d">

    <title>Meu Pedido | Burguês</title>


    <!-- FONTES -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700;800;900&family=DM+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">


    <!-- BOOTSTRAP -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- FAVICON -->

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('logoburguer.png') }}">


    <style>

        /* =====================================================
           VARIÁVEIS
        ===================================================== */

        :root {
            --yellow: #ffd400;
            --ink: #1d1d1d;
            --paper: #ffffff;
            --muted: #777;
            --line: #e9e7e1;
        }


        /* =====================================================
           RESET
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html {
            margin: 0 !important;
            padding: 0 !important;
            scroll-behavior: smooth;
            background: #fff;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;

            width: 100%;
            min-height: 100vh;

            background: #fff;
            color: #222;

            font-family: 'DM Sans', Arial, sans-serif;

            overflow-x: hidden;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .burgues-header {
            position: relative;
            z-index: 1000;

            width: 100%;
            height: 115px;
            min-height: 115px;

            margin: 0;
            padding: 0;

            background: #1d1d1d;
            color: #fff;
        }


        .burgues-header-inner {
            width: 100%;
            height: 115px;
            min-height: 115px;

            margin: 0;

            padding-left: clamp(40px, 4vw, 72px);
            padding-right: clamp(40px, 4vw, 72px);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 28px;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .burgues-header-brand {
            display: inline-flex;
            align-items: center;

            flex: 0 0 auto;

            text-decoration: none;
        }


        .burgues-header-brand img {
            display: block;

            width: 135px;
            height: 100px;

            object-fit: contain;

            transform: translateY(-8px);

            transform-origin: center;

            transition:
                transform .25s ease,
                filter .25s ease;
        }


        .burgues-header-brand:hover img,
        .burgues-header-brand:focus-visible img {

            transform:
                translateY(-12px)
                scale(1.08);

            filter:
                drop-shadow(
                    0 7px 14px
                    rgba(0, 0, 0, .25)
                );
        }


        /* =====================================================
           LINKS NAVBAR
        ===================================================== */

        .burgues-header-links {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: clamp(22px, 2.5vw, 42px);

            margin: 0;
            padding: 0;

            transform: translateY(-8px);
        }


        .burgues-header-links a {
            position: relative;

            display: inline-block;

            padding: 14px 6px;

            color: #fff;

            font:
                700
                clamp(12px, 1vw, 15px)
                'DM Sans',
                Arial,
                sans-serif;

            text-decoration: none;

            white-space: nowrap;

            cursor: pointer;

            animation:
                burgues-nav-enter
                .65s
                ease-out
                both;

            transition:
                color .2s ease,
                text-shadow .2s ease;
        }


        .burgues-header-links a:nth-child(1) {
            animation-delay: .08s;
        }

        .burgues-header-links a:nth-child(2) {
            animation-delay: .18s;
        }

        .burgues-header-links a:nth-child(3) {
            animation-delay: .28s;
        }

        .burgues-header-links a:nth-child(4) {
            animation-delay: .38s;
        }


        @keyframes burgues-nav-enter {

            from {
                opacity: 0;

                transform:
                    translateY(18px);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0);
            }

        }


        .burgues-header-links .nav-label {
            display: inline-block;

            pointer-events: none;

            transform-origin: center;
        }


        .burgues-header-links a:hover,
        .burgues-header-links a:focus-visible {

            color: var(--yellow);

            text-shadow:
                0 0 4px
                rgba(255, 204, 0, .4);
        }


        .burgues-header-links
        a.nav-link-animating
        .nav-label {

            animation:
                burgues-nav-link-motion
                .5s
                cubic-bezier(.2, .8, .2, 1)
                both;
        }


        @keyframes burgues-nav-link-motion {

            0% {
                transform:
                    translateY(0)
                    scale(1);
            }

            42% {
                transform:
                    translateY(-4px)
                    scale(1.05);
            }

            100% {
                transform:
                    translateY(0)
                    scale(1);
            }

        }


        /* =====================================================
           BOTÃO MEU PEDIDO
        ===================================================== */

        .burgues-header-order {
            display: inline-flex;
            align-items: center;

            text-decoration: none;

            min-height: 48px;

            padding: 0 20px;

            border: 0;
            border-radius: 5px;

            background: var(--yellow);

            color: #111;

            font:
                700
                13px
                'DM Sans',
                Arial,
                sans-serif;

            white-space: nowrap;

            cursor: pointer;

            transform: translateY(-8px);

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }


        .burgues-header-order:hover,
        .burgues-header-order:focus-visible {

            color: #111;

            transform:
                translateY(-10px);

            box-shadow:
                0 5px 16px
                rgba(0, 0, 0, .25);
        }


        /* =====================================================
           PÁGINA
        ===================================================== */

        .pedido-page {
            width: 100%;

            min-height:
                calc(100vh - 115px);

            background: #fff;
        }


        /* =====================================================
           HERO AMARELO
        ===================================================== */

        .pedido-hero {
            width: 100%;
            min-height: 250px;

            background: var(--yellow);

            padding:
                45px
                clamp(40px, 6vw, 90px);

            display: flex;
            align-items: center;

            color: #171717;

            overflow: hidden;
        }


        .pedido-hero-copy {
            max-width: 760px;
        }


        .pedido-kicker {
            display: block;

            margin-bottom: 14px;

            font-size: 10px;
            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .3px;
        }


        .pedido-hero h1 {
            margin: 0 0 13px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size:
                clamp(48px, 5vw, 72px);

            font-weight: 900;

            line-height: .92;

            text-transform: uppercase;

            letter-spacing: -1px;

            transform:
                translateY(0)
                scale(1);

            transform-origin:
                left center;

            transition:
                transform .25s ease,
                text-shadow .25s ease;
        }


        .pedido-hero h1:hover {

            transform:
                translateY(-7px)
                scale(1.025);

            text-shadow:
                0 8px 18px
                rgba(0, 0, 0, .12);
        }


        .pedido-hero p {
            margin: 0;

            font-size: 14px;

            color: #302d24;
        }


        /* =====================================================
           CONTEÚDO
        ===================================================== */

        .pedido-content {
            width: 100%;

            padding:
                50px
                clamp(40px, 6vw, 90px)
                80px;

            background: #fff;
        }


        .pedido-grid {
            width: 100%;

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                350px;

            gap: 45px;

            align-items: start;
        }


        /* =====================================================
           CABEÇALHO
        ===================================================== */

        .pedido-heading {
            margin-bottom: 30px;
        }


        .pedido-heading h2 {
            margin: 0 0 5px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size:
                clamp(30px, 3vw, 42px);

            font-weight: 900;

            text-transform: uppercase;

            line-height: 1;

            transform-origin:
                left center;

            transition:
                transform .25s ease;
        }


        .pedido-heading h2:hover {

            transform:
                translateY(-3px)
                scale(1.02);
        }


        .pedido-heading p {
            margin: 0;

            color: #888;

            font-size: 12px;
        }


        /* =====================================================
           LISTA
        ===================================================== */

        .pedido-list {
            display: flex;

            flex-direction: column;

            gap: 15px;
        }


        /* =====================================================
           ITEM
        ===================================================== */

        .pedido-item {
            width: 100%;

            padding: 15px;

            border:
                1px solid
                var(--line);

            border-radius: 10px;

            background: #fff;

            display: grid;

            grid-template-columns:
                115px
                minmax(0, 1fr)
                auto;

            align-items: center;

            gap: 20px;

            animation:
                pedido-enter
                .55s
                ease
                both;

            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }


        .pedido-item:hover {

            transform:
                translateY(-4px);

            border-color:
                #dedbd2;

            box-shadow:
                0 12px 30px
                rgba(0, 0, 0, .07);
        }


        @keyframes pedido-enter {

            from {
                opacity: 0;

                transform:
                    translateY(15px);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0);
            }

        }


        /* =====================================================
           IMAGEM
        ===================================================== */

        .pedido-item-image {
            width: 115px;
            height: 105px;

            border-radius: 8px;

            overflow: hidden;

            background: #f3f3f3;
        }


        .pedido-item-image img {
            display: block;

            width: 100%;
            height: 100%;

            object-fit: cover;

            transition:
                transform .35s ease;
        }


        .pedido-item:hover
        .pedido-item-image img {

            transform:
                scale(1.06);
        }


        /* =====================================================
           INFO
        ===================================================== */

        .pedido-item-info {
            min-width: 0;
        }


        .pedido-item-category {
            display: block;

            margin-bottom: 5px;

            color: #987100;

            font-size: 9px;
            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .7px;
        }


        .pedido-item-info h3 {
            margin: 0 0 6px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 25px;
            font-weight: 900;

            line-height: 1;

            text-transform: uppercase;
        }


        .pedido-item-info p {
            margin: 0 0 12px;

            color: #888;

            font-size: 11px;

            line-height: 1.5;
        }


        /* =====================================================
           QUANTIDADE
        ===================================================== */

        .quantidade {
            display: inline-flex;

            align-items: center;

            border:
                1px solid
                #e3e3e3;

            border-radius: 5px;

            overflow: hidden;
        }


        .quantidade button {
            width: 34px;
            height: 32px;

            padding: 0;

            border: 0;

            background: #f6f6f6;

            color: #222;

            font-size: 17px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background .2s ease,
                color .2s ease;
        }


        .quantidade button:hover {

            background: var(--yellow);

            color: #111;
        }


        .quantidade span {
            min-width: 38px;

            text-align: center;

            font-size: 12px;
            font-weight: 700;
        }


        /* =====================================================
           PREÇO
        ===================================================== */

        .pedido-item-price {
            height: 100%;

            padding: 5px 0;

            display: flex;

            flex-direction: column;

            align-items: flex-end;
            justify-content: space-between;
        }


        .pedido-item-price strong {

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 23px;
            font-weight: 900;

            white-space: nowrap;
        }


        .remove-item {
            padding: 0;

            border: 0;

            background: transparent;

            color: #999;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;

            cursor: pointer;

            transition:
                color .2s ease,
                transform .2s ease;
        }


        .remove-item:hover {

            color: #c40000;

            transform:
                translateY(-2px);
        }


        /* =====================================================
           PEDIDO VAZIO
        ===================================================== */

        .pedido-vazio {
            position: relative;

            width: 100%;
            min-height: 330px;

            border:
                1px solid
                #e9e9e9;

            border-radius: 10px;

            background: #fafafa;

            display: flex;

            align-items: center;
            justify-content: center;

            overflow: hidden;

            text-align: center;
        }


        .pedido-vazio::before {

            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            top: -160px;
            right: -100px;

            border-radius: 50%;

            background:
                rgba(255, 212, 0, .10);
        }


        .pedido-vazio::after {

            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            bottom: -100px;
            left: -60px;

            border-radius: 50%;

            background:
                rgba(255, 212, 0, .08);
        }


        .pedido-vazio-content {
            position: relative;

            z-index: 2;

            max-width: 450px;

            padding:
                40px 25px;

            animation:
                vazio-enter
                .65s
                .15s
                ease
                both;
        }


        @keyframes vazio-enter {

            from {
                opacity: 0;

                transform:
                    translateY(15px);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0);
            }

        }


        .pedido-vazio-icon {
            width: 62px;
            height: 62px;

            margin:
                0 auto
                20px;

            border-radius: 50%;

            background:
                var(--yellow);

            display: grid;

            place-items: center;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 26px;
            font-weight: 900;

            transition:
                transform .25s ease;
        }


        .pedido-vazio:hover
        .pedido-vazio-icon {

            transform:
                translateY(-5px)
                rotate(-5deg);
        }


        .pedido-vazio h3 {
            margin:
                0 0 10px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 34px;
            font-weight: 900;

            line-height: 1;

            text-transform: uppercase;

            color: #1d1d1d;
        }


        .pedido-vazio p {
            max-width: 360px;

            margin:
                0 auto
                20px;

            color: #777;

            font-size: 12px;

            line-height: 1.6;
        }


        .voltar-cardapio {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 44px;

            padding: 0 20px;

            border-radius: 5px;

            background:
                var(--yellow);

            color: #111;

            font-size: 11px;
            font-weight: 800;

            text-decoration: none;

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }


        .voltar-cardapio:hover {

            color: #111;

            transform:
                translateY(-3px);

            box-shadow:
                0 7px 16px
                rgba(0, 0, 0, .12);
        }


        /* =====================================================
           RESUMO
        ===================================================== */

        .pedido-resumo {
            position: sticky;

            top: 25px;

            width: 100%;

            border-radius: 10px;

            background:
                #1d1d1d;

            color: #fff;

            overflow: hidden;

            animation:
                resumo-enter
                .65s
                ease
                both;
        }


        @keyframes resumo-enter {

            from {
                opacity: 0;

                transform:
                    translateX(15px);
            }

            to {
                opacity: 1;

                transform:
                    translateX(0);
            }

        }


        .resumo-top {
            padding:
                26px 25px
                22px;

            border-bottom:
                1px solid
                rgba(255,255,255,.09);
        }


        .resumo-top span {
            display: block;

            margin-bottom: 5px;

            color:
                var(--yellow);

            font-size: 9px;
            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: .8px;
        }


        .resumo-top h2 {
            margin: 0;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 34px;
            font-weight: 900;

            text-transform: uppercase;

            line-height: 1;
        }


        .resumo-body {
            padding:
                23px 25px
                25px;
        }


        .resumo-linha {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 15px;

            color: #aaa;

            font-size: 11px;
        }


        .resumo-linha strong {

            color: #fff;

            font-size: 12px;
        }


        .resumo-divisor {
            width: 100%;
            height: 1px;

            margin:
                22px 0;

            background:
                rgba(255,255,255,.1);
        }


        .resumo-total {
            display: flex;

            align-items: flex-end;
            justify-content: space-between;

            gap: 20px;
        }


        .resumo-total span {
            font-size: 11px;
            font-weight: 700;

            text-transform: uppercase;
        }


        .resumo-total strong {

            color:
                var(--yellow);

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size: 32px;
            font-weight: 900;

            line-height: 1;
        }


        /* =====================================================
           BOTÃO CONTINUAR
        ===================================================== */

        .finalizar-pedido {
            width: 100%;
            min-height: 52px;

            margin-top: 24px;

            border: 0;
            border-radius: 5px;

            background:
                var(--yellow);

            color: #111;

            font-size: 12px;
            font-weight: 800;

            cursor: pointer;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }


        .finalizar-pedido:hover:not(:disabled) {

            transform:
                translateY(-3px);

            box-shadow:
                0 8px 20px
                rgba(0,0,0,.3);

            background:
                #ffdc26;
        }


        .finalizar-pedido:disabled {
            opacity: .4;

            cursor: not-allowed;
        }


        .continuar-comprando {
            display: block;

            margin-top: 16px;

            color: #888;

            font-size: 10px;
            font-weight: 700;

            text-align: center;

            text-decoration: none;

            transition:
                color .2s ease;
        }


        .continuar-comprando:hover {
            color: #fff;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .site-footer {
            width: 100%;

            background:
                #1d1d1d;

            color:
                #d3d2cc;

            padding:
                25px
                clamp(40px, 6vw, 90px);

            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }


        .footer-left {
            display: flex;

            align-items: center;

            gap: 15px;
        }


        .footer-logo {
            width: 85px;
            height: 60px;

            object-fit: contain;
        }


        .site-footer p {
            margin: 0;

            color: #999;

            font-size: 10px;
        }


        .site-footer > span {

            color: #999;

            font-size: 9px;
        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media(max-width: 1000px) {

            .pedido-grid {
                grid-template-columns:
                    1fr;
            }

            .pedido-resumo {
                position: relative;

                top: 0;
            }

        }


        @media(max-width: 850px) {

            .burgues-header {
                height: auto;

                min-height: 80px;
            }


            .burgues-header-inner {
                height: auto;

                min-height: 80px;

                flex-wrap: wrap;

                gap: 10px 18px;

                padding:
                    8px 18px;
            }


            .burgues-header-brand img {
                width: 105px;
                height: 75px;

                transform: none;
            }


            .burgues-header-brand:hover img,
            .burgues-header-brand:focus-visible img {

                transform:
                    scale(1.05);
            }


            .burgues-header-links {
                order: 3;

                width: 100%;

                justify-content:
                    flex-start;

                flex-wrap: nowrap;

                overflow-x: auto;

                gap: 20px;

                transform: none;
            }


            .burgues-header-links a {
                font-size: 12px;
            }


            .burgues-header-order {
                margin-left: auto;

                min-height: 42px;

                padding:
                    0 14px;

                font-size: 11px;

                transform: none;
            }


            .burgues-header-order:hover,
            .burgues-header-order:focus-visible {

                transform:
                    translateY(-1px);
            }

        }


        @media(max-width: 700px) {

            .pedido-hero {
                min-height: auto;

                padding:
                    35px 25px;
            }


            .pedido-hero h1 {
                font-size: 46px;
            }


            .pedido-content {
                padding:
                    35px 25px
                    60px;
            }


            .pedido-item {

                grid-template-columns:
                    90px
                    minmax(0, 1fr);

                gap: 15px;
            }


            .pedido-item-image {
                width: 90px;
                height: 90px;
            }


            .pedido-item-price {
                grid-column:
                    1 / -1;

                height: auto;

                flex-direction: row;

                align-items: center;
            }


            .site-footer {
                align-items:
                    flex-start;

                flex-direction:
                    column;

                padding:
                    22px 25px;
            }

        }


        @media(max-width: 450px) {

            .pedido-item {

                grid-template-columns:
                    1fr;
            }


            .pedido-item-image {
                width: 100%;
                height: 190px;
            }


            .pedido-item-price {
                grid-column: auto;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <header class="burgues-header">

        <div class="burgues-header-inner">


            <!-- LOGO -->

            <a
                class="burgues-header-brand"
                href="{{ url('/') }}"
                aria-label="Burguês, início">

                <img
                    src="{{ asset('logoburguer.png') }}"
                    alt="Burguês">

            </a>


            <!-- LINKS -->

            <nav
                class="burgues-header-links"
                aria-label="Navegação principal">


                <a href="{{ url('/') }}#cardapio">

                    <span class="nav-label">
                        Cardápio
                    </span>

                </a>


                <a href="{{ url('/promocoes') }}">

                    <span class="nav-label">
                        Promoções
                    </span>

                </a>


                <a href="{{ route('bebidas') }}">

                    <span class="nav-label">
                        Bebidas
                    </span>

                </a>


                <a href="{{ route('acompanhamentopage') }}">

                    <span class="nav-label">
                        Acompanhamentos
                    </span>

                </a>


            </nav>


            <!-- MEU PEDIDO -->

            <a
                class="burgues-header-order"
                href="{{ route('cart.index') }}">

                ▣ &nbsp;Meu pedido ·

                <span data-cart-item-count>
                    {{ $cartItemCount ?? 0 }}
                </span>

            </a>


        </div>

    </header>


    <!-- =====================================================
         PÁGINA
    ====================================================== -->

    <main class="pedido-page">


        <!-- =================================================
             HERO
        ================================================== -->

        <section class="pedido-hero">

            <div class="pedido-hero-copy">

                <span class="pedido-kicker">
                    SEU CARRINHO
                </span>

                <h1>
                    MEU<br>
                    PEDIDO.
                </h1>

                <p>
                    Revise os itens antes de continuar com o seu pedido.
                </p>

            </div>

        </section>


        <!-- =================================================
             CONTEÚDO
        ================================================== -->

        <section class="pedido-content">

            <div class="pedido-grid">


                <!-- =========================================
                     PRODUTOS
                ========================================== -->

                <div>

                    <div class="pedido-heading">

                        <h2>
                            SEU PEDIDO
                        </h2>

                        <p>
                            Confira os itens adicionados ao carrinho.
                        </p>

                    </div>


                    @if(isset($cartItems) && count($cartItems) > 0)


                        <div class="pedido-list">


                            @foreach($cartItems as $item)


                                @php
                                    $product = is_array($item)
                                        ? ($item['product'] ?? null)
                                        : ($item->product ?? null);

                                    $quantity = is_array($item)
                                        ? ($item['quantity'] ?? 1)
                                        : ($item->quantity ?? 1);

                                    $name = 'Produto';
                                    $description = '';
                                    $image = null;
                                    $price = 0;

                                    if ($product) {

                                        if (is_array($product)) {

                                            $name =
                                                $product['name']
                                                ?? 'Produto';

                                            $description =
                                                $product['description']
                                                ?? '';

                                            $image =
                                                $product['image_path']
                                                ?? null;

                                            $price =
                                                $product['price']
                                                ?? 0;

                                        } else {

                                            $name =
                                                $product->name
                                                ?? 'Produto';

                                            $description =
                                                $product->description
                                                ?? '';

                                            $image =
                                                $product->image_path
                                                ?? null;

                                            $price =
                                                $product->price
                                                ?? 0;

                                        }

                                    }
                                @endphp


                                <article class="pedido-item">


                                    <!-- IMAGEM -->

                                    <div class="pedido-item-image">


                                        @if($image)

                                            <img
                                                src="{{ asset('storage/' . $image) }}"
                                                alt="{{ $name }}">

                                        @else

                                            <div
                                                style="
                                                    width: 100%;
                                                    height: 100%;
                                                    background: #f3f3f3;
                                                ">
                                            </div>

                                        @endif


                                    </div>


                                    <!-- INFORMAÇÕES -->

                                    <div class="pedido-item-info">

                                        <span class="pedido-item-category">
                                            Burguês
                                        </span>


                                        <h3>
                                            {{ $name }}
                                        </h3>


                                        @if($description)

                                            <p>
                                                {{ $description }}
                                            </p>

                                        @endif


                                        <form
                                            class="quantidade"
                                            method="POST"
                                            action="{{ route('cart.items.update', $product) }}">

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                name="quantity"
                                                value="{{ max(1, $quantity - 1) }}"
                                                class="diminuir"
                                                aria-label="Diminuir quantidade de {{ $name }}"
                                                @disabled($quantity <= 1)>

                                                −

                                            </button>


                                            <span>
                                                {{ $quantity }}
                                            </span>


                                            <button
                                                type="submit"
                                                name="quantity"
                                                value="{{ min(20, $quantity + 1) }}"
                                                class="aumentar"
                                                aria-label="Aumentar quantidade de {{ $name }}"
                                                @disabled($quantity >= 20)>

                                                +

                                            </button>

                                        </form>


                                    </div>


                                    <!-- PREÇO -->

                                    <div class="pedido-item-price">


                                        <strong>

                                            R$
                                            {{ number_format(
                                                $price * $quantity,
                                                2,
                                                ',',
                                                '.'
                                            ) }}

                                        </strong>


                                        <form
                                            method="POST"
                                            action="{{ route('cart.items.destroy', $product) }}">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="remove-item">

                                                Remover

                                            </button>

                                        </form>


                                    </div>


                                </article>


                            @endforeach


                        </div>


                    @else


                        <!-- =================================
                             CARRINHO VAZIO
                        ================================== -->

                        <div class="pedido-vazio">


                            <div class="pedido-vazio-content">


                                <div class="pedido-vazio-icon">
                                    0
                                </div>


                                <h3>

                                    SEU PEDIDO<br>
                                    ESTÁ VAZIO.

                                </h3>


                                <p>

                                    Você ainda não adicionou nenhum item.

                                    Escolha seu lanche e ele aparecerá
                                    aqui.

                                </p>


                                <a
                                    href="{{ url('/') }}#cardapio"
                                    class="voltar-cardapio">

                                    VER CARDÁPIO

                                </a>


                            </div>


                        </div>


                    @endif


                </div>


                <!-- =========================================
                     RESUMO
                ========================================== -->

                <aside class="pedido-resumo">


                    <div class="resumo-top">

                        <span>
                            RESUMO
                        </span>

                        <h2>
                            SEU PEDIDO
                        </h2>

                    </div>


                    <div class="resumo-body">


                        <div class="resumo-linha">

                            <span>
                                Produtos
                            </span>

                            <strong>
                                {{ $cartItemCount ?? 0 }}
                            </strong>

                        </div>


                        <div class="resumo-linha">

                            <span>
                                Subtotal
                            </span>

                            <strong>

                                R$
                                {{ number_format(
                                    $subtotal ?? 0,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </div>


                        <div class="resumo-linha">

                            <span>
                                Entrega
                            </span>

                            <strong>
                                A calcular
                            </strong>

                        </div>


                        <div class="resumo-divisor"></div>


                        <div class="resumo-total">

                            <span>
                                Total
                            </span>

                            <strong>

                                R$
                                {{ number_format(
                                    $total ?? $subtotal ?? 0,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </div>


                        @if(($cartItemCount ?? 0) > 0)

                            <button
                                type="button"
                                class="finalizar-pedido">

                                CONTINUAR PEDIDO

                            </button>

                        @else

                            <button
                                type="button"
                                class="finalizar-pedido"
                                disabled>

                                CARRINHO VAZIO

                            </button>

                        @endif


                        <a
                            href="{{ url('/') }}#cardapio"
                            class="continuar-comprando">

                            ← CONTINUAR COMPRANDO

                        </a>


                    </div>


                </aside>


            </div>

        </section>


    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="site-footer">


        <div class="footer-left">


            <img
                class="footer-logo"
                src="{{ asset('logoburguer.png') }}"
                alt="Burguês">


            <p>
                Feito na brasa, servido com vontade.
            </p>


        </div>


        <span>
            Consulte disponibilidade e valores no atendimento.
        </span>


    </footer>


    <!-- =====================================================
         BOOTSTRAP
    ====================================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {


                /* =============================================
                   NAVBAR
                ============================================= */

                const nav =
                    document.querySelector(
                        '.burgues-header-links'
                    );


                if (nav) {


                    const links =
                        nav.querySelectorAll('a');


                    links.forEach(function (link) {


                        link.addEventListener(
                            'mouseenter',
                            function () {


                                link.classList.remove(
                                    'nav-link-animating'
                                );


                                void link.offsetWidth;


                                link.classList.add(
                                    'nav-link-animating'
                                );


                            }
                        );


                        link.addEventListener(
                            'animationend',
                            function (event) {


                                if (
                                    event.animationName ===
                                    'burgues-nav-link-motion'
                                ) {


                                    link.classList.remove(
                                        'nav-link-animating'
                                    );


                                }


                            }
                        );


                    });


                }


            }
        );

    </script>


</body>

</html>