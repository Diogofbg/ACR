@extends('layouts.app')

@section('content')
<h1 class="titulo" style="text-align:center;">Loja de Desporto</h1>
<div class="intro" style="text-align:center;">
    <img src="/img/futebol.jpg" alt="loja/img">
    <br>
    <br>
    <button class="bottom"><a href="{{ route('products.index')}}">Ver Produtos</a></button>
</div>
@endsection