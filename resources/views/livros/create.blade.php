@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Novo Livro</h2>
        @include('livros._form')
    </div>
@endsection
