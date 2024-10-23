<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'featured', 'description', 'price', 'stock']; 

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_product')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
