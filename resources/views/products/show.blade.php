@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p class="text-xl font-semibold">{{ number_format($product->price, 2, ',', '.') }} R$</p>
    <a href="{{ route('sales.create', $product->id) }}">Ir para Venda</a>
@endsection
