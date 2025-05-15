@extends('layouts.app')
@section('content')
    <div class="container">
        @include('eletronicos._filter')
        <h2 class="mb-4 fw-bold" style="color:#fff;text-shadow:1px 1px 6px #000, 0 0 2px #ff003c;">
            Eletrônicos à Venda
        </h2>
        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('eletronicos.venda', ['subcategoria' => 'Celulares']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">Celulares</a>
                <a href="{{ route('eletronicos.venda', ['subcategoria' => 'TVs']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">TVs</a>
                <a href="{{ route('eletronicos.venda', ['subcategoria' => 'Notebooks']) }}"
                    class="btn btn-outline-danger btn-sm fw-bold">Notebooks</a>
            </div>
        </div>
        <div class="row">
            @foreach ($eletronicos as $eletronico)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg"
                        style="background:linear-gradient(90deg,#1a1a1a 0%,#2d0b0b 40%,#ff003c 100%);color:#fff;">
                        <img src="{{ $eletronico->imagem }}" class="card-img-top" alt="Imagem do produto"
                            style="height:180px;object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold" style="text-shadow:1px 1px 4px #000;">
                                {{ $eletronico->nome }}
                            </h5>
                            <p class="card-text">Marca: {{ $eletronico->marca }}</p>
                            <p class="card-text">Subcategoria: {{ $eletronico->subcategoria }}
                            </p>
                            <p class="card-text fw-bold" style="color:#ff003c;text-shadow:1px 1px 4px #000;">
                                R$ {{ number_format($eletronico->preco, 2, ',', '.') }}
                            </p>
                            <p class="card-text">{{ $eletronico->descricao }}</p>
                            <form method="POST" action="{{ route('eletronicos.adicionarAoCarrinho', $eletronico) }}">
                                @csrf
                                <div class="input-group mb-2" style="max-width:160px;">
                                    <button type="button" class="btn btn-outline-light fw-bold border-danger"
                                        style="color:#ff003c;"
                                        onclick="var q = this.parentNode.querySelector('input'); if(q.value>1)q.value--">
                                        −
                                    </button>
                                    <input type="number" name="quantidade"
                                        class="form-control bg-dark text-light border-danger text-center" value="1"
                                        min="1" style="max-width:60px;">
                                    <button type="button" class="btn btn-outline-light fw-bold border-danger"
                                        style="color:#ff003c;"
                                        onclick="var q = this.parentNode.querySelector('input'); q.value++">
                                        +
                                    </button>
                                    <button class="btn fw-bold ms-2" style="background:#ff003c;color:#fff;" type="submit">
                                        Adicionar ao Carrinho
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $eletronicos->links() }}
        </div>
    </div>
@endsection
