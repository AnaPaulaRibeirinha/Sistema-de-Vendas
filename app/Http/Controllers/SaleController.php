<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Installments;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function store(Request $request)
    {

        $totalAmount = 0;

        foreach ($request->products as $product_id => $product_details) {
            if (isset($product_details['selected'])) {
                $totalAmount += $product_details['price'] * $product_details['quantity'];
            }
        }

        if ($totalAmount <= 0) {
            return redirect()->back()->withErrors(['total_amount' => 'O valor total deve ser maior que zero.']);
        }


        $sale = Sale::create([
            'customer_id' => $request->customer_id,
            'total_amount' => $totalAmount,
            'payment_method' => $request->payment_method,
        ]);


        foreach ($request->products as $product_id => $product_details) {
            if (isset($product_details['selected'])) {
                $sale->products()->attach($product_id, [
                    'quantity' => $product_details['quantity'],
                    'price' => $product_details['price'],
                ]);
            }
        }

        $this->generateInstallments($sale, $request->installments, $totalAmount, $request->first_due_date);

        return redirect()->route('sales.index')->with('success', 'Venda cadastrada com sucesso!');
    }

    private function generateInstallments(Sale $sale, $numInstallments, $totalAmount, $firstDueDate)
    {
        $installmentAmount = $totalAmount / $numInstallments; // Cálculo do valor da parcela
        $dueDate = Carbon::parse($firstDueDate);
    
        for ($i = 0; $i < $numInstallments; $i++) {
            Installments::create([
                'sale_id' => $sale->id,
                'amount' => round($installmentAmount, 2), 
                'due_date' => $dueDate->copy()->addMonths($i),
                'paid' => false,
            ]);
        }
    }
    

    public function index()
    {
        $sales = Sale::with(['customer', 'installments'])->get();

        return view('sales.index', compact('sales'));
    }

    public function create()
    {

        $customers = Customer::all();
        $products = Product::all();

        return view('sales.create', compact('customers', 'products'));
    }

    public function edit(Sale $sale)
    {
    
        $customers = Customer::all();
        $products = Product::all();

    
        return view('sales.edit', compact('sale', 'customers', 'products'));
    }
}
