<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    return view('admin.product.index', compact('products'));
  }
  public function show($id)
  {
    $product = Product::findOrFail($id);
    return view('admin.product.show', compact('product'));
  }
  public function create()
  {
    $categorys = Category::all();
    return view('admin.product.create', compact('categorys'));
  }
  public function store(Request $request){
    // dd($request);
    $request->validate([
      'name' => 'required',
      'img' => 'image|mimes:png,jpg,svg,jpeg',
      'sku' => 'required|unique:products',
      'prix_vent' => 'required',
      'prix_achat' => 'required',
      'description' => 'required|min:5',
      'status' =>'required',
      'condition' => 'required',
      'utilisation'=>'required'
    ]);
    // //save photo in folder
    $file_name = '';
    $filename = 'default.jpg';
    if ($request->hasfile('img')) {
      $file_extention = $request->file('img');
      $file_name = $file_extention->getClientOriginalExtension(); //getting image extention
      $filename = time() . '.' . $file_name;
      $path = 'images/products';
      $file_extention->move($path, $filename);
    }
    Product::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'img' => $filename,
        'sku' => $request->sku,
        'prix_vent' => $request->prix_vent,
        'prix_achat' => $request->prix_achat,
        'description' => $request->description,
        'condition' =>$request->condition,
        'status' =>$request->status,
        'discount' => $request->discount,
        'best'=>$request->best,
        'featured'=>$request->featured,
        'utilisation'=>$request->utilisation,
    ]);
    return redirect()->route('product.index')->with('success', 'the Product ' . $request->name . 'has been created');
  }
  public function update($id)
  {
    $product = Product::findOrFail($id);
    $categorys = category::all();
    return view('admin.product.edit', compact('product', 'id', 'categorys'));
  }
  public function edit(Request $request)
  {
    // dd($request);
    $request->validate([
      'name' => 'required',
      'img' => 'image|mimes:png,jpg,svg,jpeg,jfif',
      'sku' => 'required|unique:products',
      'price_vent' => 'required',
      'price_achat' => 'required',
      'description' => 'required|min:5',
      'status' =>'required',
      'condition' => 'required'
    ]);
    //save photo in folder
    $product = Product::find($request->id);
    $filename = $product->img;
    if ($request->hasfile('img')) {
      $file_extention = $request->file('img');
      $file_name = $file_extention->getClientOriginalExtension(); //getting image extention
      $filename = time() . '.' . $file_name;
      $path = 'images/products';
      $file_extention->move($path, $filename);
    }
    $product = Product::findOrfail($request->id);
    $product->category_id=$request->category_id;
    $product->name = $request->name;
    $product->sku = $request->sku;
    $product->prix_vent = $request->price_vent;
    $product->prix_achat = $request->price_achat;
    $product->description = $request->description;
    $product->img = $filename;
    $product->condition =$request->condition;
    $product->status =$request->status;
    $product->discount = $request->discount;
    $product->best = $request->best;
    $product->featured = $request->featured;
    $product->utilisation = $request->utilisation;

    $product->update();
    return redirect()->route('product.index')->with('success', 'Your updated was successfully');
  }
  public function delete($id)
  {
    $prod = Product::findOrFail($id);
    $prod->delete();
    return redirect()->route('product.index')->with('success', 'the product has been deleted successfully');
  }
  
}
