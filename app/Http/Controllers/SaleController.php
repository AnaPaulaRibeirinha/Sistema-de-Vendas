<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // Recupera todas as vendas
        $sales = Sale::with('customer')->get(); // Carrega as vendas com os clientes
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        // Busca todos os clientes para exibir no formulário de venda
        $customers = Customer::all();

        return view('sales.create', compact('customers'));
    }

    public function store(Request $request)
    {
        // Validação básica dos dados
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'total' => 'required|numeric',
        ]);

        // Criação da venda
        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Venda criada com sucesso!');
    }

    public function edit(Sale $sale)
    {
        // Busca todos os clientes para o formulário de edição
        $customers = Customer::all();

        return view('sales.edit', compact('sale', 'customers'));
    }

    public function update(Request $request, Sale $sale)
    {
        // Validação dos dados
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'total' => 'required|numeric',
        ]);

        // Atualização da venda
        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(Sale $sale)
    {
        // Exclusão da venda
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso!');
    }
}
