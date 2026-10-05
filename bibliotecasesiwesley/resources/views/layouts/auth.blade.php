<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Biblioteca Sesi-Tatuí')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="m-0 p-0 bg-light text-dark overflow-hidden" style="--bs-light-rgb: 247, 249, 252; --bs-danger-rgb: 237, 28, 36; --bs-form-invalid-color: #ed1c24; --bs-form-invalid-border-color: #ed1c24;">
    <main class="container-fluid m-0 p-0">
        <div class="row g-0 mt-0 min-vh-100">
            <aside class="col-md-5 mt-0 bg-danger p-4 p-lg-5">
                <img src="{{ asset('images/sesi-logo.png') }}" alt="SESI São Paulo" class="img-fluid w-25">
            </aside>
            <section class="col-md-7 d-flex justify-content-center align-items-center p-3 p-md-4">
                <div class="card border-0 rounded-4 shadow-sm w-100 my-3 my-md-0 p-4 p-lg-5">
                    @yield('content')
                </div>
            </section>
        </div>
    </main>
</body>
</html>




