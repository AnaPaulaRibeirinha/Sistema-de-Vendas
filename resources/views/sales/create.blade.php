@extends('layouts.app')

@section('content')
    <h1 class="text-4xl mb-4">Nova Venda</h1>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="customer" class="block text-gray-700">Cliente</label>
            <select name="customer_id" id="customer" class="form-control">
                <option value="">Selecione um cliente</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="payment_method" class="block text-gray-700">Forma de Pagamento</label>
            <select name="payment_method" id="payment_method" class="form-control">
                <option value="credit">Cartão de Crédito</option>
                <option value="debit">Cartão de Débito</option>
                <option value="cash">Dinheiro</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="installments" class="block text-gray-700">Número de Parcelas</label>
            <input type="number" name="installments" id="installments" value="1" min="1" class="form-control">
        </div>

        <div class="mb-4">
            <label for="first_due_date" class="block text-gray-700">Data de Vencimento da Primeira Parcela</label>
            <input type="date" name="first_due_date" id="first_due_date" class="form-control" required>
        </div>

        <h2 class="text-2xl mt-4 mb-2">Produtos</h2>
        <div id="products">
            @foreach($products as $product)
                <div class="mb-4">
                    <input type="checkbox" name="products[{{ $product->id }}][selected]" value="1">
                    <label>{{ $product->name }} - R$ {{ number_format($product->price, 2, ',', '.') }}</label>
                    <input type="number" name="products[{{ $product->id }}][quantity]" placeholder="Quantidade" class="form-control">
                    <input type="hidden" name="products[{{ $product->id }}][price]" value="{{ $product->price }}">
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn bg-db5461 text-white">Finalizar Venda</button>
    </form>
@endsection
