<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use Illuminate\Support\Facades\DB;

class RateReviewController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $stars_rated = $request->product_rating;
        $prod_id = $request->product_id;
        $review = $request->review;

        $checkprod = Product::where('id', $prod_id)->where('status', 'active')->first();
        if ($checkprod) {
            $verify_purchase = Order::where('user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.prod_id', $prod_id)
                ->exists();

            if ($verify_purchase) {
                try {
                    DB::beginTransaction();

                    $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                    $existing_review = Review::where('user_id', Auth::id())->where('prod_id', $prod_id)->first();
                    if ($existing_rating && $existing_review) {
                        $existing_rating->stars_rated = $stars_rated;
                        $existing_review->review = $review;
                        $existing_rating->save();
                        $existing_review->save();
                    } else {
                        Rating::create([
                            'user_id' => Auth::id(),
                            'prod_id' => $prod_id,
                            'stars_rated' => $stars_rated
                        ]);
                    }

                    Review::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $prod_id,
                        'user_review' => $review,
                    ]);

                    DB::commit();

                    return redirect()->back()->with('success', "Thank you for rating and commenting on this product.");
                } catch (\Exception $e) {
                    DB::rollback();
                    return redirect()->back()->with('danger', "An error occurred while processing your request.");
                }
            } else {
                return redirect()->back()->with('danger', "You can't rate or comment on this product without purchase.");
            }
        } else {
            return redirect()->back()->with('danger', "The link you followed was broken.");
        }
    }
}
