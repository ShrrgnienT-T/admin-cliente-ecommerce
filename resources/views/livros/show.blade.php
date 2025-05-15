@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Detalhes do Livro</h2>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $livro->nome }}</h5>
                <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($livro->preco, 2, ',', '.') }}</p>
                <p class="card-text"><strong>Autor:</strong> {{ $livro->autor }}</p>
                <p class="card-text"><strong>Editora:</strong> {{ $livro->editora }}</p>
                <p class="card-text"><strong>Descrição:</strong> {{ $livro->descricao }}</p>
            </div>
        </div>
        <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
