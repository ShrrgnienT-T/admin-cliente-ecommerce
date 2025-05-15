@php $editing = isset($livro); @endphp
<div class="card border-0 shadow-lg mb-4"
    style="background:linear-gradient(90deg,#1a1a1a 0%,#2d0b0b 40%,#ff003c 100%);color:#fff;">
    <div class="card-body">
        <form method="POST" action="{{ $editing ? route('livros.update', $livro) : route('livros.store') }}">
            @csrf
            @if ($editing)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="nome" class="form-label" style="text-shadow:1px 1px 4px #000;">Nome</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="nome" name="nome"
                    value="{{ old('nome', $livro->nome ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label" style="text-shadow:1px 1px 4px #000;">Preço</label>
                <input type="number" step="0.01" class="form-control bg-dark text-light border-danger"
                    id="preco" name="preco" value="{{ old('preco', $livro->preco ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label" style="text-shadow:1px 1px 4px #000;">Autor</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="autor"
                    name="autor" value="{{ old('autor', $livro->autor ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="editora" class="form-label" style="text-shadow:1px 1px 4px #000;">Editora</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="editora"
                    name="editora" value="{{ old('editora', $livro->editora ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label" style="text-shadow:1px 1px 4px #000;">Descrição</label>
                <textarea class="form-control bg-dark text-light border-danger" id="descricao" name="descricao">{{ old('descricao', $livro->descricao ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="subcategoria" class="form-label" style="text-shadow:1px 1px 4px #000;">Subcategoria</label>
                <select class="form-select bg-dark text-light border-danger" id="subcategoria" name="subcategoria"
                    required>
                    <option value="">Selecione</option>
                    <option value="Ficção"
                        {{ old('subcategoria', $livro->subcategoria ?? '') == 'Ficção' ? 'selected' : '' }}>
                        Ficção</option>
                    <option value="Não Ficção"
                        {{ old('subcategoria', $livro->subcategoria ?? '') == 'Não Ficção' ? 'selected' : '' }}>Não
                        Ficção
                    </option>
                    <option value="Romance"
                        {{ old('subcategoria', $livro->subcategoria ?? '') == 'Romance' ? 'selected' : '' }}>Romance
                    </option>
                    <option value="Autoajuda"
                        {{ old('subcategoria', $livro->subcategoria ?? '') == 'Autoajuda' ? 'selected' : '' }}>Autoajuda
                    </option>
                    <option value="Infantil"
                        {{ old('subcategoria', $livro->subcategoria ?? '') == 'Infantil' ? 'selected' : '' }}>Infantil
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label" style="text-shadow:1px 1px 4px #000;">Imagem (URL)</label>
                <input type="text" class="form-control bg-dark text-light border-danger" id="imagem"
                    name="imagem" value="{{ old('imagem', $livro->imagem ?? '') }}">
            </div>
            <button type="submit" class="btn fw-bold" style="background:#ff003c;color:#fff;">Salvar</button>
            <a href="{{ route('livros.index') }}" class="btn btn-outline-light fw-bold border-danger"
                style="color:#ff003c;">Cancelar</a>
        </form>
    </div>
</div>
