<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Buy;
use App\Models\ProductBuy;
use Illuminate\Support\Facades\Auth;
use App\Models\Achat;
use App\Models\category;
use App\Models\Fournisseur;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{
    public function index(){
        $buys = Buy::all();
        return view('admin.achat.index',compact('buys'));
    }

    public function create(){
        $fournisseurs = Fournisseur::all();
        $products = Product::all();
        return view('admin.achat.create',compact('fournisseurs', 'products'));
    }
    public function getproduct($id)
    {
        $getproduct = Product::find($id);
        return response()->json($getproduct);
    }

    public function createnewprod()
    {
        $categorys = category::all();
        $fournisseurs = Fournisseur::all();
        return view('admin.achat.newproduit', compact('categorys', 'fournisseurs'));
    }


    public function newproduct(Request $request){
        $request->validate([
            'fournisseur_id' => 'required',
            'reference' => 'required|unique:buys',
            'total_price' => 'required',
            'quantity' => 'required',
            'name' => 'required',
            'sku' => 'required|unique:products',
            'selling_price' => 'required',
            'purchase_price' => 'required',
            'img' => 'image|mimes:png,jpg,svg,jpeg',
            'category_id' => 'required',
        ]);

        // dd($request);

        $buy = Buy::create([
            'reference' => $request->reference,
            'prix_total' => $request->total_price,
            'quantity' => $request->quantity,
            'user_id' => Auth::user()->id,
            'fournisseur_id' => $request->fournisseur_id,
        ]);
        if ($buy) {
            $file_name = "default.jpg";
            if ($request->hasfile('img')) {
                $file = $request->file('img');
                $file_extention = $file->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extention;
                $path = 'images/products';
                $file->move($path, $file_name);
            };
            Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'img' => $file_name,
                'sku' => $request->sku,
                // 'prix_vent' => $request->selling_price ?$request->selling_price :0 ,
                'prix_vent' => $request->selling_price  ,
                'prix_achat' => $request->purchase_price,
                'description' => $request->description
            ]);
        }
        return redirect()->route('buy.index')->with('success', 'You have successfully purchased the product.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:buys',
             'fournisseur_id' => 'required',
            'price_total' => 'required',
            'quantity' => 'required',
        ]);
        $buys = Buy::create([
            'reference' => $request->reference,
            'prix_total' => $request->price_total,
            'quantity' => $request->quantity,
            'user_id' => Auth::user()->id,
            'fournisseur_id' => $request->fournisseur_id,
        ]);
        if ($buys) {
            //insert data to table buys products
            $qte = $request->qte;
            $price_unity = $request->price_unity;
            $total_price = $request->total_price;
            $products = $request->products;
            for ($i = 0; $i < count($price_unity); $i++) {
                $data = [
                    'reference_buy' => $request->reference,
                    'product_id' => $products[$i],
                    'price_unity' => $price_unity[$i],
                    'price_total' => $total_price[$i],
                    'quantity' => $qte[$i],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                DB::table('product_buys')->insert($data);
            }
        }
        return view('admin.achat.index')->with('success','your buys created successfully');
    }

    public function details($reference)
    {
        $productbuys = ProductBuy::where('reference_buy', '=', $reference)->get();
        return view('admin.achat.show', compact('productbuys'));
    }

    public function delete($reference)
    {
        ProductBuy::where('reference_buy', $reference)->delete();

        Buy::where('reference', $reference)->delete();

        return redirect()->route('buy.index')->with('success', 'You have deleted the buy successfully.');
    }


    public function pdf($reference)
    {
        $buy = Buy::where('reference', $reference)->first();
        $buyproducts = ProductBuy::where('reference_buy', $reference)->get();
        $pdf = PDF::loadView('pdfAchat', compact('buy', 'buyproducts'));
        return $pdf->download($buy->fournisseur->name . '.pdf');
    }

    public function status($reference){
        $refbuys = Buy::where('tracking_no', $reference)->first();
    }

}
