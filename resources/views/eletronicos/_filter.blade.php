@php
    $rotaFiltro =
        Route::currentRouteName() === 'eletronicos.venda' ? route('eletronicos.venda') : route('eletronicos.index');
@endphp
<form action="{{ $rotaFiltro }}" method="GET">
    <div class="card mb-4 border-0 shadow"
        style="background:linear-gradient(90deg,#1a1a1a 0%,#2d0b0b 40%,#ff003c 100%);color:#fff;">
        <div class="card-header bg-dark border-0" style="background:rgba(26,26,26,0.95);color:#ff003c;">
            <h5 class="card-title font-weight-bold">Filtros <i class="fa fa-search"></i></h5>
        </div>
        <div class="card-body">
            <div class="form-row row">
                <div class="form-group col-md-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control bg-dark text-white border-danger" id="nome"
                        name="nome" value="{{ request('nome') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control bg-dark text-white border-danger" id="marca"
                        name="marca" value="{{ request('marca') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control bg-dark text-white border-danger" id="preco"
                        name="preco" value="{{ request('preco') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="subcategoria">Subcategoria</label>
                    <input type="text" class="form-control bg-dark text-white border-danger" id="subcategoria"
                        name="subcategoria" value="{{ request('subcategoria') }}">
                </div>
            </div>
        </div>
        <div class="card-footer border-0 bg-transparent">
            <button type="submit" class="btn fw-bold" style="background:#ff003c;color:#fff;">Buscar</button>
            <a href="{{ $rotaFiltro }}" class="btn btn-outline-light fw-bold border-danger"
                style="color:#ff003c;">Limpar</a>
        </div>
    </div>
</form>
