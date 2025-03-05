@section('titre', 'Home')
@extends('client.master')
@section('content')
    @if (Session::has('success'))
        @include('alert.success')
    @elseif(Session::has('danger'))
        @include('alert.danger')
    @endif
    @include('client.slidebar')
@section('style')
    <style>
        #edit {
            width: 350px;
            height: 180px;
        }
    </style>
@endsection
<div class="container">
    <div class="row">
        @php
            $categories = \App\Models\Category::all();
        @endphp
        @foreach ($categories as $cat)
            <div class="col-md-3 mt-3">
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center justify-content-center  border-0">
                        <a href="{{ route('catergoryproduct', $cat->name) }}" class="btn btn-light w-100">
                            <img src="{{ asset('images/category/' . $cat->image) }}" class="float-start mt-2"
                                height="80" alt=""><span
                                class="float-start text-capitalize mt-4">&nbsp;{{ $cat->name }} </span>
                        </a>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Products : </h2>
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
        <div class="row mt-2">
            <h2>Best Products : </h2>
            <div class="owl-carousel owl-theme">
                @foreach ($productbest as $bestp)
                    <div class="item">
                        <div class="card position-relative product_data">
                            <a
                                href="{{ route('product', ['category' => $bestp->category->name, 'product' => $bestp->name]) }}">
                                <img alt="Image" class="img-fluid b-img" id="edit"
                                    src="{{ asset('images/products/' . $bestp->img) }}">
                            </a>

                            <span
                                class="float-end position-absolute end-0 m-2 text-capitalize badge {{ $bestp->condition == 'new' ? 'bg-warning' : ($bestp->condition == 'hot' ? 'bg-danger' : ($bestp->condition == 'default' ? 'bg-secondary' : '')) }}  trending_tag">{{ $bestp->condition }}</span>
                            @auth
                                @if (\App\Models\Wishlist::where('prod_id', $bestp->id)->exists())
                                    <button
                                        class="m-2 border-1 rounded-5 position-absolute start-0 bg-white remove-wishlist-item">
                                        <input type="hidden" class="prod_id" value="{{ $bestp->id }}">
                                        <i class="fa fa-heart text-danger fs"></i>
                                    </button>
                                @else
                                    <button class="m-2 border-1 rounded-5 position-absolute start-0 bg-white addtowishlist">
                                        <input type="hidden" class="prod_id" value="{{ $bestp->id }}">
                                        <i class="fa fa-heart-o text-danger fs"></i>
                                    </button>
                                @endif
                            @endauth
                            @guest
                                <button class="m-2 border-1 rounded-5 position-absolute start-0 bg-white addtowishlist">
                                    <input type="hidden" class="prod_id" value="{{ $bestp->id }}">
                                    <i class="fa fa-heart-o text-danger fs"></i>
                                </button>
                            @endguest
                            <div class="card-header bg-white custom-card-header border-bottom-0">
                                <h5 class="main-content-label tx-dark tx-medium mb-0">
                                    <span class="float-start">{{ Str::limit($bestp->name, 19) }}</span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="float-start">
                                    <div class="text-success d-block border-1">
                                        {{ $bestp->prix_vent - ($bestp->prix_vent * $bestp->discount) / 100 }}Dh
                                        @if ($bestp->discount != 0)
                                            &nbsp;<span class="badge bg-success">-{{ $bestp->discount }}%</span>
                                        @endif
                                    </div>
                                    {{-- <div class="fs-6 d-block"> <s>{{ $product->prix_vent }}Dh</s>
                                    </div> --}}
                                </div>
                                <div class="float-end">
                                    <input type="hidden" class="prod_id" value="{{ $bestp->id }}">
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
        <!-- Inclure Font Awesome -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brands-section">
                        <h2 class="font-weight-bold text-start">Brands</h2>
                        <!-- Section du carrousel pour les marques -->
                        <div class="owl-carousel-slideshow-container brands-carousel">
                            <div class="owl-carousel owl-carousel-slideshow" data-items="3" data-loop="true">
                                <!-- Ajoutez vos images de marques ici -->
                                <!-- Première face du carrousel -->
                                <div class="item">
                                    <img src="{{ asset('images/nike.jpg') }}" class="img-fluid" alt="Slide 1">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/adid.jpg') }}" class="img-fluid" alt="Slide 2">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/nike.jpg') }}" class="img-fluid" alt="Slide 3">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/nike.jpg') }}" class="img-fluid" alt="Slide 3">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/nike.jpg') }}" class="img-fluid" alt="Slide 3">
                                </div>
                            </div>
                            <div class="carousel-controls d-flex justify-content-center mt-3">
                                <!-- Utilisez les icônes en cercle de Font Awesome pour la navigation -->
                                <i class="fa fa-circle carousel-icon-circle text-primary mx-2 fa-lg"></i>
                                <i class="fa fa-circle carousel-icon-circle text-primary mx-2 fa-lg"></i>
                                <i class="fa fa-circle carousel-icon-circle text-primary mx-2 fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <h2>Featured Products : </h2>
            <div class="owl-carousel owl-theme">
                @foreach ($productfeatured as $prodfeat)
                    <div class="item">
                        <div class="card position-relative product_data">
                            <a
                                href="{{ route('product', ['category' => $prodfeat->category->name, 'product' => $prodfeat->name]) }}">
                                <img alt="Image" class="img-fluid b-img" id="edit"
                                    src="{{ asset('images/products/' . $prodfeat->img) }}">
                            </a>

                            <span
                                class="float-end position-absolute end-0 m-2 text-capitalize badge
                                {{ $prodfeat->condition == 'new' ? 'bg-warning' : ($prodfeat->condition == 'hot' ? 'bg-danger' : ($prodfeat->condition == 'default' ? 'bg-secondary' : '')) }}
  trending_tag">{{ $prodfeat->condition }}</span>
                            @auth
                                @if (\App\Models\Wishlist::where('prod_id', $prodfeat->id)->exists())
                                    <button
                                        class="m-2 border-1 rounded-5 position-absolute start-0 bg-white remove-wishlist-item">
                                        <input type="hidden" class="prod_id" value="{{ $prodfeat->id }}">
                                        <i class="fa fa-heart text-danger fs"></i>
                                    </button>
                                @else
                                    <button
                                        class="m-2 border-1 rounded-5 position-absolute start-0 bg-white addtowishlist">
                                        <input type="hidden" class="prod_id" value="{{ $prodfeat->id }}">
                                        <i class="fa fa-heart-o text-danger fs"></i>
                                    </button>
                                @endif
                            @endauth
                            @guest
                                <button class="m-2 border-1 rounded-5 position-absolute start-0 bg-white addtowishlist">
                                    <input type="hidden" class="prod_id" value="{{ $prodfeat->id }}">
                                    <i class="fa fa-heart-o text-danger fs"></i>
                                </button>
                            @endguest
                            <div class="card-header bg-white custom-card-header border-bottom-0">
                                <h5 class="main-content-label tx-dark tx-medium mb-0">
                                    <span
                                        class="float-start">{{ Str::limit($prodfeat->name, 19)  }}</span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="float-start">
                                    <div class="text-success d-block border-1">
                                        {{ $bestp->prix_vent - ($bestp->prix_vent * $bestp->discount) / 100 }}Dh
                                        @if ($bestp->discount != 0)
                                            &nbsp;<span class="badge bg-success">-{{ $bestp->discount }}%</span>
                                        @endif
                                    </div>
                                    {{-- <div class="fs-6 d-block"> <s>{{ $product->prix_vent }}Dh</s>
                                    </div> --}}
                                </div>
                                <div class="float-end">
                                    <input type="hidden" class="prod_id" value="{{ $bestp->id }}">
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

