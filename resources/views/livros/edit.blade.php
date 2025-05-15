@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Editar Livro</h2>
        @include('livros._form', ['livro' => $livro])
    </div>
@endsection
