@extends('layouts.app')
@section('content')
    <div class="container">
        @include('livros._filter')
        <div class="card border-0 shadow-lg mb-4"
            style="background:linear-gradient(90deg,#1a1a1a 0%,#2d0b0b 40%,#ff003c 100%);color:#fff;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="fw-bold" style="text-shadow:1px 1px 6px #000, 0 0 2px #ff003c;">Livros</h2>
                    <a href="{{ route('livros.create') }}" class="btn fw-bold"
                        style="background:#ff003c;color:#fff;box-shadow:0 2px 8px #2d0b0b;">Novo Livro</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle" style="border-radius:10px;overflow:hidden;">
                        <thead style="background:#2d0b0b;color:#ff003c;">
                            <tr>
                                <th>Imagem</th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Autor</th>
                                <th>Editora</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($livros as $livro)
                                <tr>
                                    <td><img src="{{ $livro->imagem }}" alt="Imagem"
                                            style="width:60px;height:60px;object-fit:cover;border-radius:8px;">
                                    </td>
                                    <td class="fw-semibold" style="text-shadow:1px 1px 4px #000;">{{ $livro->id }}</td>
                                    <td class="fw-semibold" style="text-shadow:1px 1px 4px #000;">{{ $livro->nome }}</td>
                                    <td class="fw-semibold" style="color:#ff003c;text-shadow:1px 1px 4px #000;">R$
                                        {{ number_format($livro->preco, 2, ',', '.') }}</td>
                                    <td class="fw-semibold" style="text-shadow:1px 1px 4px #000;">{{ $livro->autor }}</td>
                                    <td class="fw-semibold" style="text-shadow:1px 1px 4px #000;">{{ $livro->editora }}</td>
                                    <td>
                                        <a href="{{ route('livros.show', $livro) }}" class="btn btn-info btn-sm fw-bold"
                                            style="background:#2d0b0b;color:#fff;">Ver</a>
                                        <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning btn-sm fw-bold"
                                            style="background:#ff003c;color:#fff;">Editar</a>
                                        <form action="{{ route('livros.destroy', $livro) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm fw-bold"
                                                style="background:#1a1a1a;color:#ff003c;"
                                                onclick="return confirm('Tem certeza?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $livros->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
