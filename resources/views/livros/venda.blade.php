@extends('layouts.app')
@section('content')
    <div class="container">
        @include('livros._filter')
        <h2 class="mb-4 fw-bold" style="color:#fff;text-shadow:1px 1px 6px #000, 0 0 2px #ff003c;">Livros à Venda
        </h2>
        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('livros.venda', ['subcategoria' => 'Ficção']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">Ficção</a>
                <a href="{{ route('livros.venda', ['subcategoria' => 'Não Ficção']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">Não Ficção</a>
                <a href="{{ route('livros.venda', ['subcategoria' => 'Romance']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">Romance</a>
                <a href="{{ route('livros.venda', ['subcategoria' => 'Autoajuda']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">Autoajuda</a>
                <a href="{{ route('livros.venda', ['subcategoria' => 'Infantil']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">Infantil</a>
            </div>
        </div>
        <div class="row">
            @foreach ($livros as $livro)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg"
                        style="background:linear-gradient(90deg,#1a1a1a 0%,#2d0b0b 40%,#ff003c 100%);color:#fff;">
                        <img src="{{ $livro->imagem }}" class="card-img-top" alt="Imagem do produto"
                            style="height:180px;object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold" style="text-shadow:1px 1px 4px #000;">{{ $livro->nome }}</h5>
                            <p class="card-text">Autor: {{ $livro->autor }} | Editora: {{ $livro->editora }}</p>
                            <p class="card-text">Subcategoria: {{ $livro->subcategoria }}</p>
                            <p class="card-text fw-bold" style="color:#ff003c;text-shadow:1px 1px 4px #000;">R$
                                {{ number_format($livro->preco, 2, ',', '.') }}</p>
                            <p class="card-text">{{ $livro->descricao }}</p>
                            <form method="POST" action="{{ route('livros.adicionarAoCarrinho', $livro) }}">
                                @csrf
                                <div class="input-group mb-2" style="max-width:160px;">
                                    <button type="button" class="btn btn-outline-light fw-bold border-danger"
                                        style="color:#ff003c;"
                                        onclick="var q = this.parentNode.querySelector('input'); if(q.value>1)q.value--">−</button>
                                    <input type="number" name="quantidade"
                                        class="form-control bg-dark text-light border-danger text-center" value="1"
                                        min="1" style="max-width:60px;">
                                    <button type="button" class="btn btn-outline-light fw-bold border-danger"
                                        style="color:#ff003c;"
                                        onclick="var q = this.parentNode.querySelector('input'); q.value++">+</button>
                                    <button class="btn fw-bold ms-2" style="background:#ff003c;color:#fff;"
                                        type="submit">Adicionar ao Carrinho</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $livros->links() }}
        </div>
    </div>
@endsection
