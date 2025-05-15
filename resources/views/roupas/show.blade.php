@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Detalhes da Roupa</h2>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $roupa->nome }}</h5>
                <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($roupa->preco, 2, ',', '.') }}</p>
                <p class="card-text"><strong>Tamanho:</strong> {{ $roupa->tamanho }}</p>
                <p class="card-text"><strong>Cor:</strong> {{ $roupa->cor }}</p>
                <p class="card-text"><strong>Descrição:</strong> {{ $roupa->descricao }}</p>
            </div>
        </div>
        <a href="{{ route('roupas.edit', $roupa) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('roupas.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
