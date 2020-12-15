@extends('layouts.app')

@section('content')
<h1>Loja Informatica -
    @if (isset($produto))
    Editar Produto
    @else
    Criar Produto
    @endif
</h1>
<div class="detalhes">
    <p class="message">{{session('mssg')}}</p>
    <form method="POST" enctype="multipart/form-data" @if (isset($produto)) action="{{ route('products.update', $produto->id)}}" @else action="{{ route('products.store' )}}" @endif>
        @csrf
        @if (isset($produto))
        @method('PUT')
        @endif
        <label for="name">Nome do Produto: </label>
        <input type="text" id='name' name='name' @if(isset($produto)) value="{{$produto->nome}}" @endif>
        <br>
        <label for="desc">Descricao do Produto: </label>
        <input type="text" id='desc' name='desc' @if(isset($produto)) value="{{$produto->desc}}" @endif>
        <br>
        <input type="hidden" id="changed" name="changed" value="false">
        <label for="url">Imagem: </label>
        <input type="file" id='url' name='url' onchange="document.getElementById('changed').value='true';" @if(isset($produto)) (nao alterar para manter foto) @endif>
        <br>
        <label for="price">Preço: </label>
        <input type="text" id='price' name='price' @if(isset($produto)) value="{{$produto->preco}}" @endif>
        <br>
        <label for="price">Tipo de Produto: </label>
        <select name="tipoProduto" id="tipoProduto">
            @foreach ($tipos as $tipo)
            <option value="{{ $tipo -> id}}" @if (isset($produto) && $produto ->tipo_produto_id == $tipo->id)
                selected="selected"
                @endif
                >{{$tipo->nome}}
            </option>
            @endforeach
        </select>
        <br>
        <input type="submit"
        @if(isset($produto))
            value="Editar Produto"
        @else 
            value="Criar Produto"
        @endif>
    </form>
    <br>
    <a href="/produtos">Voltar aos produtos</a>
</div>


@endsection