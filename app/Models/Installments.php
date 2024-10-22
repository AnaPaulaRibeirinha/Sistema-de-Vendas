<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installments extends Model
{
    /** @use HasFactory<\Database\Factories\InstallmentsFactory> */
    use HasFactory;

    protected $fillable = ['sale_id', 'amout', 'due_date'];

    protected $casts = [
        'due_date' => 'datetime',
    ];
}
