<aside class="d-none d-md-block"
    style="position: fixed; top: 56px; left: 0; height: calc(100vh - 56px); width: 220px; overflow-y: auto; background: linear-gradient(135deg, #1a1a1a 0%, #2d0b0b 40%, #ff003c 100%); z-index:1030; border-top-right-radius: 1rem; box-shadow: 2px 0 8px rgba(0,0,0,0.15);">
    <nav class="flex-1 p-2">
        <div class="d-grid gap-3">
            <!-- Eletrônicos -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-2 px-3 fw-semibold rounded"
                    style="cursor:pointer;">
                    <span><i class="bi bi-cpu me-2"></i>Eletrônicos</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-2">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('eletronicos.index', ['subcategoria' => 'Celulares']) : route('eletronicos.venda', ['subcategoria' => 'Celulares']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Celulares</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('eletronicos.index', ['subcategoria' => 'TVs']) : route('eletronicos.venda', ['subcategoria' => 'TVs']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">TVs</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('eletronicos.index', ['subcategoria' => 'Notebooks']) : route('eletronicos.venda', ['subcategoria' => 'Notebooks']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Notebooks</a>
                </div>
            </details>

            <!-- Roupas -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-2 px-3 fw-semibold rounded"
                    style="cursor:pointer;">
                    <span><i class="bi bi-tshirt me-2"></i>Roupas</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-2">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('roupas.index', ['subcategoria' => 'Masculino']) : route('roupas.venda', ['subcategoria' => 'Masculino']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Masculino</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('roupas.index', ['subcategoria' => 'Feminino']) : route('roupas.venda', ['subcategoria' => 'Feminino']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Feminino</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('roupas.index', ['subcategoria' => 'Infantil']) : route('roupas.venda', ['subcategoria' => 'Infantil']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Infantil</a>
                </div>
            </details>

            <!-- Alimentos -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-2 px-3 fw-semibold rounded"
                    style="cursor:pointer;">
                    <span><i class="bi bi-cup-straw me-2"></i>Alimentos</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-2">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('alimentos.index', ['subcategoria' => 'Bebidas']) : route('alimentos.venda', ['subcategoria' => 'Bebidas']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Bebidas</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('alimentos.index', ['subcategoria' => 'Doces']) : route('alimentos.venda', ['subcategoria' => 'Doces']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Doces</a>
                </div>
            </details>

            <!-- Livros -->
            <details class="mb-2">
                <summary
                    class="btn btn-outline-light d-flex align-items-center justify-content-between sidebar-menu-btn py-2 px-3 fw-semibold rounded"
                    style="cursor:pointer;">
                    <span><i class="bi bi-book me-2"></i>Livros</span>
                    <i class="bi bi-chevron-down"></i>
                </summary>
                <div class="d-grid gap-2 mt-2 ms-2">
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Ficção']) : route('livros.venda', ['subcategoria' => 'Ficção']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Ficção</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Não Ficção']) : route('livros.venda', ['subcategoria' => 'Não Ficção']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Não Ficção</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Romance']) : route('livros.venda', ['subcategoria' => 'Romance']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Romance</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Autoajuda']) : route('livros.venda', ['subcategoria' => 'Autoajuda']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Autoajuda</a>
                    <a href="{{ auth()->check() && auth()->user()->hasRole('admin') ? route('livros.index', ['subcategoria' => 'Infantil']) : route('livros.venda', ['subcategoria' => 'Infantil']) }}"
                        class="btn btn-light btn-sm text-start sidebar-link rounded-pill px-3"
                        style="background:rgba(255,255,255,0.07);color:#fff;">Infantil</a>
                </div>
            </details>
        </div>
    </nav>
</aside>
