<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller{
    public function index(){
        $products = Product::all();
        $productbest = Product::where('best','active')->get();
        $productfeatured = Product::where('featured','active')->get();

        return view('client.index',compact('products','productbest','productfeatured'));
    }

    public function category(){
        $categorys = category::where('status','=',0)->get();
        return view('client.category',compact('categorys'));
    }
    public function viewCategoryProduct($name){
        if(category::where('name','=',$name)->exists()){
            $cat = category::where('name','=',$name)->first();
            $products = Product::where('category_id','=',$cat->id)->get();
            $name = $cat->name;
            return view('client.product.category_product',compact('products','name'));
        }
        return redirect('/')->with('danger','this category doesnt esist');
    }

    public function viewProduct($cat , $prod){

        if(category::where('name','=',$cat)){
            if(Product::where('name','=',$prod)->exists()){
                $product = Product::where('name','=',$prod)->first();
                $id = category::where('name','=',$cat)->first()->id;
                $products = Product::where('category_id',$id )->get();
                $rates = Rating::where('prod_id',$product->id)->get();
                $rates_sum = Rating::where('prod_id',$product->id)->sum('stars_rated');
                $rates_user = Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
                $reviews = Review::where('prod_id',$product->id)->get();
                $reviews_user = Review::where('prod_id',$product->id)->where('user_id',Auth::id())->first();


                if($rates->count()!=0){
                    $rates_val = $rates_sum /$rates->count();
                }else{
                    $rates_val = 0;
                }
                return view('client.product.viewproduct',compact('product','products','rates','rates_val','rates_user','reviews','reviews_user'));
            }
            else{
                return redirect('/')->with('danger','the link was broken');
            }
        }else{
            return redirect('/')->with('danger','no category found');
        }

    }

    public function profile(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('client.profile',compact('user'));
    }

    public function editprofile(){
        return view('client.editinfo');


    }
    public function edit(Request $request){
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

        return redirect()->route('profile');

    }

 
    

   
    public function searchProducts(Request $request)
{
    if ($request->has('search')) {
        $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
        return view('client.search', compact('searchProducts'));
    } else {
        return redirect()->back()->with('message', 'Empty Search');
    }
}

public function searchProductsList(Request $request)
{
    $products = Product::all();
    return response()->json($products);
}



public function autocomplete(Request $request)
{
    $query = $request->get('query');

    $products = Product::where('name', 'like', "%$query%")->get();

    return response()->json($products);
}

}