@endsection
@section('script')
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".owl-carousel-slideshow").owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        var owl = $('.owl-carousel-slideshow');
        owl.owlCarousel();

        function goToSlide(slideIndex) {
            owl.trigger('to.owl.carousel', slideIndex);
        }

        function nextSlide() {
            owl.trigger('next.owl.carousel');
        }

        function goToSlide(slideIndex) {
            // Obtenez l'index du slide actuel
            var currentIndex = $('.owl-carousel-slideshow .owl-item.active').index();

            // Déterminez la direction du glissement en fonction de la différence entre les index
            var direction = slideIndex > currentIndex ? 'next' : 'prev';

            // Supprimez la classe active de tous les cercles
            $('.carousel-icon-circle').removeClass('active');

            // Ajoutez la classe active uniquement au cercle correspondant au slide actif
            $('.carousel-icon-circle').eq(slideIndex).addClass('active');

            // Déplacez le carrousel vers le slide sélectionné avec la direction appropriée
            owl.trigger(direction + '.owl.carousel');
        }




        $('.carousel-icon-circle').on('click', function() {
            var slideIndex = $(this).index();
            goToSlide(slideIndex);
        });
        // Lorsque l'icône est cliquée
        $('.carousel-icon-circle').on('click', function() {
            // Récupérer l'index de l'icône cliquée
            var slideIndex = $(this).index();

            // Déplacer vers le slide correspondant
            goToSlide(slideIndex);

            // Supprimer toutes les classes 'text-secondary'
            $('.carousel-icon-circle').removeClass('text-primary text-secondary');

            // Ajouter la classe 'text-primary' à toutes les icônes
            $('.carousel-icon-circle').addClass('text-primary');

            // Ajouter la classe 'text-secondary' uniquement à l'icône cliquée
            $(this).addClass('text-secondary');
        });
    });
</script>


<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel();
    });
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        autoplay: false,
        autoplayTimeout: 1000,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>

@endsection
