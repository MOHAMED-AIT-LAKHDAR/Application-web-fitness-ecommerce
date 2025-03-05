<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
    'user_id',
    'fname',
    'lname',
    'email',
    'phone',
    'city',
    'postcode',
    'faddress',
    'saddress',
    'total_price',
    'status',
    'tracking_no',
    'datedelivery',
];


    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
    public function client(){

        return $this->belongsTo(User::class,'user_id');
    }
}
