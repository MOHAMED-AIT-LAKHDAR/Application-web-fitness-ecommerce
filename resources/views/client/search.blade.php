@extends('client.master')

@section('title','Search Products')

@section('content')
    <style>
        #edit {
            width: 350px;
            height: 180px;
        }

        .container a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .container a:hover {
            color: #0056b3;
        }


        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 500;
            color: #555;
        }

        select.form-control,
        input.form-control {
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card-img-top {
            max-height: 300px;
            object-fit: cover;
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-text {
            color: #777;
            font-size: 0.875rem;
        }

        .pagination {
            margin-top: 2rem;
        }

        .pagination .page-item .page-link {
            color: #007bff;
            background-color: transparent;
            border: 1px solid #ffff;
        }

        .pagination .page-item .page-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
    </style>


    <div class="container mt-5">
        <div class="row">
            

            
            <div class="col-md-9">
                <!-- Conteneur des produits -->
                <div id="products-container" class="row">
                    <!-- Les produits filtrés seront affichés ici -->
                    @foreach ($searchProducts as $product)
                        <div class="col-md-4 mb-3 w-20 h-20">
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
                <div class="container mb-3 d-flex justify-content-center">
                    {{ $searchProducts->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filter-form').submit(function(event) {
                event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

                // Récupérer les valeurs sélectionnées dans le formulaire
                var category = $('input[name="category[]"]:checked').map(function() {
                    return $(this).val();
                }).get();
                var minPrice = $('#min_price').val();
                var maxPrice = $('#max_price').val();
                var size = $('input[name="size[]"]:checked').map(function() {
                    return $(this).val();
                }).get();
                var grams = $('input[name="grams[]"]:checked').map(function() {
                    return $(this).val();
                }).get();
                console.log("Category: " + category + ", Min Price: " + minPrice + ", Max Price: " +
                    maxPrice + ", Size: " + size + ", Grams: " + grams);

                // Envoyer une requête AJAX au serveur pour filtrer les produits
                $.ajax({
                    type: 'GET',
                    url: "{{ route('product.filter') }}",
                    data: {
                        category: category,
                        min_price: minPrice,
                        max_price: maxPrice,
                        size: size,
                        grams: grams // Envoyer les grammes sélectionnés
                    },
                    success: function(response) {
                        // Mettre à jour le contenu du conteneur de produits avec les produits filtrés
                        $('#products-container').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
