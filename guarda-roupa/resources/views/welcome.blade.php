<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Guarda-Roupa</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #080808;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }


        /* =====================================================
           ANIMAÇÕES
        ===================================================== */

        @keyframes entradaTopo {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes entradaEsquerda {
            0% {
                opacity: 0;
                transform: translateX(-60px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes entradaDireita {
            0% {
                opacity: 0;
                transform: translateX(60px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes subir {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes flutuar {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }

            100% {
                transform: translateY(0);
            }
        }

        @keyframes pulsar {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255,212,0,0.6);
            }

            50% {
                transform: scale(1.35);
                box-shadow: 0 0 0 8px rgba(255,212,0,0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255,212,0,0);
            }
        }

        @keyframes brilho {
            0% {
                left: -120%;
            }

            100% {
                left: 130%;
            }
        }

        @keyframes zoomImagem {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.04);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes girar {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes linhaMovimento {
            0% {
                background-position: -500px 0;
            }

            100% {
                background-position: 500px 0;
            }
        }


        /* =====================================================
           TOPO
        ===================================================== */

        .topo {
            height: 28px;

            background: #ffd400;
            color: #000;

            padding: 0 50px;

            display: flex;
            align-items: center;

            font-size: 9px;
            font-weight: 900;

            letter-spacing: 1.8px;

            animation: entradaTopo 0.8s ease;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        header {
            height: 78px;

            padding: 0 50px;

            display: grid;

            grid-template-columns: 1fr auto 1fr;

            align-items: center;

            border-bottom: 1px solid rgba(255,255,255,0.08);

            position: relative;

            z-index: 20;

            background: rgba(8,8,8,0.88);

            backdrop-filter: blur(18px);

            animation: entradaTopo 1s ease;
        }


        /* =====================================================
           INSTAGRAM
        ===================================================== */

        .instagram {
            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255,255,255,0.14);

            border-radius: 50%;

            transition: all 0.4s ease;

            justify-self: start;

            position: relative;
        }

        .instagram::after {
            content: "";

            position: absolute;

            inset: -6px;

            border: 1px solid transparent;

            border-radius: 50%;

            transition: all 0.4s ease;
        }

        .instagram:hover {
            border-color: #ffd400;

            transform: translateY(-5px) rotate(8deg);

            box-shadow:
                0 0 15px rgba(255,212,0,0.35),
                0 10px 35px rgba(255,212,0,0.15);
        }

        .instagram:hover::after {
            border-color: rgba(255,212,0,0.35);

            transform: scale(1.1);
        }

        .instagram img {
            width: 25px;
            height: 25px;

            transition: 0.4s ease;

            animation: girar 12s linear infinite;
        }

        .instagram:hover img {
            animation-duration: 1.5s;

            transform: scale(1.15);
        }


        /* =====================================================
           MENU
        ===================================================== */

        nav {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 34px;
        }

        nav a {
            position: relative;

            color: #888;

            text-decoration: none;

            font-size: 11px;

            font-weight: 700;

            transition: all 0.3s ease;

            padding: 10px 0;
        }

        nav a::before {
            content: "";

            position: absolute;

            width: 0;

            height: 2px;

            left: 50%;

            bottom: -4px;

            background: #ffd400;

            transform: translateX(-50%);

            transition: width 0.35s ease;
        }

        nav a:hover {
            color: #fff;

            transform: translateY(-4px);
        }

        nav a:hover::before {
            width: 100%;

            box-shadow: 0 0 10px rgba(255,212,0,0.7);
        }


        /* =====================================================
           AÇÕES
        ===================================================== */

        .acoes-direita {
            display: flex;

            align-items: center;

            justify-self: end;

            gap: 12px;
        }

        .pesquisa {
            width: 190px;
            height: 38px;

            display: flex;

            align-items: center;

            background: #141414;

            border: 1px solid #252525;

            border-radius: 30px;

            padding: 0 15px;

            color: #777;

            font-size: 10px;

            transition: all 0.4s ease;
        }

        .pesquisa:hover {
            border-color: #ffd400;

            background: #1b1b1b;

            color: #aaa;

            transform: translateY(-3px);

            box-shadow: 0 10px 25px rgba(255,212,0,0.08);
        }

        .nova {
            height: 38px;

            background: #ffd400;

            color: #000;

            border: none;

            border-radius: 30px;

            padding: 0 18px;

            font-size: 10px;

            font-weight: 900;

            cursor: pointer;

            transition: all 0.35s ease;

            position: relative;

            overflow: hidden;
        }

        .nova::after {
            content: "";

            position: absolute;

            width: 70px;

            height: 100%;

            top: 0;

            left: -100px;

            background: rgba(255,255,255,0.5);

            transform: skewX(-25deg);

        }

        .nova:hover::after {
            animation: brilho 0.7s ease;
        }

        .nova:hover {
            transform: translateY(-4px) scale(1.05);

            background: #ffe033;

            box-shadow:
                0 10px 35px rgba(255,212,0,0.35);
        }


        /* =====================================================
           HERO
        ===================================================== */

        main {
            min-height: calc(100vh - 106px);

            display: grid;

            grid-template-columns: 45% 55%;
        }

        .texto {
            padding: 60px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            position: relative;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(255,212,0,0.08),
                    transparent 35%
                );

            animation: entradaEsquerda 1.1s ease;
        }

        .texto::before {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            border: 1px solid rgba(255,212,0,0.06);

            border-radius: 50%;

            right: -220px;

            top: 50%;

            transform: translateY(-50%);

            animation: flutuar 5s ease-in-out infinite;
        }

        .texto::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border: 1px solid rgba(255,212,0,0.04);

            border-radius: 50%;

            left: -100px;

            bottom: -80px;

            animation: flutuar 7s ease-in-out infinite reverse;
        }

        .bem-vindo {
            display: inline-flex;

            align-items: center;

            color: #ffd400;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 2px;

            margin-bottom: 25px;

            animation: subir 1s ease 0.2s both;
        }

        .bem-vindo::before {
            content: "";

            width: 28px;

            height: 2px;

            background: #ffd400;

            margin-right: 10px;

            box-shadow: 0 0 12px rgba(255,212,0,0.7);
        }

        h1 {
            font-size: clamp(65px, 7vw, 105px);

            line-height: 0.82;

            letter-spacing: -6px;

            margin-bottom: 28px;

            font-weight: 900;

            position: relative;

            z-index: 2;

            animation: subir 1s ease 0.35s both;
        }

        h1 span {
            color: #ffd400;

            display: inline-block;

            transition: all 0.4s ease;
        }

        h1:hover span {
            transform: translateX(12px);

            text-shadow:
                0 0 10px rgba(255,212,0,0.5),
                0 0 30px rgba(255,212,0,0.2);
        }

        .descricao {
            color: #888;

            font-size: 14px;

            line-height: 1.7;

            max-width: 380px;

            margin-bottom: 32px;

            animation: subir 1s ease 0.5s both;
        }


        /* =====================================================
           BOTÃO PRINCIPAL
        ===================================================== */

        .botoes {
            display: flex;

            align-items: center;

            gap: 12px;

            animation: subir 1s ease 0.65s both;
        }

        .botao {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-width: 150px;

            padding: 15px 23px;

            border-radius: 30px;

            text-decoration: none;

            font-size: 10px;

            font-weight: 900;

            transition: all 0.35s ease;

            position: relative;

            overflow: hidden;
        }

        .botao::after {
            content: "";

            position: absolute;

            width: 80px;

            height: 100%;

            left: -100px;

            top: 0;

            background: rgba(255,255,255,0.45);

            transform: skewX(-25deg);
        }

        .botao:hover::after {
            animation: brilho 0.7s ease;
        }

        .principal {
            background: #ffd400;

            color: #000;

            box-shadow:
                0 10px 30px rgba(255,212,0,0.12);
        }

        .principal:hover {
            transform: translateY(-6px) scale(1.05);

            background: #ffe033;

            box-shadow:
                0 20px 45px rgba(255,212,0,0.3);
        }


        /* =====================================================
           IMAGEM HERO
        ===================================================== */

        .imagem {
            min-height: 650px;

            position: relative;

            overflow: hidden;

            background-image:

                linear-gradient(
                    90deg,
                    #080808 0%,
                    rgba(8,8,8,0.15) 30%,
                    rgba(8,8,8,0) 70%
                ),

                url("https://media.endclothing.com/media/f_auto,q_auto:eco,w_1600/prodmedia/media/catalog/product/1/6/16-06-23-JF_1201A789-020_1_1.jpg");

            background-size: cover;

            background-position: center;

            animation:
                entradaDireita 1.2s ease,
                zoomImagem 8s ease-in-out 1s infinite;

            transition: background-position 0.7s ease;
        }

        .imagem:hover {
            background-position: center 45%;
        }

        .imagem::after {
            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    180deg,
                    rgba(0,0,0,0.1),
                    transparent 45%,
                    rgba(0,0,0,0.75)
                );

            pointer-events: none;
        }


        /* =====================================================
           FRASE
        ===================================================== */

        .frase {
            position: absolute;

            z-index: 3;

            bottom: 45px;

            left: 45px;

            max-width: 390px;

            background: #ffd400;

            color: #000;

            padding: 20px 25px;

            font-size: 14px;

            font-weight: 900;

            line-height: 1.3;

            transform: rotate(-3deg);

            box-shadow: 12px 12px 0 rgba(0,0,0,0.35);

            animation:
                subir 1.2s ease 0.7s both,
                flutuar 4s ease-in-out 2s infinite;

            transition: all 0.35s ease;
        }

        .frase:hover {
            transform: rotate(0deg) translateY(-10px) scale(1.04);

            box-shadow:
                8px 18px 0 rgba(0,0,0,0.35),
                0 0 30px rgba(255,212,0,0.15);
        }


        /* =====================================================
           INDICADOR
        ===================================================== */

        .indicador {
            position: absolute;

            z-index: 3;

            top: 35px;

            right: 35px;

            display: flex;

            align-items: center;

            gap: 8px;

            color: #fff;

            font-size: 9px;

            font-weight: bold;

            background: rgba(0,0,0,0.5);

            padding: 10px 14px;

            border: 1px solid rgba(255,255,255,0.12);

            border-radius: 30px;

            backdrop-filter: blur(10px);

            animation: entradaDireita 1s ease 0.8s both;
        }

        .bolinha {
            width: 7px;

            height: 7px;

            background: #ffd400;

            border-radius: 50%;

            animation: pulsar 1.8s infinite;
        }


        /* =====================================================
           CATEGORIAS
        ===================================================== */

        .categorias {
            padding: 110px 60px 130px;

            background: #fff;

            border-top: 1px solid #e5e5e5;

            position: relative;

            overflow: hidden;
        }

        .categorias::before {
            content: "";

            position: absolute;

            width: 500px;

            height: 500px;

            border: 1px solid rgba(0,0,0,0.04);

            border-radius: 50%;

            right: -280px;

            top: -200px;

            animation: girar 30s linear infinite;
        }

        .categorias-topo {
            display: flex;

            justify-content: space-between;

            align-items: end;

            margin-bottom: 50px;

            position: relative;

            z-index: 2;

            animation: subir 1s ease;
        }

        .categorias-titulo small {
            display: block;

            color: #c7a600;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 2px;

            margin-bottom: 14px;
        }

        .categorias-titulo h2 {
            color: #080808;

            font-size: clamp(35px, 5vw, 65px);

            line-height: 0.92;

            letter-spacing: -3px;

            font-weight: 900;
        }

        .categorias-titulo h2 span {
            color: #d7b500;

            transition: all 0.4s ease;
        }

        .categorias-titulo:hover h2 span {
            letter-spacing: 0;

            text-shadow: 0 5px 20px rgba(215,181,0,0.2);
        }

        .categorias-descricao {
            max-width: 280px;

            color: #777;

            font-size: 12px;

            line-height: 1.7;

            text-align: right;
        }


        /* =====================================================
           GRID
        ===================================================== */

        .categorias-grid {
            display: grid;

            grid-template-columns: repeat(6, 1fr);

            gap: 12px;

            position: relative;

            z-index: 2;
        }


        /* =====================================================
           CARDS
        ===================================================== */

        .categoria {
            min-height: 350px;

            position: relative;

            overflow: hidden;

            display: flex;

            flex-direction: column;

            justify-content: flex-end;

            padding: 24px;

            background: #eee;

            border: 1px solid #ddd;

            text-decoration: none;

            color: #000;

            transition:
                transform 0.5s cubic-bezier(.2,.8,.2,1),
                border-color 0.35s ease,
                box-shadow 0.5s ease;

            animation: subir 0.8s ease both;
        }

        .categoria:nth-child(1) {
            animation-delay: 0.1s;
        }

        .categoria:nth-child(2) {
            animation-delay: 0.2s;
        }

        .categoria:nth-child(3) {
            animation-delay: 0.3s;
        }

        .categoria:nth-child(4) {
            animation-delay: 0.4s;
        }

        .categoria:nth-child(5) {
            animation-delay: 0.5s;
        }

        .categoria:nth-child(6) {
            animation-delay: 0.6s;
        }

        .categoria::before {
            content: "";

            position: absolute;

            inset: 0;

            background: linear-gradient(
                120deg,
                transparent 30%,
                rgba(255,212,0,0.12),
                transparent 70%
            );

            transform: translateX(-100%);

            transition: 0.6s ease;

            z-index: 2;
        }

        .categoria:hover::before {
            transform: translateX(100%);
        }

        .categoria::after {
            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    180deg,
                    rgba(255,255,255,0.05) 20%,
                    rgba(255,255,255,0.75) 100%
                );

            z-index: 1;

            transition: 0.4s ease;
        }

        .categoria:hover {
            transform: translateY(-15px) scale(1.035);

            border-color: #ffd400;

            box-shadow:
                0 25px 55px rgba(0,0,0,0.2);
        }

        .categoria:hover::after {
            background:
                linear-gradient(
                    180deg,
                    rgba(255,255,255,0.02) 10%,
                    rgba(255,255,255,0.92) 100%
                );
        }


        /* =====================================================
           IMAGENS
        ===================================================== */

        .categoria:nth-child(1) {
            background:
                url("https://www.starterpack.com.br/cdn/shop/files/canelada-preta.png?v=1774461396&width=1024")
                center / cover;
        }

        .categoria:nth-child(2) {
            background:
                url("https://media.endclothing.com/media/f_auto,q_auto:eco,w_1600/prodmedia/media/catalog/product/2/0/20-07-23-TC_FD8453-010_1_1.jpg")
                center / cover;
        }

        .categoria:nth-child(3) {
            background:
                url("https://polowear.vtexassets.com/arquivos/ids/471101/image-4cd07dff3fdd47f4baaee169b98f17f0.jpg?v=639082338113500000")
                center / cover;
        }

        .categoria:nth-child(4) {
            background:
                url("https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=700&q=80")
                center / cover;
        }

        .categoria:nth-child(5) {
            background:
                url("https://cdn.shopify.com/s/files/1/2358/2817/files/asics-gel-nyc-black-graphite-grey3.png?v=1702635420&width=1440")
                center / cover;
        }

        .categoria:nth-child(6) {
            background:
                url("https://img.ltwebstatic.com/images3_pi/2024/08/11/d3/1723378410b7bf81925fa8137d835df54a83a9c19e_thumbnail_900x.jpg")
                center / cover;
        }


        /* =====================================================
           CONTEÚDO DOS CARDS
        ===================================================== */

        .categoria-conteudo {
            position: relative;

            z-index: 3;

            transition: all 0.4s ease;
        }

        .categoria:hover .categoria-conteudo {
            transform: translateY(-7px);
        }

        .categoria-numero {
            color: #b89b00;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 1.5px;

            margin-bottom: 8px;
        }

        .categoria h3 {
            color: #050505;

            font-size: 24px;

            font-weight: 900;

            letter-spacing: -0.8px;

            margin-bottom: 13px;

            transition: 0.3s ease;
        }

        .categoria:hover h3 {
            transform: translateX(5px);
        }

        .categoria-link {
            display: flex;

            justify-content: space-between;

            align-items: center;

            color: #222;

            font-size: 9px;

            font-weight: 900;

            letter-spacing: 0.5px;
        }

        .categoria-seta {
            width: 32px;

            height: 32px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 1px solid rgba(0,0,0,0.35);

            border-radius: 50%;

            color: #000;

            transition: all 0.4s ease;
        }

        .categoria:hover .categoria-seta {
            background: #ffd400;

            border-color: #ffd400;

            transform: rotate(-45deg) scale(1.15);

            box-shadow: 0 5px 15px rgba(255,212,0,0.35);
        }


        /* =====================================================
           NAVBAR INFERIOR
        ===================================================== */

        .navbar-inferior {
            background: #080808;

            padding: 0 50px;

            border-top: 1px solid rgba(255,255,255,0.08);

            position: relative;

            overflow: hidden;
        }

        .navbar-linha {
            width: 100%;

            height: 2px;

            background: linear-gradient(
                90deg,
                transparent,
                #ffd400,
                transparent
            );

            background-size: 500px 100%;

            animation: linhaMovimento 4s linear infinite;

            opacity: 0.6;
        }

        .navbar-conteudo {
            min-height: 65px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 20px;

            color: #666;

            font-size: 8px;

            font-weight: 800;

            letter-spacing: 2px;

            text-transform: uppercase;
        }

        .navbar-conteudo span:first-child {
            color: #ffd400;
        }

        .navbar-ponto {
            width: 4px;

            height: 4px;

            background: #ffd400;

            border-radius: 50%;

            opacity: 0.7;

            animation: pulsar 2s infinite;
        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (max-width: 1350px) {

            .categorias-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .categoria {
                min-height: 320px;
            }

        }


        @media (max-width: 1000px) {

            header {
                padding: 0 25px;
            }

            nav {
                gap: 18px;
            }

            .pesquisa {
                display: none;
            }

            .texto {
                padding: 40px;
            }

            h1 {
                font-size: 70px;
            }

        }


        @media (max-width: 800px) {

            .topo {
                padding: 0 20px;

                font-size: 8px;
            }

            header {
                height: 70px;

                padding: 0 20px;

                display: flex;

                justify-content: space-between;
            }

            nav {
                display: none;
            }

            .nova {
                padding: 0 15px;
            }

            main {
                grid-template-columns: 1fr;
            }

            .texto {
                min-height: 500px;

                padding: 60px 25px;
            }

            h1 {
                font-size: 65px;

                letter-spacing: -4px;
            }

            .imagem {
                min-height: 520px;
            }

            .frase {
                left: 25px;

                right: 25px;

                bottom: 30px;

                max-width: none;

                font-size: 12px;
            }

            .categorias {
                padding: 80px 25px 90px;
            }

            .categorias-topo {
                display: block;
            }

            .categorias-descricao {
                margin-top: 20px;

                text-align: left;

                max-width: 350px;
            }

            .categorias-grid {
                grid-template-columns: repeat(2, 1fr);

                gap: 10px;
            }

            .categoria {
                min-height: 300px;
            }

        }


        @media (max-width: 600px) {

            .navbar-inferior {
                padding: 0 20px;
            }

            .navbar-conteudo {
                min-height: 60px;

                gap: 10px;

                font-size: 7px;

                letter-spacing: 1px;
            }

            .navbar-conteudo span:nth-child(5) {
                display: none;
            }

        }


        @media (max-width: 500px) {

            .instagram {
                width: 42px;

                height: 42px;
            }

            .instagram img {
                width: 22px;

                height: 22px;
            }

            .nova {
                height: 36px;

                padding: 0 13px;

                font-size: 9px;
            }

            .texto {
                min-height: 470px;
            }

            h1 {
                font-size: 58px;

                letter-spacing: -4px;
            }

            .categorias-grid {
                grid-template-columns: 1fr;
            }

            .categoria {
                min-height: 350px;
            }

            .categorias-titulo h2 {
                font-size: 45px;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     TOPO
====================================================== -->

<div class="topo">

    GUARDA-ROUPA DE WESLEY TORRES

</div>


<!-- =====================================================
     HEADER
====================================================== -->

<header>


    <a
        class="instagram"
        href="https://www.instagram.com/w.torress__/"
        target="_blank"
        title="Instagram"
    >

        <img
            src="https://static.vecteezy.com/system/resources/previews/018/930/413/large_2x/instagram-logo-instagram-icon-transparent-free-png.png"
            alt="Instagram"
        >

    </a>


    <nav>

        <a href="/">Início</a>

        <a href="/camisetas">Camisetas</a>

        <a href="#">Feminino</a>

        <a href="#">Favoritos</a>

        <a href="#">Looks</a>

    </nav>


    <div class="acoes-direita">

        <div class="pesquisa">

            🔍&nbsp;&nbsp; Busque por peças...

        </div>


        <button class="nova">

            + NOVA PEÇA

        </button>

    </div>

</header>


<!-- =====================================================
     HERO
====================================================== -->

<main>


    <section class="texto">


        <div class="bem-vindo">

            BEM-VINDO(A) AO SEU GUARDA-ROUPA

        </div>


        <h1>

            GUARDA<br>

            <span>ROUPA</span>

        </h1>


        <p class="descricao">

            Organize suas peças e
            tenha seu estilo sempre à mão.

        </p>


        <div class="botoes">

            <a
                href="#categorias"
                class="botao principal"
            >

                VER ROUPAS →

            </a>

        </div>

    </section>


    <section class="imagem">


        <div class="indicador">

            <span class="bolinha"></span>

            ULTIMA COMPRA

        </div>


        <div class="frase">

            Asics Gel-nyc Graphite Grey Black

        </div>


    </section>


</main>


<!-- =====================================================
     CATEGORIAS
====================================================== -->

<section
    class="categorias"
    id="categorias"
>


    <div class="categorias-topo">


        <div class="categorias-titulo">

            <small>

                EXPLORE SEU GUARDA-ROUPA

            </small>


            <h2>

                ESCOLHA UMA<br>

                <span>CATEGORIA</span>

            </h2>

        </div>


        <p class="categorias-descricao">

            Encontre suas peças de forma rápida
            e organize seu estilo por categoria.

        </p>


    </div>


    <div class="categorias-grid">


        <!-- CAMISAS -->

        <a
            href="/camisetas"
            class="categoria"
        >

            <div class="categoria-conteudo">

                <div class="categoria-numero">

                    01

                </div>


                <h3>

                    Camisas

                </h3>


                <div class="categoria-link">

                    <span>

                        VER PEÇAS

                    </span>


                    <div class="categoria-seta">

                        →

                    </div>

                </div>

            </div>

        </a>


        <!-- MOLETONS -->

        <a
            href="#"
            class="categoria"
        >

            <div class="categoria-conteudo">

                <div class="categoria-numero">

                    02

                </div>


                <h3>

                    Moletons

                </h3>


                <div class="categoria-link">

                    <span>

                        VER PEÇAS

                    </span>


                    <div class="categoria-seta">

                        →

                    </div>

                </div>

            </div>

        </a>


        <!-- SUÉTERS -->

        <a
            href="#"
            class="categoria"
        >

            <div class="categoria-conteudo">

                <div class="categoria-numero">

                    03

                </div>


                <h3>

                    Suéters

                </h3>


                <div class="categoria-link">

                    <span>

                        VER PEÇAS

                    </span>


                    <div class="categoria-seta">

                        →

                    </div>

                </div>

            </div>

        </a>


        <!-- CALÇAS -->

        <a
            href="#"
            class="categoria"
        >

            <div class="categoria-conteudo">

                <div class="categoria-numero">

                    04

                </div>


                <h3>

                    Calças

                </h3>


                <div class="categoria-link">

                    <span>

                        VER PEÇAS

                    </span>


                    <div class="categoria-seta">

                        →

                    </div>

                </div>

            </div>

        </a>


        <!-- TÊNIS -->

        <a
            href="#"
            class="categoria"
        >

            <div class="categoria-conteudo">

                <div class="categoria-numero">

                    05

                </div>


                <h3>

                    Tênis

                </h3>


                <div class="categoria-link">

                    <span>

                        VER PEÇAS

                    </span>


                    <div class="categoria-seta">

                        →

                    </div>

                </div>

            </div>

        </a>


        <!-- SHORTS -->

        <a
            href="#"
            class="categoria"
        >

            <div class="categoria-conteudo">

                <div class="categoria-numero">

                    06

                </div>


                <h3>

                    Shorts

                </h3>


                <div class="categoria-link">

                    <span>

                        VER PEÇAS

                    </span>


                    <div class="categoria-seta">

                        →

                    </div>

                </div>

            </div>

        </a>


    </div>

</section>


<!-- =====================================================
     NAVBAR INFERIOR
====================================================== -->

<div class="navbar-inferior">

    <div class="navbar-linha"></div>


    <div class="navbar-conteudo">

        <span>

            GUARDA-ROUPA

        </span>


        <div class="navbar-ponto"></div>


        <span>

            ESTILO

        </span>


        <div class="navbar-ponto"></div>


        <span>

            SEU ESTILO, SUAS REGRAS.

        </span>


        <div class="navbar-ponto"></div>


        <span>

            2026

        </span>

    </div>

</div>


</body>

</html>