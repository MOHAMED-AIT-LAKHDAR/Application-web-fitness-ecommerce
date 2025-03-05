<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $clients = User::where('role_as','0')->get();
        $orders = Order::all();
        $sales = Order::where('status','1')->get();
        $total = Order::where('status','1')->sum('total_price');

        $jn = Order::whereMonth('orders.created_at', '=', 1)->sum('orders.total_price');
        $feb= Order::whereMonth('orders.created_at', '=', 2)->sum('orders.total_price');
        $mar =Order::whereMonth('orders.created_at', '=', 3)->sum('orders.total_price');
        $apr =Order::whereMonth('orders.created_at', '=', 4)->sum('orders.total_price');
        $may =Order::whereMonth('orders.created_at', '=', 5)->sum('orders.total_price');
        $jun =Order::whereMonth('orders.created_at', '=', 6)->sum('orders.total_price');
        $jul =Order::whereMonth('orders.created_at', '=', 7)->sum('orders.total_price');
        $aug =Order::whereMonth('orders.created_at', '=', 8)->sum('orders.total_price');
        $sep =Order::whereMonth('orders.created_at', '=', 9)->sum('orders.total_price');
        $oct =Order::whereMonth('orders.created_at', '=', 10)->sum('orders.total_price');
        $nov =Order::whereMonth('orders.created_at', '=', 11)->sum('orders.total_price');
        $dec =Order::whereMonth('orders.created_at', '=', 12)->sum('orders.total_price');

        $janv = Order::whereMonth('orders.created_at', '=', 1)->where('status','=','1')->sum('orders.total_price');
        $fevr= Order::whereMonth('orders.created_at', '=', 2)->where('status','=','1')->sum('orders.total_price');
        $mars =Order::whereMonth('orders.created_at', '=', 3)->where('status','=','1')->sum('orders.total_price');
        $april =Order::whereMonth('orders.created_at', '=', 4)->where('status','=','1')->sum('orders.total_price');
        $mai =Order::whereMonth('orders.created_at', '=', 5)->where('status','=','1')->sum('orders.total_price');
        $juin =Order::whereMonth('orders.created_at', '=', 6)->where('status','=','1')->sum('orders.total_price');
        $juillet =Order::whereMonth('orders.created_at', '=', 7)->where('status','=','1')->sum('orders.total_price');
        $aout =Order::whereMonth('orders.created_at', '=', 8)->where('status','=','1')->sum('orders.total_price');
        $septembre =Order::whereMonth('orders.created_at', '=', 9)->where('status','=','1')->sum('orders.total_price');
        $octobre =Order::whereMonth('orders.created_at', '=', 10)->where('status','=','1')->sum('orders.total_price');
        $novembre =Order::whereMonth('orders.created_at', '=', 11)->where('status','=','1')->sum('orders.total_price');
        $decembre =Order::whereMonth('orders.created_at', '=', 12)->where('status','=','1')->sum('orders.total_price');

        $janvier = Order::whereMonth('orders.created_at', '=', 1)->where('status','=','0')->sum('orders.total_price');
        $fevrier= Order::whereMonth('orders.created_at', '=', 2)->where('status','=','0')->sum('orders.total_price');
        $marsunpaid =Order::whereMonth('orders.created_at', '=', 3)->where('status','=','0')->sum('orders.total_price');
        $aprilunpaid =Order::whereMonth('orders.created_at', '=', 4)->where('status','=','0')->sum('orders.total_price');
        $maiunpaid =Order::whereMonth('orders.created_at', '=', 5)->where('status','=','0')->sum('orders.total_price');
        $juinunpaid =Order::whereMonth('orders.created_at', '=', 6)->where('status','=','0')->sum('orders.total_price');
        $juilletunpaid =Order::whereMonth('orders.created_at', '=', 7)->where('status','=','0')->sum('orders.total_price');
        $aoutunpaid =Order::whereMonth('orders.created_at', '=', 8)->where('status','=','0')->sum('orders.total_price');
        $septembreunpaid =Order::whereMonth('orders.created_at', '=', 9)->where('status','=','0')->sum('orders.total_price');
        $octobreunpaid =Order::whereMonth('orders.created_at', '=', 10)->where('status','=','0')->sum('orders.total_price');
        $novembreunpaid =Order::whereMonth('orders.created_at', '=', 11)->where('status','=','0')->sum('orders.total_price');
        $decembreunpaid =Order::whereMonth('orders.created_at', '=', 12)->where('status','=','0')->sum('orders.total_price');

        $chart = [$jn, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec];
        $chart2 = [$janv,$fevr,$mars,$april,$mai,$juin,$juillet,$aout,$septembre,$octobre,$novembre,$decembre];
        $unpaid = [$janvier, $fevrier, $marsunpaid, $aprilunpaid, $maiunpaid, $juinunpaid, $juilletunpaid, $aoutunpaid,
            $septembreunpaid,
            $octobreunpaid,
            $novembreunpaid,
            $decembreunpaid
        ];


        

        return view('admin.dashboard',compact('orders','clients','sales','total','chart','chart2','unpaid'));
    }
}
