@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Editar Eletrônico</h2>
        @include('eletronicos._form', ['eletronico' => $eletronico])
    </div>
@endsection
