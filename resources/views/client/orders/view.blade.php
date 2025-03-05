@section('titre', 'Orders')
@extends('client.master')

@section('content')

    <div Class="py-3 mb-4 shadow-sa bg-warning border-top">
        <div class=" container">
            <h6 class="mb-0"><a href="{{ route('home') }}" class="text-dark text-decoration-none"> Home</a> /
                <a href="" class="text-dark text-decoration-none">My Orders </a>
                <a href="" class="text-dark text-decoration-none">Orders view</a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card border-0 mt-4  product_data">
            <div class="card-header bg-body">

                <h3 class="text-center"><a class="text-dark text-decoration-none h6 float-start"
                        href="{{ route('myorders') }}">
                        < back</a>Items for the client <span class="text-capitalize fw-bold">{{ Auth::user()->name }}</span>
                </h3>
            </div>
            <div class="card-body">
                <h3> Items Cart</h3>
                <p>You have {{ App\Models\OrderItem::count() }} items in your Order</p>
                <div class="row">
                    <div class="col-lg-6">
                        @foreach ($order->first()->orderitems as $item)
                            <!-- Rest of your code -->
                            <div class="row shadow mt-3 product_data p-3">
                                <div class="col-md-2 my-auto">
                                    <img width="90%" height="90%"
                                        src="{{ optional($item->products)->img ? asset('images/products/' . $item->products->img) : '' }}"
                                        alt="products">
                                </div>
                                <div class="col-md-4 my-auto">
                                    <h6>{{ $item->products->name }}</h6>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <h6 class=" fw-bold">Quantite {{ $item->qty }}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6 class="text-capitalize text-success fw-bold">
                                        {{ $item->price }} Mad</h6>

                                </div>


                            </div>
                        @endforeach



                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0">
                            <div class="card-header bg-white">
                                <h4 class="text-secondary">Informations about the order <span
                                        class="text-dark">{{ $order->tracking_no }}</span>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">full Name</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">{{ $order->lname }} {{ $order->fname }}</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">Phone</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">{{ $order->phone }}</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">city</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">{{ $order->city }}</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">Postal code</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">{{ $order->postalcd }}</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">location</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-capitalize fw-bold">{{ $order->fadresse }}</h6>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="text-capitalize fw-bold">Total price : <span
                                                class="text-success">{{ $order->total_price }} Mad</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
