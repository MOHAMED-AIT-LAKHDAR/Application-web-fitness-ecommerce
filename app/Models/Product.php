<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'img',
        'sku',
        'prix_vent',
        'prix_achat',
        'description',
        'best',
        'featured',
        'utilisation',
        'size',
        'grams'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productBuys()
    {
        return $this->hasMany(ProductBuy::class, 'product_id', 'id');
    }


}
