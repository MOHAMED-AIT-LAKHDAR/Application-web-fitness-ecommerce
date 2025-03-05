<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBuy extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_buy',
        'product_id',
        'price_unity',
        'quantity',
        'price_total',
    ];

    public function buys()
    {
        return $this->belongsTo(Buy::class, 'reference_buy');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
