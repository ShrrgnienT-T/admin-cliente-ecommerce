@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Editar Alimento</h2>
        @include('alimentos._form', ['alimento' => $alimento])
    </div>
@endsection
