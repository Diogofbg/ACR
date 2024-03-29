@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Status') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br><a href="{{ route ('products.create') }}"><button>Criar produtos</button></a><br><br><br>
                    {{ __('Entrada efetuada com sucesso!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
