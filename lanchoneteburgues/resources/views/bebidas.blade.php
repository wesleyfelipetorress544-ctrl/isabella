<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="theme-color" content="#1d1d1d">

    <title>Bebidas | Burguês</title>


    <!-- =====================================================
         FONTES
    ====================================================== -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700;800;900&family=DM+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">


    <!-- =====================================================
         BOOTSTRAP
    ====================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


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

            font-family:
                'DM Sans',
                Arial,
                sans-serif;

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



        /* =====================================================
           CONTEÚDO DO NAVBAR
        ===================================================== */

        .burgues-header-inner {

            width: 100%;

            height: 115px;

            min-height: 115px;

            margin: 0;

            padding-left:
                clamp(40px, 4vw, 72px);

            padding-right:
                clamp(40px, 4vw, 72px);

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

            transform:
                translateY(-8px);

            transform-origin:
                center;

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
           LINKS DO NAVBAR
        ===================================================== */

        .burgues-header-links {

            display: flex;

            align-items: center;

            justify-content: center;

            gap:
                clamp(22px, 2.5vw, 42px);

            margin: 0;

            padding: 0;

            transform:
                translateY(-8px);

        }


        .burgues-header-links a {

            position: relative;

            display: inline-block;

            padding:
                14px 6px;

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



        /* =====================================================
           ENTRADA DOS LINKS
        ===================================================== */

        .burgues-header-links a:nth-child(1) {

            animation-delay:
                .08s;

        }


        .burgues-header-links a:nth-child(2) {

            animation-delay:
                .18s;

        }


        .burgues-header-links a:nth-child(3) {

            animation-delay:
                .28s;

        }


        .burgues-header-links a:nth-child(4) {

            animation-delay:
                .38s;

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



        /* =====================================================
           TEXTO DOS LINKS
        ===================================================== */

        .burgues-header-links .nav-label {

            display: inline-block;

            pointer-events: none;

            transform-origin:
                center;

        }



        /* =====================================================
           LINK AMARELO
        ===================================================== */

        .burgues-header-links a:hover,
        .burgues-header-links a:focus-visible,
        .burgues-header-links a[aria-current="page"] {

            color:
                var(--yellow);

            text-shadow:
                0 0 4px
                rgba(255, 204, 0, .4);

        }



        /* =====================================================
           ANIMAÇÃO DOS LINKS
        ===================================================== */

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

            padding:
                0 20px;

            border: 0;

            border-radius:
                5px;

            background:
                var(--yellow);

            color:
                #111;

            font:
                700
                13px
                'DM Sans',
                Arial,
                sans-serif;

            white-space:
                nowrap;

            cursor:
                pointer;

            transform:
                translateY(-8px);

            transition:
                transform .2s ease,
                box-shadow .2s ease;

        }


        .burgues-header-order:hover,
        .burgues-header-order:focus-visible {

            transform:
                translateY(-10px);

            box-shadow:
                0 5px 16px
                rgba(0, 0, 0, .25);

        }



        /* =====================================================
           PÁGINA DE BEBIDAS
        ===================================================== */

        .bebidas-page {

            width: 100%;

            min-height:
                calc(100vh - 115px);

            background:
                #fff;

        }



        /* =====================================================
           HERO AMARELO
        ===================================================== */

        .bebidas-hero {

            width: 100%;

            min-height: 250px;

            background:
                var(--yellow);

            padding:
                45px
                clamp(40px, 6vw, 90px);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 40px;

            color:
                #171717;

            overflow: hidden;

        }



        /* =====================================================
           TEXTO DO HERO
        ===================================================== */

        .bebidas-hero-copy {

            max-width:
                760px;

        }



        /* =====================================================
           PEQUENO TÍTULO
        ===================================================== */

        .bebidas-kicker {

            display: block;

            margin-bottom:
                14px;

            font-size:
                10px;

            font-weight:
                800;

            text-transform:
                uppercase;

            letter-spacing:
                .3px;

        }



        /* =====================================================
           PRA MATAR A SEDE
        ===================================================== */

        .bebidas-hero h1 {

            margin:
                0 0 13px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size:
                clamp(48px, 5vw, 72px);

            font-weight:
                900;

            line-height:
                .92;

            text-transform:
                uppercase;

            letter-spacing:
                -1px;

            transform:
                translateY(0)
                scale(1);

            transform-origin:
                left center;

            transition:
                transform .25s ease,
                text-shadow .25s ease;

        }



        /* =====================================================
           ANIMAÇÃO SOMENTE QUANDO PASSAR O MOUSE
        ===================================================== */

        .bebidas-hero h1:hover {

            transform:
                translateY(-7px)
                scale(1.025);

            text-shadow:
                0 8px 18px
                rgba(0, 0, 0, .12);

        }



        /* =====================================================
           DESCRIÇÃO
        ===================================================== */

        .bebidas-hero p {

            margin: 0;

            font-size:
                14px;

            color:
                #302d24;

        }



        /* =====================================================
           CONTEÚDO BRANCO
        ===================================================== */

        .bebidas-content {

            width:
                100%;

            padding:
                50px
                clamp(40px, 6vw, 90px)
                80px;

            background:
                #fff;

        }



        /* =====================================================
           CABEÇALHO DA SEÇÃO
        ===================================================== */

        .bebidas-heading {

            display:
                flex;

            align-items:
                flex-end;

            justify-content:
                space-between;

            gap:
                30px;

            margin-bottom:
                30px;

        }


        .bebidas-heading h2 {

            margin:
                0 0 5px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size:
                clamp(30px, 3vw, 42px);

            font-weight:
                900;

            text-transform:
                uppercase;

            line-height:
                1;

        }


        .bebidas-heading p {

            margin:
                0;

            color:
                #888;

            font-size:
                12px;

        }



        /* =====================================================
           SEM BEBIDAS
        ===================================================== */

        .sem-bebidas {

            position:
                relative;

            width:
                100%;

            min-height:
                330px;

            border:
                1px solid
                #e9e9e9;

            border-radius:
                10px;

            background:
                #fafafa;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            overflow:
                hidden;

            text-align:
                center;

        }



        /* =====================================================
           DETALHES DO FUNDO
        ===================================================== */

        .sem-bebidas::before {

            content: "";

            position:
                absolute;

            width:
                300px;

            height:
                300px;

            top:
                -160px;

            right:
                -100px;

            border-radius:
                50%;

            background:
                rgba(255, 212, 0, .10);

        }


        .sem-bebidas::after {

            content: "";

            position:
                absolute;

            width:
                180px;

            height:
                180px;

            bottom:
                -100px;

            left:
                -60px;

            border-radius:
                50%;

            background:
                rgba(255, 212, 0, .08);

        }



        /* =====================================================
           CONTEÚDO SEM BEBIDA
        ===================================================== */

        .sem-bebidas-conteudo {

            position:
                relative;

            z-index:
                2;

            max-width:
                450px;

            padding:
                40px 25px;

            animation:
                bebida-enter
                .65s
                .15s
                ease
                both;

        }



        /* =====================================================
           ÍCONE
        ===================================================== */

        .sem-bebidas-icon {

            width:
                62px;

            height:
                62px;

            margin:
                0 auto 20px;

            border-radius:
                50%;

            background:
                var(--yellow);

            display:
                grid;

            place-items:
                center;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size:
                26px;

            font-weight:
                900;

            transition:
                transform .25s ease;

        }


        .sem-bebidas:hover
        .sem-bebidas-icon {

            transform:
                translateY(-5px)
                rotate(-5deg);

        }



        /* =====================================================
           TEXTO SEM BEBIDA
        ===================================================== */

        .sem-bebidas h3 {

            margin:
                0 0 10px;

            font-family:
                'Barlow Condensed',
                sans-serif;

            font-size:
                34px;

            font-weight:
                900;

            line-height:
                1;

            text-transform:
                uppercase;

            color:
                #1d1d1d;

        }


        .sem-bebidas p {

            max-width:
                360px;

            margin:
                0 auto;

            color:
                #777;

            font-size:
                12px;

            line-height:
                1.6;

        }



        /* =====================================================
           ANIMAÇÃO DE ENTRADA
        ===================================================== */

        @keyframes bebida-enter {

            from {

                opacity:
                    0;

                transform:
                    translateY(15px);

            }

            to {

                opacity:
                    1;

                transform:
                    translateY(0);

            }

        }



        /* =====================================================
           FOOTER
        ===================================================== */

        .site-footer {

            width:
                100%;

            background:
                #1d1d1d;

            color:
                #d3d2cc;

            padding:
                25px
                clamp(40px, 6vw, 90px);

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                20px;

        }


        .footer-left {

            display:
                flex;

            align-items:
                center;

            gap:
                15px;

        }


        .footer-logo {

            width:
                85px;

            height:
                60px;

            object-fit:
                contain;

        }


        .site-footer p {

            margin:
                0;

            color:
                #999;

            font-size:
                10px;

        }


        .site-footer > span {

            color:
                #999;

            font-size:
                9px;

        }



        /* =====================================================
           RESPONSIVO NAVBAR
        ===================================================== */

        @media(max-width: 850px) {

            .burgues-header {

                height:
                    auto;

                min-height:
                    80px;

            }


            .burgues-header-inner {

                height:
                    auto;

                min-height:
                    80px;

                flex-wrap:
                    wrap;

                gap:
                    10px 18px;

                padding:
                    8px 18px;

            }


            .burgues-header-brand img {

                width:
                    105px;

                height:
                    75px;

                transform:
                    none;

            }


            .burgues-header-brand:hover img,
            .burgues-header-brand:focus-visible img {

                transform:
                    scale(1.05);

            }


            .burgues-header-links {

                order:
                    3;

                width:
                    100%;

                justify-content:
                    flex-start;

                flex-wrap:
                    nowrap;

                overflow-x:
                    auto;

                gap:
                    20px;

                transform:
                    none;

            }


            .burgues-header-links a {

                font-size:
                    12px;

            }


            .burgues-header-order {

                margin-left:
                    auto;

                min-height:
                    42px;

                padding:
                    0 14px;

                font-size:
                    11px;

                transform:
                    none;

            }


            .burgues-header-order:hover,
            .burgues-header-order:focus-visible {

                transform:
                    translateY(-1px);

            }

        }



        /* =====================================================
           RESPONSIVO DA PÁGINA
        ===================================================== */

        @media(max-width: 700px) {

            .bebidas-hero {

                min-height:
                    auto;

                padding:
                    35px 25px;

                flex-direction:
                    column;

                align-items:
                    flex-start;

            }


            .bebidas-hero h1 {

                font-size:
                    46px;

            }


            .bebidas-content {

                padding:
                    35px 25px
                    60px;

            }


            .bebidas-heading {

                align-items:
                    flex-start;

                flex-direction:
                    column;

                gap:
                    8px;

            }


            .sem-bebidas {

                min-height:
                    280px;

            }


            .sem-bebidas h3 {

                font-size:
                    29px;

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

    </style>

<style>
    .catalog-products{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:22px;margin-top:28px}.catalog-product-card{overflow:hidden;border:1px solid #e9e7e1;border-radius:14px;background:#fff;box-shadow:0 8px 24px #10182812}.catalog-product-card>img{display:block;width:100%;aspect-ratio:4/3;object-fit:cover}.catalog-product-info{padding:17px}.catalog-product-category{display:inline-block;margin-bottom:7px;color:#986700;font-size:12px;font-weight:800;text-transform:uppercase;letter-spacing:.06em}.catalog-product-info h3{margin:0 0 8px;color:#1d1d1d;font-size:20px;line-height:1.2}.catalog-product-info p{min-height:42px;margin:0 0 14px;color:#666;font-size:14px;line-height:1.5}.catalog-product-info strong{color:#111;font-size:17px}
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



            <!-- =================================================
                 LINKS
            ================================================== -->

            <nav
                class="burgues-header-links"
                aria-label="Navegação principal">


                <!-- CARDÁPIO -->

                <a href="{{ url('/') }}#cardapio">

                    <span class="nav-label">

                        Cardápio

                    </span>

                </a>



                <!-- PROMOÇÕES -->

                <a href="{{ url('/promocoes') }}">

                    <span class="nav-label">

                        Promoções

                    </span>

                </a>



                <!-- BEBIDAS -->

                <a
                    href="{{ route('bebidas') }}"
                    aria-current="page">

                    <span class="nav-label">

                        Bebidas

                    </span>

                </a>



                <!-- ACOMPANHAMENTOS -->

                <a href="{{ route('acompanhamentopage') }}">

                    <span class="nav-label">

                        Acompanhamentos

                    </span>

                </a>


            </nav>



            <!-- =================================================
                 MEU PEDIDO
            ================================================== -->

            <a
                class="burgues-header-order"
                href="{{ route('cart.index') }}">


                ▣ &nbsp;Meu pedido · <span data-cart-item-count>{{ $cartItemCount }}</span>


            </a>


        </div>


    </header>



    <!-- =====================================================
         PÁGINA DE BEBIDAS
    ====================================================== -->

    <main class="bebidas-page">



        <!-- =================================================
             HERO AMARELO
        ================================================== -->

        <section class="bebidas-hero">




                <!-- ANIMAÇÃO SOMENTE NO HOVER -->

                <h1>

                    PRA MATAR<br>

                    A SEDE.

                </h1>



          

            </div>


        </section>



        <!-- =================================================
             CONTEÚDO BRANCO
        ================================================== -->

        <section class="bebidas-content">


            <!-- =================================================
                 CABEÇALHO
            ================================================== -->

            <div class="bebidas-heading">


                <div>


                    <h2>

                        BEBIDAS

                    </h2>


                    <p>

                        Confira as opções disponíveis.

                    </p>


                </div>


            </div>



            @if($products->isNotEmpty())
                <div class="catalog-products">
                    @foreach($products as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>
            @endif

            <!-- =================================================
                 NENHUMA BEBIDA
            ================================================== -->

            @if($products->isEmpty())
            <div class="sem-bebidas">


                <div class="sem-bebidas-conteudo">


                    <!-- ÍCONE -->

                    <div class="sem-bebidas-icon">

                        !

                    </div>



                    <!-- TÍTULO -->

                    <h3>

                        NENHUMA BEBIDA<br>

                        POR ENQUANTO.

                    </h3>



                    <!-- TEXTO -->

                    <p>

                        Ainda não temos bebidas cadastradas nesta página.

                        Quando novas opções estiverem disponíveis,
                        elas vão aparecer por aqui.

                    </p>


                </div>


            </div>
            @endif

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
         ANIMAÇÃO DO NAVBAR
    ====================================================== -->

    <script>

        document.addEventListener('DOMContentLoaded', () => {


            const nav =
                document.querySelector(
                    '.burgues-header-links'
                );


            if (nav) {


                nav
                    .querySelectorAll('a')
                    .forEach(link => {


                        /* =====================================
                           QUANDO PASSAR O MOUSE
                        ===================================== */

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



                        /* =====================================
                           QUANDO TERMINAR
                        ===================================== */

                        link.addEventListener(
                            'animationend',
                            event => {


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


        });

    </script>

    @include('partials.product-modal')

</body>

</html>