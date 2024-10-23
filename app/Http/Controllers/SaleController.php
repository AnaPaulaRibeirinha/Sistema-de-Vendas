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
    public function store(Request $request) {
        $sale = Sale::create([
            'customer_id' => $request->customer_id,
            'user_id' => auth()->id(),
            'total_amount' => $request->total_amount,
            'payment_method' => $request->payment_method,
        ]);
    
        // Vincular produtos à venda
        foreach ($request->products as $product_id => $product_details) {
            if (isset($product_details['selected'])) {
                $sale->products()->attach($product_id, [
                    'quantity' => $product_details['quantity'],
                    'price' => $product_details['price'],
                ]);
            }
        }
    
        $this->generateInstallments($sale, $request->installments, $request->total_amount, $request->first_due_date);
    
        return redirect()->route('sales.index')->with('success', 'Venda cadastrada com sucesso!');
    }
    
    private function generateInstallments(Sale $sale, $numInstallments, $totalAmount, $firstDueDate) {
        $installmentAmount = $totalAmount / $numInstallments;
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
    
}
