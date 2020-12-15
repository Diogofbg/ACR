@extends('layout.layout')

@section('content')
<h1 class="titulo">Loja de Desporto</h1>
<div class="intro">
    <img src="/img/futebol.jpg" alt="loja/img">
    <br>
    <br>
    <button class="bottom"><a href="{{ route('products.index')}}">Ver Produtos</a></button>
</div>
@endsection