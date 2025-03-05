<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function addpanier(Request $request){

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()){
            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check){
                if(Panier::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(["status"=>"the product ".$prod_check->name." already Added"]);
                }else{
                    $panieItem = new Panier();
                    $panieItem->prod_id = $product_id;
                    $panieItem->prod_qty = $product_qty;
                    $panieItem->user_id = Auth::id();
                    $panieItem->save();
                    return response()->json(["status"=>"the product ".$prod_check->name." successfully"]);
                }
            }else{

                return response()->json(["status"=>"the product doesn't exist"]);
            }

        }else{
            return response()->json(["status"=>"login to Continue"]);
        }

    }

    public function viewpanier(){
        $paniers = Panier::where('user_id',Auth::id())->get();
        return view('client.product.panier',compact('paniers'));
    }

    public function deleteprod($prod_id){
        if(Auth::check()){
            if(Panier::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $pane = Panier::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $pane->delete();
                    return redirect()->route('viewpanier');
                }
        }
        // else{
        //     return ;
        // }

    }

    public function updateitem(Request $request){
        $prod_id = $request->input('prod_id');
        $product_qte = $request->input('prod_qty');
        if(Auth::check()){
            if(Panier::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $pane = Panier::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $pane->prod_qty = $product_qte;
                $pane->save();
                return response()->json(["status"=>"quantity updated"]);
                }
        }
        else{
            return response()->json(["status"=>"login to Continue"]);
        }
    }

    public function paniercount(){
        $paniercount = Panier::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$paniercount]);
    }
}
