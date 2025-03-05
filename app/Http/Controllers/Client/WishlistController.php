<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){

        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('client.product.wishlist',compact('wishlist'));
    }


    public function add(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('product_id');
            $item = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists();
            if(Product::find($prod_id)){
                if(!$item){
                    $wish = new Wishlist();
                    $wish->prod_id = $prod_id;
                    $wish->user_id = Auth::user()->id;
                    $wish->save();
                    return response()->json(['status'=>"wishlist added successfully"]);

                }else{

                    return response()->json(['status'=>"this item is already in the list"]);
                }

            }
            else{
                return response()->json(['status'=>"Product doesn't exist"]);

            }
        }else{
            return response()->json(['status'=>"login to continue"]);
        }
    }

    public function deletewishlist(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('product_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $wish = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();

                $wish->delete();
                return response()->json(['status'=>"Item Removed successfully"]);

            }
            else{
                return response()->json(['status'=>"Product doesn't exist"]);

            }
        }else{
            return response()->json(['status'=>"login to continue"]);
        }
    }
    public function wishlistcount(){
        if(Auth::check()){

            $wishlistcount = Wishlist::where('user_id',Auth::id())->count();
            return response()->json(['count'=>$wishlistcount]);
        }else{

            return response()->json(['count'=>0]);
        }
    }
}
