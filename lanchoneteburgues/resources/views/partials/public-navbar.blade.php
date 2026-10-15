<!-- BOOTSTRAP ICONS -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

    /* =====================================================
       BASE
    ===================================================== */

    html,
    body {
        background: #1d1d1d;
    }


    /* =====================================================
       NAVBAR
    ===================================================== */

    .burgues-header {
        position: relative;
        z-index: 1000;

        width: 100%;
        min-height: 115px;

        margin: 0;
        padding: 0;

        border: 0;

        background: #1d1d1d;
        color: #fff;
    }


    .burgues-header-inner {
        width: 100%;
        min-height: 115px;

        margin: 0;

        padding:
            0
            clamp(20px, 4vw, 72px);

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

        width: 128px;
        height: 88px;

        object-fit: contain;

        transform-origin: 50% 50%;

        will-change: transform;

        transition:
            transform .18s ease,
            filter .18s ease;
    }


    /* HOVER DA LOGO */

    .burgues-header-brand:hover img,
    .burgues-header-brand:focus-visible img {
        transform: scale(1.08);

        filter:
            drop-shadow(
                0 7px 14px
                rgba(0, 0, 0, .25)
            );
    }


    /* =====================================================
       GIRO DA LOGO
    ===================================================== */

    .burgues-header-brand.logo-animating img {
        animation:
            burgues-logo-spin
            .42s
            cubic-bezier(.35, .05, .20, 1)
            1;
    }


    @keyframes burgues-logo-spin {

        0% {
            transform:
                rotate(0deg)
                scale(1);
        }

        15% {
            transform:
                rotate(35deg)
                scale(1.03);
        }

        70% {
            transform:
                rotate(300deg)
                scale(1.10);
        }

        100% {
            transform:
                rotate(360deg)
                scale(1.08);
        }

    }


    /* =====================================================
       LINKS
    ===================================================== */

    .burgues-header-links {
        display: flex;
        align-items: center;
        justify-content: center;

        gap:
            clamp(16px, 2.4vw, 42px);

        transform:
            translateY(-8px);
    }


    .burgues-header-links a {
        position: relative;

        display: inline-flex;
        align-items: center;

        gap: 8px;

        padding:
            14px 6px;

        color: #fff;

        font:
            700
            16px
            'DM Sans',
            Arial,
            sans-serif;

        text-decoration: none;

        white-space: nowrap;

        cursor: pointer;

        transition:
            color .18s ease,
            text-shadow .18s ease;
    }


    /* =====================================================
       ÍCONES
    ===================================================== */

    .burgues-header-links a i {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        color: currentColor;

        font-size: 17px;

        transform-origin: center;

        transition:
            color .2s ease,
            transform .25s ease;
    }


    .burgues-header-links .nav-label {
        display: inline-block;

        pointer-events: none;

        transform-origin: center;
    }


    /* =====================================================
       HOVER
    ===================================================== */

    .burgues-header-links a:hover,
    .burgues-header-links a:focus-visible,
    .burgues-header-links a[aria-current="page"] {
        color: #ffcc00;

        text-shadow:
            0 0 4px
            rgba(255, 204, 0, .4);
    }


    .burgues-header-links a:hover i,
    .burgues-header-links a:focus-visible i {
        color: #ffcc00;

        transform:
            translateY(-2px)
            scale(1.12);
    }


    /* =====================================================
       ANIMAÇÃO DO TEXTO
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
       ANIMAÇÃO DO ÍCONE
    ===================================================== */

    .burgues-header-links
    a.nav-link-animating
    i {
        animation:
            burgues-nav-icon-motion
            .5s
            cubic-bezier(.2, .8, .2, 1)
            both;
    }


    @keyframes burgues-nav-icon-motion {

        0% {
            transform:
                translateY(0)
                rotate(0deg)
                scale(1);
        }

        45% {
            transform:
                translateY(-4px)
                rotate(-7deg)
                scale(1.15);
        }

        100% {
            transform:
                translateY(0)
                rotate(0deg)
                scale(1);
        }

    }


    /* =====================================================
       MEU PEDIDO
    ===================================================== */

    .burgues-header-order {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 8px;

        min-height: 48px;

        padding:
            0 20px;

        border: 0;
        border-radius: 5px;

        background: #ffcc00;

        color: #111;

        font:
            700
            14px
            'DM Sans',
            Arial,
            sans-serif;

        text-decoration: none;

        white-space: nowrap;

        transform:
            translateY(-8px);

        transition:
            transform .18s ease,
            box-shadow .18s ease;
    }


    .burgues-header-order i {
        font-size: 16px;

        transition:
            transform .2s ease;
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


    .burgues-header-order:hover i {
        transform:
            translateY(-1px)
            scale(1.1);
    }


    /* =====================================================
       RESPONSIVO
    ===================================================== */

    @media (max-width: 850px) {

        .burgues-header {
            min-height: 80px;
        }


        .burgues-header-inner {
            min-height: 80px;

            flex-wrap: wrap;

            gap:
                10px 18px;

            padding:
                8px 18px;
        }


        .burgues-header-brand img {
            width: 102px;
            height: 68px;
        }


        .burgues-header-links {
            order: 3;

            width: 100%;

            justify-content: flex-start;

            flex-wrap: nowrap;

            overflow-x: auto;

            gap:
                12px 20px;

            transform: none;

            padding-bottom: 3px;
        }


        .burgues-header-links a {
            flex:
                0 0 auto;

            font-size: 13px;
        }


        .burgues-header-links a i {
            font-size: 14px;
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


    /* =====================================================
       REDUZIR MOVIMENTO
    ===================================================== */

    @media (prefers-reduced-motion: reduce) {

        .burgues-header-links a,
        .burgues-header-links .nav-label,
        .burgues-header-links a i,
        .burgues-header-order,
        .burgues-header-brand img {
            animation: none !important;
            transition: none !important;
        }

    }

</style>


<!-- =====================================================
     NAVBAR
===================================================== -->

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

                <i
                    class="bi bi-journal-text"
                    aria-hidden="true">
                </i>

                <span class="nav-label">
                    Cardápio
                </span>

            </a>


            <!-- PROMOÇÕES -->

            <a
                href="{{ url('/promocoes') }}"
                @if(($activePage ?? '') === 'promocoes')
                    aria-current="page"
                @endif>

                <i
                    class="bi bi-tag"
                    aria-hidden="true">
                </i>

                <span class="nav-label">
                    Promoções
                </span>

            </a>


            <!-- BEBIDAS -->

            <a
                href="{{ route('bebidas') }}"
                @if(($activePage ?? '') === 'bebidas')
                    aria-current="page"
                @endif>

                <i
                    class="bi bi-cup-straw"
                    aria-hidden="true">
                </i>

                <span class="nav-label">
                    Bebidas
                </span>

            </a>


            <!-- ACOMPANHAMENTOS -->

            <a
                href="{{ route('acompanhamentopage') }}"
                @if(($activePage ?? '') === 'acompanhamentos')
                    aria-current="page"
                @endif>

                <i
                    class="bi bi-basket"
                    aria-hidden="true">
                </i>

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

            <i
                class="bi bi-bag"
                aria-hidden="true">
            </i>

            <span>
                Meu pedido ·
                <span data-cart-item-count>
                    {{ $cartItemCount ?? 0 }}
                </span>
            </span>

        </a>


    </div>

</header>


<!-- =====================================================
     EFEITOS EXISTENTES
===================================================== -->

@include('partials.navbar-effects')


<!-- =====================================================
     NOVOS EFEITOS
===================================================== -->

<script>

    document.addEventListener('DOMContentLoaded', () => {


        /* =================================================
           GIRO DA LOGO
        ================================================= */

        const brand =
            document.querySelector(
                '.burgues-header-brand'
            );


        if (brand) {

            brand.addEventListener(
                'mouseenter',
                () => {

                    brand.classList.remove(
                        'logo-animating'
                    );

                    void brand.offsetWidth;

                    brand.classList.add(
                        'logo-animating'
                    );

                }
            );


            brand.addEventListener(
                'animationend',
                event => {

                    if (
                        event.animationName ===
                        'burgues-logo-spin'
                    ) {

                        brand.classList.remove(
                            'logo-animating'
                        );

                    }

                }
            );

        }



        /* =================================================
           ANIMAÇÃO DOS LINKS
        ================================================= */

        const nav =
            document.querySelector(
                '.burgues-header-links'
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