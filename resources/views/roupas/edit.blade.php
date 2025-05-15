@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Editar Roupa</h2>
        @include('roupas._form', ['roupa' => $roupa])
    </div>
@endsection
