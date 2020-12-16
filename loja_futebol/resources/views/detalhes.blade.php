@extends('layouts.app')

@section('content')
<h1>Loja de Desporto - Detalhes</h1>

<div class="detalhes">
    @if(isset($produto))
    <img src="{{ $produto->url }}" alt="produto/img">
    <h2>{{ $produto -> nome }}</h2>
    <p>{{ $produto -> desc }} <br />€ {{ $produto -> preco }}</p>
    @else
    <h1>O produto nao existe!</h1>
    @endif

    @auth
    @if ($produto->created_by == auth()->user()->id || auth()->user()->IsAdmin)
    <form action="{{route('products.destroy', $produto ->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Eliminar Produto</button>
    </form>
    @endif
    <form action="{{route('products.edit', $produto ->id)}}" method="GET">
        @csrf
        <button>Editar Produto</button>
    </form>
    @endauth

    <a href="/produtos">Voltar aos produtos</a>
</div>
@endsection