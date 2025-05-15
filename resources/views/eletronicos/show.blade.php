@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Detalhes do Eletrônico</h2>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $eletronico->nome }}</h5>
                <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($eletronico->preco, 2, ',', '.') }}</p>
                <p class="card-text"><strong>Marca:</strong> {{ $eletronico->marca }}</p>
                <p class="card-text"><strong>Descrição:</strong> {{ $eletronico->descricao }}</p>
            </div>
        </div>
        <a href="{{ route('eletronicos.edit', $eletronico) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('eletronicos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
