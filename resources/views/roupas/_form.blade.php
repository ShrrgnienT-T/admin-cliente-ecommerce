@php $editing = isset($roupa); @endphp
<div class="card border-0 shadow-lg mb-4"
    style="background:linear-gradient(90deg,#1a1a1a 0%,#2d0b0b 40%,#ff003c 100%);color:#fff;">
    <div class="card-body">
        <form method="POST" action="{{ $editing ? route('roupas.update', $roupa) : route('roupas.store') }}">
            @csrf
            @if ($editing)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="nome" class="form-label" style="text-shadow:1px 1px 4px #000;">Nome</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="nome" name="nome"
                    value="{{ old('nome', $roupa->nome ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label" style="text-shadow:1px 1px 4px #000;">Preço</label>
                <input type="number" step="0.01" class="form-control bg-dark text-light border-danger"
                    id="preco" name="preco" value="{{ old('preco', $roupa->preco ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="tamanho" class="form-label" style="text-shadow:1px 1px 4px #000;">Tamanho</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="tamanho"
                    name="tamanho" value="{{ old('tamanho', $roupa->tamanho ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="cor" class="form-label" style="text-shadow:1px 1px 4px #000;">Cor</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="cor"
                    name="cor" value="{{ old('cor', $roupa->cor ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label" style="text-shadow:1px 1px 4px #000;">Descrição</label>
                <textarea class="form-control bg-dark text-light border-danger" id="descricao" name="descricao">{{ old('descricao', $roupa->descricao ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="subcategoria" class="form-label" style="text-shadow:1px 1px 4px #000;">Subcategoria</label>
                <select class="form-select bg-dark text-light border-danger" id="subcategoria" name="subcategoria"
                    required>
                    <option value="">Selecione</option>
                    <option value="Masculino"
                        {{ old('subcategoria', $roupa->subcategoria ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino
                    </option>
                    <option value="Feminino"
                        {{ old('subcategoria', $roupa->subcategoria ?? '') == 'Feminino' ? 'selected' : '' }}>Feminino
                    </option>
                    <option value="Infantil"
                        {{ old('subcategoria', $roupa->subcategoria ?? '') == 'Infantil' ? 'selected' : '' }}>Infantil
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label" style="text-shadow:1px 1px 4px #000;">Imagem (URL)</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="imagem"
                    name="imagem" value="{{ old('imagem', $roupa->imagem ?? '') }}">
            </div>
            <button type="submit" class="btn fw-bold" style="background:#ff003c;color:#fff;">Salvar</button>
            <a href="{{ route('roupas.index') }}" class="btn btn-outline-light fw-bold border-danger"
                style="color:#ff003c;">Cancelar</a>
        </form>
    </div>
</div>
