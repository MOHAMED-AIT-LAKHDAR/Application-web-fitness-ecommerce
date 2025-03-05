<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(6);


        return view('client.product.index', compact( 'products'));
    }

    public function filter(Request $request)
  {

      // Récupérer les paramètres de filtrage depuis la requête
      $category = $request->input('category');
      $minPrice = $request->input('min_price');
      $maxPrice = $request->input('max_price');
      $size = $request->input('size');
      $grams = $request->input('grams');
      // Construire la requête de filtrage des produits
      $query = Product::query();

      if ($category) {
          $query->whereHas('category', function ($q) use ($category) {
              $q->where('name', $category); // Utiliser le nom de la catégorie pour filtrer
          });
      }

      if ($minPrice) {
          $query->where('prix_vent', '>=', $minPrice);
      }

      if ($maxPrice) {
          $query->where('prix_vent', '<=', $maxPrice);
      }
      if ($size) {
        $query->where('size', $size);
    }

    if ($grams) {
        $query->where('grams', $grams);
    }
      // Exécuter la requête et récupérer les produits filtrés
      $filteredProducts = $query->get();

      // Retourner la vue avec les produits filtrés
      return view('client.product.filtered-products', ['filteredProducts' => $filteredProducts]);
  }


}
