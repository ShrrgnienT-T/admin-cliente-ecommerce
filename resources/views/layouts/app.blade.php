<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="font-sans antialiased"
    style="background: linear-gradient(135deg, #1a1a1a 0%, #2d0b0b 40%, #ff003c 100%); min-height: 100vh;">
    <!-- Topbar -->
    @include('layouts.partials.topbar')
    <div class="d-flex flex-column flex-md-row min-vh-100">
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')
        <!-- Main Content -->
        <main class="flex-1 p-3 p-md-4 p-lg-5 w-100"
            style="background: rgba(20, 10, 20, 0.7); border-radius: 1rem; margin: 1rem; min-height: 80vh;">
            <!-- Banner Promocional/Carrossel -->
            <div class="container-fluid px-0 mb-4">
                <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3 shadow">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1515168833906-d2a3b82b3029?auto=format&fit=crop&w=1200&q=80"
                                class="d-block w-100" alt="Promoção 1" style="max-height:320px;object-fit:cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
                                <h5>Super Oferta Eletrônicos</h5>
                                <p>Descontos imperdíveis em celulares, TVs e mais!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80"
                                class="d-block w-100" alt="Promoção 2" style="max-height:320px;object-fit:cover;">
                            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3">
                                <h5>Moda em Oferta</h5>
                                <p>Roupas para todos os estilos com preços especiais.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
    <!-- Card Footer -->
    <div class="container my-4">
        <div class="card shadow-lg border-0 rounded-4 bg-dark text-white mx-auto" style="max-width: 600px;">
            <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div>
                    <h5 class="card-title mb-1">Precisa de ajuda?</h5>
                    <p class="card-text mb-0">Entre em contato com nosso suporte ou confira as perguntas frequentes.
                    </p>
                </div>
                <a href="#" class="btn btn-danger mt-3 mt-md-0 px-4 py-2 fw-semibold shadow">Fale Conosco</a>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 shadow text-center py-3 mt-auto w-100">
        <span class="text-gray-500 dark:text-gray-400" style="font-size:0.95rem;">&copy; {{ date('Y') }}
            {{ config('app.name', 'Laravel') }}. Todos os direitos reservados.</span>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
