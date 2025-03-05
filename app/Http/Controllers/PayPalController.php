<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayPalController extends Controller
{
    public function payment(){
        $order_uder = OrderItem::where('user_id',Auth::id())->get();
        
    }
}
