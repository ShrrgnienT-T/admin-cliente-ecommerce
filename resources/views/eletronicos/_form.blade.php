@php $editing = isset($eletronico); @endphp
<div class="card border-0 shadow-lg mb-4"
    style="background:linear-gradient(90deg,#1a1a1a 0%,#2d0b0b 40%,#ff003c 100%);color:#fff;">
    <div class="card-body">
        <form method="POST"
            action="{{ $editing ? route('eletronicos.update', $eletronico) : route('eletronicos.store') }}">
            @csrf
            @if ($editing)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="nome" class="form-label" style="text-shadow:1px 1px 4px #000;">Nome</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="nome" name="nome"
                    value="{{ old('nome', $eletronico->nome ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label" style="text-shadow:1px 1px 4px #000;">Preço</label>
                <input type="number" step="0.01" class="form-control bg-dark text-light border-danger"
                    id="preco" name="preco" value="{{ old('preco', $eletronico->preco ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label" style="text-shadow:1px 1px 4px #000;">Marca</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="marca"
                    name="marca" value="{{ old('marca', $eletronico->marca ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label" style="text-shadow:1px 1px 4px #000;">Descrição</label>
                <textarea class="form-control bg-dark text-light border-danger" id="descricao" name="descricao">{{ old('descricao', $eletronico->descricao ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="subcategoria" class="form-label" style="text-shadow:1px 1px 4px #000;">Subcategoria</label>
                <select class="form-select bg-dark text-light border-danger" id="subcategoria" name="subcategoria"
                    required>
                    <option value="">Selecione</option>
                    <option value="Celulares"
                        {{ old('subcategoria', $eletronico->subcategoria ?? '') == 'Celulares' ? 'selected' : '' }}>
                        Celulares</option>
                    <option value="TVs"
                        {{ old('subcategoria', $eletronico->subcategoria ?? '') == 'TVs' ? 'selected' : '' }}>
                        TVs</option>
                    <option value="Notebooks"
                        {{ old('subcategoria', $eletronico->subcategoria ?? '') == 'Notebooks' ? 'selected' : '' }}>
                        Notebooks</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label" style="text-shadow:1px 1px 4px #000;">Imagem (URL)</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="imagem"
                    name="imagem" value="{{ old('imagem', $eletronico->imagem ?? '') }}">
            </div>
            <button type="submit" class="btn fw-bold" style="background:#ff003c;color:#fff;">Salvar</button>
            <a href="{{ route('eletronicos.index') }}" class="btn btn-outline-light fw-bold border-danger"
                style="color:#ff003c;">Cancelar</a>
        </form>
    </div>
</div>
