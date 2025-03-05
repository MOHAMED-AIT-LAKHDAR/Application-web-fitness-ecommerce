<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientOrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('client.orders.index',compact('orders'));
    }

    public function vieworder($id){
        $order  = Order::where('user_id',Auth::id())->first();
        return view('client.orders.view',compact('order'));
    }

    public function pdf($tracking_no)
    {
        $order = Order::where('tracking_no', $tracking_no)->first();
        $orderproducts = OrderItem::where('order_id', $order->id)->get();
        $pdf = PDF::loadView('/client/orders/pdfFacteur', compact('order', 'orderproducts'));
        return $pdf->download($order->tracking_no . '.pdf');
    }

    public function uncomplete($tracking_no){
        $order = Order::where('tracking_no', $tracking_no)->first();
        $order->status = "2";
        $order->save();
        return back();
    }

}
