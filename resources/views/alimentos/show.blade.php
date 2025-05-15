@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Detalhes do Alimento</h2>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $alimento->nome }}</h5>
                <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($alimento->preco, 2, ',', '.') }}</p>
                <p class="card-text"><strong>Validade:</strong> {{ $alimento->validade }}</p>
                <p class="card-text"><strong>Descrição:</strong> {{ $alimento->descricao }}</p>
            </div>
        </div>
        <a href="{{ route('alimentos.edit', $alimento) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('alimentos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
