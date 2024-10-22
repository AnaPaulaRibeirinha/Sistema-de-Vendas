@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Produtos em Destaque</h1>
    <div class="row">
        @foreach ($featuredProducts as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Preço: R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Produto</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h1 class="mb-4">Todos os Produtos</h1>
    <div class="row">
        @foreach ($allProducts as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Preço: R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Produto</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
