@extends('layout.layout')

@section('content')
<h1>Loja de Desporto - Produtos</h1>

<div class="listaTipos">
    @if(!isset($actTipo))
    <b>
    @endif
    <a href="{{ route ('products.index') }}">Todos os Produtos</a>
    @if(!isset($actTipo))    
    </b>
    @endif
    @foreach ($tipos as $tipo)
        @if(isset($actTipo) && $actTipo == $tipo->id)
        <b>
        @endif
        - <a href="{{ route ('products.by.tipo', $tipo->id) }}">{{ $tipo -> nome}}</a>
        @if(isset($actTipo) && $actTipo == $tipo->id)
        </b>
        @endif
        @endforeach
</div>

@foreach ($produtos as $produto)
<div class="produto">
    <a href="{{ route('products.show', $produto ->id)}}">
        <img src="{{ $produto->url }}" alt="img/produto">
        <h2>{{ $produto -> nome}}</h2>
    </a>
</div>
<div>
    <a href="{{ route ('products.create') }}"><button>Criar produtos</button></a>
</div>
@endforeach
@endsection