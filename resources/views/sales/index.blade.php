@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Lista de Vendas</h1>
    
    <a href="{{ route('sales.create') }}" class="btn mb-4">Adicionar Venda</a>

    <table class="table bg-white rounded-lg shadow-md">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Valor Total</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sale->customer->name }}</td> <!-- Supondo que você tenha uma relação de cliente -->
                    <td>{{ number_format($sale->total, 2, ',', '.') }} R$</td> <!-- Exibe o valor total formatado -->
                    <td>{{ $sale->created_at->format('d/m/Y') }}</td> <!-- Formata a data -->
                    <td>
                        <a href="{{ route('sales.edit', $sale) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
