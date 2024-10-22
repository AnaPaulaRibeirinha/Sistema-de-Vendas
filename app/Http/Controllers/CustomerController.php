<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all(); // Correção: usar $customers
        return view('customer.index', compact('customers')); // Correção: usar 'customers'
    }

    public function create() {
        return view('customer.create');
    }

    public function store(Request $request) {
        Customer::create($request->all());
        return redirect()->route('customer.index')->with('success', 'Cliente adicionado com sucesso!');
    }

    public function edit(Customer $customer) {
        return view('customer.edit', compact('customers')); // Correção: usar 'customer'
    }

    public function update(Request $request, Customer $customer) {
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Customer $customer) {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Cliente excluído com sucesso!');
    }
}

