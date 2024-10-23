@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4 text-db5461">Bem-vindo ao Sistema de Vendas</h1>
        <p class="text-lg mb-8">Encontre o que você precisa com facilidade!</p>
        <a href="{{ route('customer.index') }}" class="btn bg-00a8e8 text-white hover:bg-3d5467 mb-4">Clientes</a>
        <a href="{{ route('sales.index') }}" class="btn bg-00a8e8 text-white hover:bg-3d5467 mb-4">Vendas</a>
        <a href="{{ route('products.index') }}" class="btn bg-00a8e8 text-white hover:bg-3d5467 mb-4">Produtos</a>
    </div>

    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Exemplo de produtos ou itens em destaque -->
            @foreach ($featuredProducts as $product)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h2 class="text-lg font-bold text-686963">{{ $product->name }}</h2>
                    <p class="text-db5461">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    <a href="{{ route('products.show', $product) }}" class="btn mt-2 bg-686963 text-white hover:bg-3d5467">Ver detalhes</a>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="text-center mt-8 py-4 border-t">
        <p class="text-sm text-gray-600">&copy; 2024 Sistema de Vendas. Todos os direitos reservados.</p>
    </footer>
@endsection
