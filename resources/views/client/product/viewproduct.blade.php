@section('titre', $product->name)
@extends('client.master')
@section('style')
    <style>
        #edit {
            width: 350px;
            height: 180px;
        }

        #nav-tab {
            right: 20pc;
        }

        .nav-tabs .nav-link.active {
            color: red !important;
            border-color: white !important;
            border-bottom: 2px solid red !important;
            background-color: white !important;
        }

        .tab-content>.active {
            border: 1px solid grey;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        @if (Session::has('danger'))
            @include('alert.danger')
        @endif
        @if (Session::has('success'))
            @include('alert.success')
        @endif
    </div>


    <div Class="py-3 mb-4 shadow-sa bg-warning border-top">
        <div class=" container">
            <h6 class="mb-0">Collections > {{ $product->category->name }} > {{ $product->name }} </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('images/products/' . $product->img) }}" alt="">
                    </div>
                    <div Class="col-md-8">
                        <h2 class="mb-1 text-capitalize">
                            {{ $product->name }}
                            <label style="font-size: 16px;"
                                class="float-end badge {{ $product->condition == 'new'
                                    ? 'bg-warning'
                                    : ($product->condition == 'hot'
                                        ? 'bg-danger'
                                        : ($product->condition == 'default'
                                            ? 'bg-secondary'
                                            : '')) }}  trending_tag">
                                {{ $product->condition }}
                            </label>
                        </h2>

                        <p class="me-3 text-success fw-bold">-{{ $product->discount }}% OFF</p>
                        @php $ratesnum = number_format($rates_val) @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $ratesnum; $i++)
                                <i class="fa fa-star text-warning"></i>
                            @endfor
                            @for ($j = $ratesnum + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($rates->count() > 0)
                                    {{ $rates->count() }} Rating
                                @else
                                    No Rating
                                @endif

                            </span>
                        </div>

                        <hr>
                        <label class="fs-2">Price :
                            {{ $product->prix_vent - ($product->prix_vent * $product->discount) / 100 }} DH</label>
                        @if ($product->discount != 0)
                            <label class="me-3 text-danger fw-bold">Old Price: <s> {{ $product->prix_vent }}DH</s></label>
                        @endif

                        <hr>

                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement">-</button>
                                    <input type="text" disabled name="quantity" value="1"
                                        class="form-control text-center qte" />
                                    <button class="input-group-text increment">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                <button type="button" class="btn btn-dark addtopanier me-3 float-start">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                <button type="button" class="btn btn-danger addtowishlist me-3 float-start">
                                    <i class="fa fa-heart-o"></i></button>

                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="container mt-5">
                    <nav>
                        <div class="nav nav-tabs justify-content-center position-relative border border-0" id="nav-tab"
                            role="tablist">
                            <button class="nav-link active fw-semibold text-dark" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Description</button>
                            @if ($product->category->name !== 'Men' && $product->category->name !== 'Women')
                                <!-- Le bouton sera affiché seulement si la catégorie est "Men" ou "Women" -->
                                <button class="nav-link fw-semibold text-dark" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Utilisation</button>
                            @endif

                            <button class="nav-link fw-semibold text-dark" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Livraison</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-4" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            <h4 class="mt-3">Information sur le produit</h4>
                            {{ $product->description }}
                        </div>
                        <div class="tab-pane fade p-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                            tabindex="0">
                            <h4 class="mt-3">Comment on peut l'utiliser ?</h4>
                            {{ $product->utilisation . '' . $product->category->name }}
                        </div>
                        <div class="tab-pane fade p-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                            tabindex="0">
                            <h4 class="mt-3">Livraison</h4>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore dolor sunt
                            vitae. Perspiciatis unde itaque impedit dolorum, porro at? Deleniti ut quisquam cum dolor earum
                            similique nesciunt repellat ex harum.Iure, quia perferendis nobis quas soluta earum corrupti
                            illo aspernatur, quae ad nostrum quasi dolorem, voluptatum cumque quo. Exercitationem, tempora
                            voluptatibus quibusdam reprehenderit esse sint eos. Voluptatum omnis nisi facilis!
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container my-4">
        <!-- Button trigger modal -->
        @if (Auth::check())
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Rate and leave a review for the product - click here
            </button>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('addratereview') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><span class="text-secondary">Rate
                                    <span class="text-dark">{{ $product->name }} </span>and leave a
                                    comment</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rating-css">
                                <div class="star-icon">
                                    @if ($rates_user)
                                        @for ($i = 1; $i <= $rates_user->stars_rated; $i++)
                                            <input type="radio" value="{{ $i }}" name="product_rating"
                                                checked id="rating{{ $i }}">
                                            <label for="rating{{ $i }}" class="fa fa-star"></label>
                                        @endfor
                                        @for ($j = $rates_user->stars_rated + 1; $j <= 5; $j++)
                                            <input type="radio" value="{{ $j }}" name="product_rating"
                                                id="rating{{ $j }}">
                                            <label for="rating{{ $j }}" class="fa fa-star"></label>
                                        @endfor
                                    @else
                                        <input type="radio" value="1" name="product_rating" checked
                                            id="rating1">
                                        <label for="rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                        <label for="rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                        <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                        <label for="rating5" class="fa fa-star"></label>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Review : <span class="text-danger">*</span></label>
                                <textarea name="review" rows="3" class="form-control">
                                    @if (Auth::check() && $reviews_user)
{{ $reviews_user->user_review }}
@endif
                                </textarea>
                                @error('review')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <h2 class="mt-3">Reviews of the clients</h2>
        <div class="row">
            @if ($reviews->count() > 0)
                @foreach ($reviews as $item)
                    <div class="user-review">
                        <div class="col-md-12">
                            <span class="item-thumbnail">
                                <img src="{{ asset('/images/users/' . $item->user->image) }}" width="5%"
                                    height="5%" alt="image" class="profile-pic rounded-5">
                            </span>
                            <label for="">{{ $item->user->name . ' ' . $item->user->lname }}</label>
                            @if ($item->user_id == Auth::id())
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="text-decoration-none text-dark d-inline border-0 bg-white"><i
                                        class="fa fa-pencil text-info"></i></button>
                            @endif
                            <br>
                            @if ($item->rating)
                                @php $user_rated = $item->rating->stars_rated @endphp
                                @for ($i = 1; $i <= $user_rated; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                                @for ($j = $user_rated + 1; $j <= 5; $j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            <small>Reviewed on {{ $item->created_at }}</small>
                            <p>
                                {{ $item->user_review }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <strong>No Reviews right now</strong>
            @endif

        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <h2>You may also like this {{ count($products) }} </h2>
            <div class="owl-carousel owl-theme">
                @foreach ($products as $product)
                    <div class="item">
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
    @endsection

    @section('script')
        <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel();
            });
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3
                    },
                    600: {
                        items: 6
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        </script>



    @endsection
