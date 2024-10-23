@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Lista de Clientes</h1>
    
    <a href="{{ route('customer.create') }}" class="btn mb-4">Adicionar Cliente</a>

    <table class="table bg-white rounded-lg shadow-md">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->cpf }}</td>
                    <td>
                        <form action="{{ route('customer.destroy', $customer) }}" method="POST" style="display:inline;">
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
