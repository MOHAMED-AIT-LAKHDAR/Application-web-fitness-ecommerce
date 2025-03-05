<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Panier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class paymentController extends Controller
{
    public function index(){
        return view('payment.verifyInfoClient');
    }

    public function verifyinfo(Request $request){
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone_number' => 'required|max:13',
            'postalcode' => 'required|string',
            'city' => 'required|string',
            'faddress' => 'required|string',
            'sadresse' =>'nullable',
        ]);
        $user = User::where('id',Auth::id())->first();
        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone_number;
        $user->email = Auth::user()->email;
        $user->password = Auth::user()->password;
        $user->image = Auth::user()->image;
        $user->postalcd = $request->postalcode;
        $user->city = $request->city;
        $user->fadresse = $request->faddress;
        $user->sadresse = $request->saddress;
        $user->update();

        return redirect()->route('payment');
    }

    public function payment(){
        return view('payment.methodepayment');
    }
    public function placeorder(){
        $order = new Order();
        $order->user_id = Auth()->user()->id;
        $order->fname = Auth()->user()->name;
        $order->lname = Auth()->user()->lname;
        $order->email = Auth()->user()->email;
        $order->phone = Auth()->user()->phone;
        $order->city = Auth()->user()->city;
        $order->postecd	 = Auth()->user()->postalcd;
        $order->fadress = Auth()->user()->fadresse;
        $order->sadress = Auth()->user()->sadresse;

        $total = 0;
        $carteitems_total = Panier::where('user_id',Auth::id())->get();
        foreach($carteitems_total as $prod){
            $total += $prod->product->prix_vent - ($prod->product->prix_vent* $prod->product->discount)/100;
        }

        $order->total_price = $total;
        $order->tracking_no = 'order'.rand(1111,9999);
        $order->save();

        $carteitems = Panier::where('user_id',Auth::id())->get();
        foreach($carteitems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->product->prix_vent - ($item->product->prix_vent* $item->product->discount)/100,

            ]);
        }

        $carteitems = Panier::where('user_id',Auth::id())->get();
        Panier::destroy($carteitems);
        return redirect()->route('home')->with('success','Your order added successfully');
    }
}
