<!-- Fichier resources/views/client/product/filtered-products.blade.php -->

@extends('layouts.filtered-products')

@section('content')
@section('style')
    <style>
        #edit {
            width: 350px;
            height: 180px;
        }
    </style>
@endsection
    <div class="col-md-12">

        <!-- Contenu spécifique à la vue filtered-products -->
        <div id="products-container" class="row">
            <!-- Les produits filtrés seront affichés ici -->
            <div class="col-md-12">
                <!-- Conteneur des produits -->
                <div id="products-container" class="row">
                    <!-- Les produits filtrés seront affichés ici -->
                    @foreach ($filteredProducts as $product)
                        <div class="col-md-4 mb-3">
                            <div class="card position-relative product_data">
                                <a
                                    href="{{ route('product', ['category' => $product->category->name, 'product' => $product->name]) }}">
                                    <img alt="Image" class="img-fluid b-img" id="edit"
                                        src="{{ asset('images/products/' . $product->img) }}">
                                </a>

                                <span
                                    class="float-end position-absolute end-0 m-2 text-capitalize badge {{ $product->condition == 'new' ? 'bg-warning' : ($product->condition == 'hot' ? 'bg-danger' : ($product->condition == 'default' ? 'bg-secondary' : '')) }}  trending_tag">{{ $product->condition }}</span>
                                @auth
                                    @if (\App\Models\Wishlist::where('prod_id', $product->id)->exists())
                                        <button
                                            class="m-2 border-1 rounded-5 position-absolute start-0 bg-white remove-wishlist-item">
                                            <input type="hidden" class="prod_id" value="{{ $product->id }}">
                                            <i class="fa fa-heart text-danger fs"></i>
                                        </button>
                                    @else
                                        <button class="m-2 border-1 rounded-5 position-absolute start-0 bg-white addtowishlist">
                                            <input type="hidden" class="prod_id" value="{{ $product->id }}">
                                            <i class="fa fa-heart-o text-danger fs"></i>
                                        </button>
                                    @endif
                                @endauth
                                @guest
                                    <button class="m-2 border-1 rounded-5 position-absolute start-0 bg-white addtowishlist">
                                        <input type="hidden" class="prod_id" value="{{ $product->id }}">
                                        <i class="fa fa-heart-o text-danger fs"></i>
                                    </button>
                                @endguest
                                <div class="card-header bg-white custom-card-header border-bottom-0">
                                    <h5 class="main-content-label tx-dark tx-medium mb-0">
                                        <span class="float-start">{{ Str::limit($product->name, 19) }}</span>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="float-start">
                                        <div class="text-success d-block border-1">
                                            {{ $product->prix_vent - ($product->prix_vent * $product->discount) / 100 }}Dh
                                            @if ($product->discount != 0)
                                                &nbsp;<span class="badge bg-success">-{{ $product->discount }}%</span>
                                            @endif
                                        </div>
                                        {{-- <div class="fs-6 d-block"> <s>{{ $product->prix_vent }}Dh</s>
                                    </div> --}}
                                    </div>
                                    <div class="float-end">
                                        <input type="hidden" class="prod_id" value="{{ $product->id }}">
                                        <input type="hidden" class="qte" value="1">

                                        <button class="bg-warning rounded-5 addtopanier"><i
                                                class="fa fa-shopping-cart text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
