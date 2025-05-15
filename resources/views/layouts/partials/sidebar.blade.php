<aside class="w-100 w-md-64 flex-shrink-0 flex flex-col py-4 px-2 px-md-4"
    style="max-width:260px; background: linear-gradient(135deg, #1a1a1a 0%, #2d0b0b 40%, #ff003c 100%);">
    <nav class="flex-1">
        <div class="d-grid gap-2">
            <!-- Eletrônicos -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-3 px-3 fw-semibold"
                    style="cursor:pointer;">
                    <span><i class="bi bi-cpu me-2"></i>Eletrônicos</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-3">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('eletronicos.index', ['subcategoria' => 'Celulares']) : route('eletronicos.venda', ['subcategoria' => 'Celulares']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Celulares</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('eletronicos.index', ['subcategoria' => 'TVs']) : route('eletronicos.venda', ['subcategoria' => 'TVs']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">TVs</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('eletronicos.index', ['subcategoria' => 'Notebooks']) : route('eletronicos.venda', ['subcategoria' => 'Notebooks']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Notebooks</a>
                </div>
            </details>

            <!-- Roupas -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-3 px-3 fw-semibold"
                    style="cursor:pointer;">
                    <span><i class="bi bi-tshirt me-2"></i>Roupas</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-3">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('roupas.index', ['subcategoria' => 'Masculino']) : route('roupas.venda', ['subcategoria' => 'Masculino']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Masculino</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('roupas.index', ['subcategoria' => 'Feminino']) : route('roupas.venda', ['subcategoria' => 'Feminino']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Feminino</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('roupas.index', ['subcategoria' => 'Infantil']) : route('roupas.venda', ['subcategoria' => 'Infantil']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Infantil</a>
                </div>
            </details>

            <!-- Alimentos -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-3 px-3 fw-semibold"
                    style="cursor:pointer;">
                    <span><i class="bi bi-cup-straw me-2"></i>Alimentos</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-3">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('alimentos.index', ['subcategoria' => 'Bebidas']) : route('alimentos.venda', ['subcategoria' => 'Bebidas']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Bebidas</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('alimentos.index', ['subcategoria' => 'Doces']) : route('alimentos.venda', ['subcategoria' => 'Doces']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Doces</a>
                </div>
            </details>

            <!-- Livros -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-3 px-3 fw-semibold"
                    style="cursor:pointer;">
                    <span><i class="bi bi-book me-2"></i>Livros</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-3">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Ficção']) : route('livros.venda', ['subcategoria' => 'Ficção']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Ficção</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Não Ficção']) : route('livros.venda', ['subcategoria' => 'Não Ficção']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Não Ficção</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Romance']) : route('livros.venda', ['subcategoria' => 'Romance']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Romance</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Autoajuda']) : route('livros.venda', ['subcategoria' => 'Autoajuda']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Autoajuda</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Infantil']) : route('livros.venda', ['subcategoria' => 'Infantil']) }}"
                        class="btn btn-secondary btn-sm text-start sidebar-link">Infantil</a>
                </div>
            </details>
        </div>
    </nav>
</aside>
