<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1d1d1d">

    <title>Burguês</title>

    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=DM+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- FAVICON -->
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('logoburguer.png') }}">

    <style>

        :root {
            --ink: #1d1d1d;
            --yellow: #ffcc00;
            --muted: #aaa;
        }

        /* =====================================================
           RESET
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100%;
            min-height: 100%;
            border: 0 !important;
            background: #1d1d1d;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .site-header {
            position: relative;
            z-index: 1000;

            display: block;

            width: 100%;
            height: 115px;
            min-height: 115px;

            margin: 0 !important;
            padding: 0 !important;

            border: 0 !important;
            outline: 0 !important;
            box-shadow: none !important;

            background: var(--ink);
            color: #fff;
        }

        .header-inner {
            width: 100%;
            max-width: none;

            height: 115px;
            min-height: 115px;

            margin: 0;

            padding-left: clamp(40px, 4vw, 72px);
            padding-right: clamp(40px, 4vw, 72px);

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 25px;

            transform: translateY(6px);
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .brand {
            display: inline-flex;
            flex: 0 0 auto;
            align-items: center;
            text-decoration: none;
        }

        .brand-logo {
            display: block;

            width: 135px;
            height: 100px;

            object-fit: contain;

            transform-origin: center;

            transition:
                transform .22s ease,
                filter .22s ease;
        }

        .brand:hover .brand-logo,
        .brand:focus-visible .brand-logo {
            transform: scale(1.08);

            filter:
                drop-shadow(
                    0 7px 14px
                    rgba(0, 0, 0, .25)
                );
        }


        /* =====================================================
           LINKS NAVBAR
        ===================================================== */

        .site-nav {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: clamp(22px, 2.5vw, 42px);

            margin: 0;
            padding: 0;

            border: 0;
        }

        .site-nav a {
            position: relative;

            display: inline-block;

            padding: 14px 6px;

            color: #fff;

            font-size: clamp(12px, 1vw, 15px);
            font-weight: 700;

            text-decoration: none;
            white-space: nowrap;

            cursor: pointer;

            transition:
                color .2s ease,
                text-shadow .2s ease;
        }

        .site-nav a > span {
            display: inline-block;
        }

        .site-nav a:hover,
        .site-nav a:focus-visible {
            color: var(--yellow);

            text-shadow:
                0 0 4px
                rgba(255, 204, 0, .4);
        }


        /* =====================================================
           ANIMAÇÃO NAVBAR
        ===================================================== */

        .site-nav a.nav-link-animating > span {
            animation:
                nav-link-motion
                .5s
                cubic-bezier(.2, .8, .2, 1)
                both;
        }

        @keyframes nav-link-motion {

            0% {
                transform: translateY(0) scale(1);
            }

            42% {
                transform: translateY(-4px) scale(1.05);
            }

            100% {
                transform: translateY(0) scale(1);
            }

        }


        /* =====================================================
           BOTÃO PEDIDO
        ===================================================== */

        .order-button {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            border: 0;
            border-radius: 5px;

            background: var(--yellow);

            padding: 14px 20px;

            color: #111;

            font-size: 13px;
            font-weight: 800;

            white-space: nowrap;

            cursor: pointer;

            transition:
                box-shadow .2s ease,
                transform .2s ease;
        }

        .order-button:hover,
        .order-button:focus-visible {
            box-shadow:
                0 5px 16px
                rgba(0, 0, 0, .25);

            transform: translateY(-2px);
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            display: grid;

            min-height: clamp(300px, 38vw, 680px);

            grid-template-columns: 47.2% 52.8%;

            margin: 0;
            padding: 0;

            background: #171717;
            color: #fff;
        }

        .hero-copy {
            display: flex;
            flex-direction: column;
            justify-content: center;

            padding:
                42px
                clamp(28px, 7vw, 120px);

            padding-right: 20px;
        }


        /* =====================================================
           ANIMAÇÃO HERO
        ===================================================== */

        .hero-copy > * {
            animation:
                copy-enter
                .65s
                ease-out
                both;
        }

        .hero-copy > :nth-child(1) {
            animation-delay: .08s;
        }

        .hero-copy > :nth-child(2) {
            animation-delay: .18s;
        }

        .hero-copy > :nth-child(3) {
            animation-delay: .28s;
        }

        @keyframes copy-enter {

            from {
                opacity: 0;
                translate: 0 18px;
            }

            to {
                opacity: 1;
                translate: 0 0;
            }

        }


        /* =====================================================
           EYEBROW
        ===================================================== */

        .eyebrow {
            align-self: flex-start;

            margin-bottom: 24px;

            border-radius: 3px;

            background: var(--yellow);

            padding: 6px 10px;

            color: #111;

            font-size: 12px;
            font-weight: 800;

            transform-origin: left center;

            transition:
                transform .25s ease,
                text-shadow .25s ease;
        }

        .eyebrow:hover {
            transform:
                translateY(-14px)
                scale(1.025);

            text-shadow:
                0 8px 18px
                rgba(0, 0, 0, .22);
        }


        /* =====================================================
           TÍTULO HERO
        ===================================================== */

        .hero h1 {
            margin: 0 0 12px;

            font-family: 'Anton', sans-serif;

            font-size: clamp(48px, 6.2vw, 88px);

            line-height: 1.02;

            letter-spacing: -.3px;

            transform-origin: left center;

            transition:
                transform .25s ease,
                text-shadow .25s ease;
        }

        .hero h1:hover {
            transform:
                translateY(-14px)
                scale(1.025);

            text-shadow:
                0 8px 18px
                rgba(0, 0, 0, .22);
        }


        /* =====================================================
           DESCRIÇÃO HERO
        ===================================================== */

        .hero-copy p {
            max-width: 510px;

            margin: 0 0 18px;

            color: #aaa;

            font-size: clamp(14px, 1.15vw, 18px);

            line-height: 1.6;

            transform-origin: left center;

            transition:
                transform .25s ease,
                text-shadow .25s ease;
        }

        .hero-copy p:hover {
            transform:
                translateY(-14px)
                scale(1.025);

            text-shadow:
                0 8px 18px
                rgba(0, 0, 0, .22);
        }


        /* =====================================================
           FOTO HERO
        ===================================================== */

        .hero-photo {
            position: relative;

            min-height: clamp(300px, 38vw, 680px);

            overflow: hidden;

            background: #28231d;

            isolation: isolate;
        }

        .hero-photo::after {
            position: absolute;

            z-index: 2;

            inset: 0;

            content: "";

            pointer-events: none;

            background:
                linear-gradient(
                    112deg,
                    transparent 30%,
                    rgba(255, 255, 255, .10) 48%,
                    transparent 66%
                );

            translate: -120% 0;

            animation:
                photo-sheen
                8s
                1.4s
                ease-in-out
                infinite;
        }

        @keyframes photo-sheen {

            0%,
            58%,
            100% {
                translate: -120% 0;
            }

            78% {
                translate: 120% 0;
            }

        }


        /* =====================================================
           CARROSSEL
        ===================================================== */

        .hero-carousel,
        .hero-carousel .carousel-inner,
        .hero-carousel .carousel-item {
            height: 100%;
        }

        .hero-carousel {
            position: absolute;
            inset: 0;
        }

        .hero-carousel .carousel-item {
            transition:
                transform
                .95s
                cubic-bezier(.22, .61, .36, 1)
                !important;
        }

        .hero-carousel .carousel-item img {
            display: block;

            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            filter:
                saturate(.92)
                contrast(1.04)
                brightness(.9);
        }


        /* =====================================================
           INDICADORES
        ===================================================== */

        .hero-carousel .carousel-indicators {
            margin-bottom: 20px;
        }

        .hero-carousel .carousel-indicators [data-bs-target] {
            width: 9px;
            height: 9px;

            margin: 0 5px;

            border: 0;
            border-radius: 50%;

            background-color: #fff;

            opacity: .65;
        }

        .hero-carousel .carousel-indicators .active {
            background-color: var(--yellow);
            opacity: 1;
        }


        /* =====================================================
           SETAS
        ===================================================== */

        .hero-carousel .carousel-control-prev,
        .hero-carousel .carousel-control-next {
            top: 50%;
            bottom: auto;

            width: 44px;
            height: 44px;

            transform: translateY(-50%);

            border-radius: 50%;

            background:
                rgba(20, 20, 20, .72);

            opacity: 1;

            transition:
                background-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease;
        }

        .hero-carousel .carousel-control-prev {
            left: 22px;
        }

        .hero-carousel .carousel-control-next {
            right: 22px;
        }

        .hero-carousel .carousel-control-prev-icon,
        .hero-carousel .carousel-control-next-icon {
            width: 18px;
            height: 18px;
        }

        .hero-carousel .carousel-control-prev:hover,
        .hero-carousel .carousel-control-next:hover,
        .hero-carousel .carousel-control-prev:focus-visible,
        .hero-carousel .carousel-control-next:focus-visible {
            background: var(--yellow);

            box-shadow:
                0 0 0 5px
                rgba(255, 204, 0, .24);

            transform:
                translateY(-50%)
                scale(1.08);
        }

        .hero-carousel .carousel-control-prev:hover
        .carousel-control-prev-icon,

        .hero-carousel .carousel-control-next:hover
        .carousel-control-next-icon {
            filter: brightness(0);
        }


        /* =====================================================
           CARDÁPIO
        ===================================================== */

        .menu-section {
            min-height: 100vh;

            /*
             * AUMENTADO:
             * mais espaço acima e abaixo.
             */
            padding: 60px 0 70px;

            background: #fff;
        }

        .container.menu-container {
            width: 100%;
            max-width: none;

            margin-right: 0;
            margin-left: 0;

            padding-right: clamp(24px, 4vw, 64px);
            padding-left: clamp(24px, 4vw, 64px);
        }


        /* =====================================================
           TÍTULO CARDÁPIO
        ===================================================== */

        .menu-heading {
            display: flex;

            align-items: center;
            justify-content: center;

            text-align: center;
        }

        .menu-heading > div {
            text-align: center;
        }

        .menu-heading h2 {
            margin: 0;

            font-family: 'Anton', sans-serif;

            /*
             * AUMENTADO
             */
            font-size: clamp(38px, 3.4vw, 54px);

            line-height: 1.05;

            letter-spacing: .2px;
        }

        .menu-heading p {
            /*
             * AUMENTADO O ESPAÇO
             */
            margin: 10px 0 0;

            color: #777;

            /*
             * AUMENTADO
             */
            font-size: 17px;

            line-height: 1.5;
        }


        /* =====================================================
           CATEGORIAS
        ===================================================== */

        .menu-tools {
            display: flex;

            align-items: center;
            justify-content: center;

            gap: 14px;

            /*
             * MAIS DISTÂNCIA DO TEXTO
             */
            margin-top: 28px;
        }

        .category-list {
            position: relative;

            display: flex;

            justify-content: center;

            /*
             * MAIS ESPAÇO ENTRE OS BOTÕES
             */
            gap: 10px;
        }

        .category-indicator {
            position: absolute;

            top: 0;
            left: 0;

            z-index: 0;

            width: 0;
            height: 0;

            border-radius: 5px;

            background: #171717;

            pointer-events: none;

            transform: translate(0, 0);

            transition:
                width .22s ease,
                height .22s ease,
                transform .22s ease;
        }

        .category {
            position: relative;

            z-index: 1;

            border: 1px solid transparent;

            border-radius: 5px;

            background: transparent;

            /*
             * BOTÕES MAIORES
             */
            padding: 14px 23px;

            color: #161616;

            /*
             * TEXTO MAIOR
             */
            font-size: 15px;

            font-weight: 700;

            transition:
                color .18s ease,
                transform .18s ease;
        }

        .category.selected,
        .category:hover,
        .category:focus-visible {
            color: var(--yellow);
        }

        .category.selected {
            background: #171717;
        }

        .category:hover,
        .category:focus-visible {
            transform:
                translateY(-3px)
                scale(1.03);
        }


        /* =====================================================
           RODAPÉ
        ===================================================== */

        .site-footer {
            width: 100%;

            min-height: 95px;

            padding:
                18px
                clamp(40px, 4vw, 85px);

            background: #1d1d1d;
            color: #fff;

            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 30px;
        }

        .footer-left {
            display: flex;

            align-items: center;

            gap: 18px;
        }

        .footer-logo {
            display: block;

            width: 72px;
            height: 58px;

            object-fit: contain;

            transition:
                transform .25s ease,
                filter .25s ease;
        }

        .footer-logo:hover {
            transform: scale(1.07);

            filter:
                drop-shadow(
                    0 5px 10px
                    rgba(0, 0, 0, .25)
                );
        }

        .footer-left p {
            margin: 0;

            color: #999;

            font-size: 9px;

            font-weight: 400;
        }

        .site-footer > span {
            margin: 0;

            color: #999;

            font-size: 9px;

            font-weight: 400;

            text-align: right;
        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (min-width: 1000px) {

            .menu-container {
                max-width: 1500px;
            }

        }


        @media (max-width: 600px) {

            /* NAVBAR */

            .site-header {
                height: auto;
                min-height: 80px;

                padding: 10px 0 !important;
            }

            .header-inner {
                height: auto;
                min-height: 80px;

                flex-wrap: wrap;

                gap: 10px;

                padding-left: 20px;
                padding-right: 20px;

                transform: none;
            }

            .brand-logo {
                width: 105px;
                height: 75px;
            }

            .site-nav {
                order: 3;

                width: 100%;

                overflow-x: auto;

                justify-content: flex-start;

                gap: 20px;
            }

            .site-nav a {
                font-size: 12px;
            }

            .order-button {
                margin-left: auto;

                padding: 10px 12px;

                font-size: 11px;
            }


            /* HERO */

            .hero {
                grid-template-columns: 1fr;
            }

            .hero-copy {
                min-height: 250px;

                padding: 28px 22px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero-photo {
                min-height: 230px;
            }


            /* CARDÁPIO */

            .menu-section {
                padding:
                    42px 0
                    55px;
            }

            .menu-heading h2 {
                font-size: 34px;
            }

            .menu-heading p {
                max-width: 360px;

                margin:
                    9px auto 0;

                font-size: 14px;
            }

            .menu-tools {
                align-items: center;

                flex-direction: column;

                margin-top: 22px;
            }

            .category-list {
                width: 100%;

                justify-content: flex-start;

                flex-wrap: nowrap;

                overflow-x: auto;

                gap: 5px;

                padding-bottom: 8px;
            }

            .category {
                flex: 0 0 auto;

                padding: 12px 18px;

                font-size: 13px;
            }


            /* FOOTER */

            .site-footer {
                min-height: auto;

                padding: 22px 25px;

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .footer-logo {
                width: 65px;
                height: 52px;
            }

            .site-footer > span {
                text-align: left;
            }

        }

    </style>

<style>
    .menu-catalog{display:grid;gap:24px;max-width:1400px;margin:28px auto 0;padding:0 clamp(20px,4vw,56px)}.catalog-notice{margin:0;padding:11px 14px;border-radius:9px;background:#e7f8ed;color:#12652f;font-size:14px;font-weight:650}.catalog-notice-warning{background:#fff4d4;color:#805b00}.menu-category-products h3{margin:0 0 12px;color:#ffcc00;font-size:23px;font-weight:800}.catalog-products{display:grid;grid-template-columns:repeat(auto-fill,minmax(min(100%,160px),1fr));gap:14px}.catalog-product-card{overflow:hidden;border:1px solid #e9e7e1;border-radius:11px;background:#fff;color:#222;box-shadow:0 5px 16px #10182810}.catalog-product-card>img{display:block;width:100%;aspect-ratio:4/3;object-fit:cover}.catalog-product-info{padding:12px}.catalog-product-category{display:inline-block;margin-bottom:5px;color:#986700;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:.06em}.catalog-product-info h3{margin:0 0 6px;color:#1d1d1d;font-size:17px;line-height:1.2}.catalog-product-info p{min-height:36px;margin:0 0 10px;color:#666;font-size:12px;line-height:1.45}.catalog-product-info strong{color:#111;font-size:15px}
</style>
</head>


<body>


    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <header class="site-header">

        <div class="header-inner">


            <a
                class="brand"
                href="{{ url('/') }}"
                aria-label="Burguês, início">

                <img
                    class="brand-logo"
                    src="{{ asset('logoburguer.png') }}"
                    alt="Burguês">

            </a>


            <nav
                class="site-nav"
                aria-label="Navegação principal">


                <a href="{{ url('/') }}#cardapio">
                    <span>Cardápio</span>
                </a>


                <a href="{{ url('/promocoes') }}">
                    <span>Promoções</span>
                </a>


                <a href="{{ route('bebidas') }}">
                    <span>Bebidas</span>
                </a>


                <a href="{{ route('acompanhamentopage') }}">
                    <span>Acompanhamentos</span>
                </a>


            </nav>


            <a
                class="order-button"
                href="{{ route('cart.index') }}">

                ▣ &nbsp;Meu pedido · <span data-cart-item-count>{{ $cartItemCount }}</span>

            </a>


        </div>

    </header>



    <!-- =====================================================
         CONTEÚDO
    ====================================================== -->

    <main>


        <!-- =================================================
             HERO
        ================================================== -->

        <section
            class="hero"
            id="inicio">


            <div class="hero-copy">


                <span class="eyebrow">

                    NA CHAPA. SEM MISÉRIA.

                </span>


                <h1>

                    SUA FOME TEM

                    <br>

                    SOBRENOME.

                </h1>


                <p>

                    Pão macio, carne suculenta e aquele queijo
                    derretendo. Aqui, cada mordida é coisa de Burguês.

                </p>


            </div>



            <!-- FOTO / CARROSSEL -->

            <div class="hero-photo">


                <div
                    id="burgerCarousel"
                    class="carousel slide hero-carousel"
                    data-bs-ride="carousel"
                    data-bs-interval="4000"
                    data-bs-pause="false">


                    <!-- INDICADORES -->

                    <div class="carousel-indicators">


                        <button
                            type="button"
                            data-bs-target="#burgerCarousel"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                            aria-label="Slide 1">
                        </button>


                        <button
                            type="button"
                            data-bs-target="#burgerCarousel"
                            data-bs-slide-to="1"
                            aria-label="Slide 2">
                        </button>


                        <button
                            type="button"
                            data-bs-target="#burgerCarousel"
                            data-bs-slide-to="2"
                            aria-label="Slide 3">
                        </button>


                    </div>



                    <!-- IMAGENS -->

                    <div class="carousel-inner">


                        <div class="carousel-item active">

                            <img
                                src="{{ asset('lanches_3_fotos_alta_resolucao/01_x_bacon_salada.png') }}"
                                alt="Hambúrguer artesanal">

                        </div>


                        <div class="carousel-item">

                            <img
                                src="{{ asset('lanches_3_fotos_alta_resolucao/02_x_bacon_salada_close.png') }}"
                                alt="Hambúrguer com queijo">

                        </div>


                        <div class="carousel-item">

                            <img
                                src="{{ asset('lanches_3_fotos_alta_resolucao/03_batata_cheddar_bacon.png') }}"
                                alt="Batata com cheddar e bacon">

                        </div>


                    </div>



                    <!-- SETA ESQUERDA -->

                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#burgerCarousel"
                        data-bs-slide="prev">

                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true">
                        </span>

                        <span class="visually-hidden">
                            Anterior
                        </span>

                    </button>



                    <!-- SETA DIREITA -->

                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#burgerCarousel"
                        data-bs-slide="next">

                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true">
                        </span>

                        <span class="visually-hidden">
                            Próximo
                        </span>

                    </button>


                </div>


            </div>


        </section>



        <!-- =================================================
             CARDÁPIO
        ================================================== -->

        <section
            class="menu-section"
            id="cardapio">


            <div class="container menu-container">


                <!-- =================================================
                     TÍTULO
                ================================================== -->

                <div class="menu-heading">


                    <div>


                        <h2>

                            ESCOLHA SEU PRÓXIMO FAVORITO

                        </h2>


                        <p>

                            Do clássico ao exagerado, tem um Burguês
                            pra cada tamanho de fome.

                        </p>


                    </div>


                </div>



                <!-- =================================================
                     CATEGORIAS
                ================================================== -->

                <div class="menu-tools">


                    <div
                        class="category-list"
                        aria-label="Categorias do cardápio">


                        <button
                            class="category selected"
                            data-filter="all"
                            type="button">

                            Todos

                        </button>


                        <button
                            class="category"
                            data-filter="classicos"
                            type="button">

                            Clássicos

                        </button>


                        <button
                            class="category"
                            data-filter="smash"
                            type="button">

                            Smash

                        </button>


                        <button
                            class="category"
                            data-filter="frango"
                            type="button">

                            Frango

                        </button>


                        <button
                            class="category"
                            data-filter="vegetariano"
                            type="button">

                            Vegetariano

                        </button>


                        <span class="category-indicator">
                        </span>


                    </div>


                </div>

                <section class="menu-catalog" aria-label="Lanches disponíveis">
                    @if(session('status'))
                        <p class="catalog-notice" role="status">{{ session('status') }}</p>
                    @endif
                    @if(session('warning'))
                        <p class="catalog-notice catalog-notice-warning" role="alert">{{ session('warning') }}</p>
                    @endif
                    @if($burgers->isNotEmpty())
                        @foreach(\App\Models\Product::BURGER_TYPES as $type => $label)
                            @php($categoryProducts = $burgers->where('burger_type', $type))
                            @if($categoryProducts->isNotEmpty())
                                <div class="menu-category-products" data-menu-category="{{ $type }}">
                                    <h3>{{ $label }}</h3>
                                    <div class="catalog-products">
                                        @foreach($categoryProducts as $product)
                                            @include('partials.product-card', ['product' => $product])
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="menu-catalog-empty">Nenhum lanche cadastrado ainda.</p>
                    @endif
                </section>

            </div>

        </section>

    </main>



    <!-- =====================================================
         RODAPÉ
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


        /* =====================================================
           ABRIR A PÁGINA NO TOPO
        ===================================================== */

        if ('scrollRestoration' in history) {

            history.scrollRestoration = 'manual';

        }


        window.addEventListener('load', () => {


            if (!window.location.hash) {


                window.scrollTo({

                    top: 0,

                    left: 0,

                    behavior: 'instant'

                });


            }


        });



        document.addEventListener('DOMContentLoaded', () => {


            /* =================================================
               CARROSSEL
            ================================================= */

            const element =
                document.getElementById(
                    'burgerCarousel'
                );


            if (
                element &&
                window.bootstrap?.Carousel
            ) {


                const carousel =
                    window.bootstrap.Carousel
                        .getOrCreateInstance(
                            element,
                            {

                                interval: 4000,

                                pause: false,

                                wrap: true

                            }
                        );


                carousel.cycle();


            }



            /* =================================================
               NAVBAR
            ================================================= */

            const nav =
                document.querySelector(
                    '.site-nav'
                );


            if (nav) {


                nav
                    .querySelectorAll('a')
                    .forEach(link => {


                        link.addEventListener(
                            'mouseenter',
                            () => {


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
                            event => {


                                if (
                                    event.animationName ===
                                    'nav-link-motion'
                                ) {


                                    link.classList.remove(
                                        'nav-link-animating'
                                    );


                                }


                            }
                        );


                    });


            }



            /* =================================================
               CATEGORIAS
            ================================================= */

            const list =
                document.querySelector(
                    '.category-list'
                );


            const indicator =
                list?.querySelector(
                    '.category-indicator'
                );


            const buttons =
                list
                    ? [
                        ...list.querySelectorAll(
                            '.category'
                        )
                    ]
                    : [];


            if (
                list &&
                indicator &&
                buttons.length
            ) {


                const selectedButton =
                    () =>

                        list.querySelector(
                            '.category.selected'
                        ) || buttons[0];



                const moveIndicator =
                    button => {


                        const listRect =
                            list.getBoundingClientRect();


                        const buttonRect =
                            button.getBoundingClientRect();


                        indicator.style.width =
                            `${buttonRect.width}px`;


                        indicator.style.height =
                            `${buttonRect.height}px`;


                        const x =
                            buttonRect.left -
                            listRect.left +
                            list.scrollLeft;


                        const y =
                            buttonRect.top -
                            listRect.top +
                            list.scrollTop;


                        indicator.style.transform =
                            `translate(${x}px, ${y}px)`;


                    };



                buttons.forEach(button => {


                    button.addEventListener(
                        'mouseenter',
                        () => {


                            moveIndicator(button);


                        }
                    );


                    button.addEventListener(
                        'click',
                        () => {


                            buttons.forEach(item => {


                                item.classList.toggle(
                                    'selected',
                                    item === button
                                );


                            });

                            const selectedFilter = button.dataset.filter;

                            document
                                .querySelectorAll('.menu-category-products')
                                .forEach(section => {
                                    section.hidden = selectedFilter !== 'all'
                                        && section.dataset.menuCategory !== selectedFilter;
                                });

                            moveIndicator(button);


                        }
                    );


                });



                list.addEventListener(
                    'mouseleave',
                    () => {


                        moveIndicator(
                            selectedButton()
                        );


                    }
                );



                window.addEventListener(
                    'resize',
                    () => {


                        moveIndicator(
                            selectedButton()
                        );


                    }
                );



                moveIndicator(
                    selectedButton()
                );


            }


        });


    </script>

    @include('partials.product-modal')

</body>

</html>