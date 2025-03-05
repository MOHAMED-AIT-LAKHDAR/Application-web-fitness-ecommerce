<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use carbon\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){

        $currentMonth = Carbon::now()->format('m'); // Get the current month

        $orders = Order::where('status', '0')
                    ->whereMonth('created_at', $currentMonth) // Filter by current month
                    ->get();
        return view('admin.order.index',compact('orders'));
    }

    public function vieworder($id){
        $orders = Order::where('id',$id)->first();
        return view('admin.order.view',compact('orders'));
    }

    public function updateorder(Request $request,$id){
        $order = Order::find($id);
        $order->status = $request->order_status ;
        $order->update();
        return redirect()->route('order.index')->with('success','order updated successfuly');
    }

    public function historyorder(){
        $orders = Order::whereIn('status', [1, 2])->get();
        return view('admin.order.history',compact('orders'));
    }

    public function dateorder(Request $request){
        // Get the order by tracking number
        $order = Order::where('tracking_no', $request->order_tracking)->first();
        $orders = Order::where('status','0')->get();

        if (!$order) {
            return back()->with('danger', 'Order not found.');
        }

        // Validate the delivery date
        $deliveryDate = Carbon::parse($request->date_delivery);
        $currentDate = Carbon::now();

        if ($deliveryDate->lessThanOrEqualTo($currentDate)) {
            return redirect()->route('order.index')->with('danger', 'Delivery date must be more than the current date .');
        }
        if(!empty($order->datedelivery) || isset($order->datedelivery)){
            $order->datedelivery = $deliveryDate;
            $order->update();
            return redirect()->route('order.index')->with('success', 'Delivery date update successfuly.');
            // return view('admin.order.index',compact("orders"));

        }

        $order->datedelivery = $deliveryDate;
        $order->save();

        return redirect()->route('order.index')->with('success', 'Delivery date affected successfuly.');
        // return view('admin.order.index',compact("orders"));
    }

    public function pdf($tracking)
    {
        $order = Order::where('tracking_no', $tracking)->first();
        $orderproducts = OrderItem::where('tracking_no', $tracking)->get();
        $pdf = PDF::loadView('pdfFacteur', compact('order', 'orderproducts'));
        return $pdf->download($tracking . '.pdf');
    }


}
