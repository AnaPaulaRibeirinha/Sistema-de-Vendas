<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Exibe os produtos em destaque (você pode ajustar conforme necessário)
        $featuredProducts = Product::where('featured', true)->get();
        return view('welcome', compact('featuredProducts'));
    }
}
