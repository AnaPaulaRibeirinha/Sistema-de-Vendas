<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Produto 1',
            'featured' => true,
            'description' => 'Descrição do Produto 1',
            'price' => 100.00,
            'stock' => 10,
        ]);

        Product::create([
            'name' => 'Produto 2',
            'featured' => false,
            'description' => 'Descrição do Produto 2',
            'price' => 200.00,
            'stock' => 5,
        ]);

        Product::create([
            'name' => 'Produto 3',
            'featured' => true,
            'description' => 'Descrição do Produto 3',
            'price' => 150.00,
            'stock' => 20,
        ]);
    }
}
