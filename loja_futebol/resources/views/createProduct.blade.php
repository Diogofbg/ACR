@extends('layout.layout')

@section('content')
<h1>Loja Informatica - Criar Produto</h1>
<div class="detalhes">
    <p class="message">{{session('mssg')}}</p>
    <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nome do Produto: </label>
        <input type="text" id='name' name='name'>
        <br>
        <label for="desc">Descricao do Produto: </label>
        <input type="text" id='desc' name='desc'>
        <br>
        <label for="url">Imagem: </label>
        <input type="file" id='url' name='url'>
        <br>
        <label for="price">Preço: </label>
        <input type="text" id='price' name='price'>
        <br>
        <label for="price">Tipo de Produto: </label>
        <select name="tipoProduto" id="tipoProduto">
            @foreach ($tipos as $tipo)
            <option value="{{ $tipo -> id}}">{{ $tipo -> nome}}</option>
            @endforeach
        </select>
        <br>
    </form>
    <br>
    <a href="/produtos">Voltar aos produtos</a>
</div>


@endsection