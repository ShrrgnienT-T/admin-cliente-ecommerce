{{-- filepath: resources/views/carrinho/index.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="mb-4">Meu Carrinho</h2>
        @if ($itens->isEmpty())
            <div class="alert alert-info">Seu carrinho está vazio.</div>
        @else
            <table class="table table-bordered align-middle" id="tabela-carrinho">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Imagem</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itens as $item)
                        <tr data-item-id="{{ $item->id }}">
                            <td>{{ $item->item->nome ?? '-' }}</td>
                            <td>{{ class_basename($item->item_type) }}</td>
                            <td><img src="{{ $item->item->imagem ?? '' }}" alt="Imagem"
                                    style="width:60px;height:60px;object-fit:cover;"></td>
                            <td>R$ <span
                                    class="preco-unitario">{{ number_format($item->item->preco ?? 0, 2, ',', '.') }}</span>
                            </td>
                            <td>
                                <div class="input-group input-group-sm" style="max-width:120px;">
                                    <button class="btn btn-outline-secondary btn-quantidade" data-action="menos"
                                        type="button">−
                                    </button>
                                    <input type="text" class="form-control text-center quantidade-input"
                                        value="{{ $item->quantidade }}" min="1" style="max-width:40px;" readonly>
                                    <button class="btn btn-outline-secondary btn-quantidade" data-action="mais"
                                        type="button">+</button>
                                </div>
                            </td>
                            <td>R$ <span
                                    class="total-item">{{ number_format(($item->item->preco ?? 0) * $item->quantidade, 2, ',', '.') }}</span>
                            </td>
                            <td>
                                <form action="{{ route('carrinho.remover', $item) }}" method="POST" class="form-remover"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end">
                <h4>Total: R$ <span id="total-carrinho">{{ number_format($total, 2, ',', '.') }}</span></h4>
            </div>
            <div class="text-end mt-3">
                <a href="#" class="btn btn-success">Finalizar Compra</a>
            </div>
        @endif
    </div>
@endsection
