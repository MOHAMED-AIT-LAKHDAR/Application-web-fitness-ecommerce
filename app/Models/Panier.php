<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table = "paniers";

    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
    
}
