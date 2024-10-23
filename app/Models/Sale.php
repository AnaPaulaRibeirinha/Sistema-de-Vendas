<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;

    protected $fillable = ['customer_id', 'total_amount', 'payment_method'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_product')
                    ->withPivot('quantity', 'price');
    }
    public function installments()
    {
        return $this->hasMany(Installments::class);
    }
}
