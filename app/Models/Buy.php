<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;
    protected $fillable = [
        'fournisseur_id',
        'user_id',
        'reference',
        'prix_total',
        'quantity',
    ];
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
