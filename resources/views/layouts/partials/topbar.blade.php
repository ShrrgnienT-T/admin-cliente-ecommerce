{{-- resources/views/layouts/partials/topbar.blade.php --}}
<nav class="fixed-top shadow d-flex align-items-center justify-content-between w-100 px-2 px-md-4 py-2"
    style="z-index:1040; background: linear-gradient(90deg, #1a1a1a 0%, #2d0b0b 40%, #ff003c 100%);">
    <div class="d-flex align-items-center gap-2 gap-md-3 flex-shrink-0">
        <span class="text-xl font-bold text-white truncate">{{ config('app.name', 'Laravel') }}</span>
    </div>
    <form action="/buscar" method="GET"
        class="mx-2 flex-grow-1 d-none d-md-flex align-items-center justify-content-center"
        style="max-width: 500px; min-width: 200px;">
        <input type="text" name="q"
            class="form-control rounded-start-pill border-end-0 bg-dark text-white border-dark"
            placeholder="Buscar produtos, marcas e muito mais..." aria-label="Buscar produtos">
        <button type="submit" class="btn btn-danger rounded-end-pill border-start-0 px-4 text-white fw-bold"
            style="margin-left:-1px;">Buscar</button>
    </form>
    <div class="d-flex align-items-center gap-2 gap-md-3 flex-shrink-0">
        @if (auth()->check() && auth()->user()->hasRole('comprador'))
            <!-- Ícone Categorias Dropdown Bootstrap -->
            <div class="dropdown">
                <button
                    class="btn bg-transparent p-2 rounded-circle border-0 shadow-none d-flex align-items-center justify-content-center"
                    type="button" id="dropdownCategoriesBtn" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg mt-2 w-100 min-w-180px"
                    aria-labelledby="dropdownCategoriesBtn" style="min-width: 180px; background: #1a1a1a; color: #fff;">
                    <li><a class="dropdown-item text-white" style="background:transparent;"
                            href="#">Eletrônicos</a></li>
                    <li><a class="dropdown-item text-white" style="background:transparent;" href="#">Roupas</a>
                    </li>
                    <li><a class="dropdown-item text-white" style="background:transparent;" href="#">Alimentos</a>
                    </li>
                    <li><a class="dropdown-item text-white" style="background:transparent;" href="#">Livros</a>
                    </li>
                </ul>
            </div>
        @endif
        @if (auth()->check() && auth()->user()->hasRole('comprador'))
            <!-- Ícone Carrinho com badge -->
            <div class="position-relative" id="carrinho-badge-container">
                <a href="{{ route('carrinho.index') }}"
                    class="p-2 rounded-circle bg-transparent border-0 d-flex align-items-center justify-content-center position-relative"
                    style="min-width: 40px; min-height: 40px;">
                    <svg width="28" height="28" style="color: #fff;" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A2 2 0 008.48 19h7.04a2 2 0 001.83-1.3L17 13M7 13V6h13" />
                    </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        style="font-size:0.75rem;">{{ session('cart_count', 0) }}</span>
                </a>
            </div>
        @endif
        <!-- Usuário Dropdown Bootstrap -->
        @auth
            <div class="dropdown">
                <button class="btn bg-transparent d-flex align-items-center gap-2 p-2 rounded-circle border-0 shadow-none"
                    type="button" id="dropdownUserBtn" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z" />
                    </svg>
                    <span class="d-none d-md-inline text-white">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg mt-2 w-100 min-w-140px"
                    aria-labelledby="dropdownUserBtn" style="min-width: 140px; background: #1a1a1a; color: #fff;">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-white"
                                style="background:transparent;">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>
