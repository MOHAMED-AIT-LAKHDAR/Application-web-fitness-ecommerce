@section('titre', 'Panier')
@extends('client.master')

@section('content')
    <div Class="py-3 mb-4 shadow-sa bg-warning border-top">
        <div class=" container">
            <h6 class="mb-0"><a href="{{ route('home') }}" class="text-dark text-decoration-none"> Home</a> /
                <a href="{{ route('viewpanier') }}" class="text-dark text-decoration-none"> Cart </a>
            </h6>

        </div>
    </div>
    <div class="container">
        <div class="card border-0 mt-4  product_data">
            @if ($paniers->count() > 0)
                <div class="card-header bg-body" style="width: 66%;">
                    <h3>shopping</h3>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3>Shopping Cart</h3>
                            <p>You have {{ $paniers->count() }} items in your cart</p>
                            @php
                                $total = 0;
                                $disc = 0;
                            @endphp
                            @foreach ($paniers as $item)
                                <div class="row shadow mt-3 product_data">
                                    <div class="col-md-2 my-auto">
                                        <img src="{{ asset('images/products/' . $item->product->img) }}" height="70%"
                                            width="70%" alt="image">
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <h6>{{ $item->product->name }}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <h6 class="fw-bold text-success">
                                            {{ $item->product->prix_vent - ($item->product->prix_vent * $item->product->discount) / 100 }}
                                            Mad</h6>
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <div class="input-group text-center mb-3" style="width: 130px;">
                                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                            <button class="input-group-text changequantity decrement">-</button>
                                            <input type="text" name="quantity" value="{{ $item->prod_qty }}"
                                                class="form-control text-center qte" />
                                            <button class="input-group-text changequantity increment">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <a class="btn btn-danger delete-item"
                                            href="{{ route('deleteprod', $item->prod_id) }}" onclick="confirmation(event)">
                                            <i class="fa fa-trash"></i> Remove</a>

                                    </div>
                                </div>

                                @php
                                    $total += $item->product->prix_vent * $item->prod_qty;
                                    $disc += ($item->product->prix_vent * $item->product->discount) / 100;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 rounded-3" style="background-color: #565ABB;">
                            <div class="card-header">
                                <h4 class="text-white m-2">Card details</h4>
                            </div>
                            <div class="card-body text-white m-3">
                                <h4>Card type</h4>
                                <div class="row">
                                    <div class="col-ms-12">
                                        <span class="float-start">items total </span><span
                                            class="float-end">{{ $total }}MAD</span>
                                    </div>
                                    <div class="col-ms-12">
                                        <span class="float-start">Shop discount </span><span
                                            class="float-end">{{ $disc }} MAD</span>

                                    </div>
                                    <hr class="mt-3">
                                    <div class="col-ms-12">
                                        <span class="float-start">Subtotal </span><span
                                            class="float-end">{{ $total - $disc }}
                                            MAD</span>
                                    </div>
                                    <div class="col-ms-12">
                                        <span class="float-start">Shipping </span><span class="float-end">Free
                                            shipping</span>
                                    </div>
                                    <hr class="mt-3">
                                    <div class="col-ms-12">
                                        <span class="float-start">Total </span><span class="float-end">{{ $total - $disc }}
                                            MAD</span>
                                    </div>
                                    <hr class="mt-3">
                                </div>
                                <div class="card-footer my-auto">
                                    <a href="{{ route('checkout') }}" class="btn w-100 text-white"
                                        style="background-color: #4DE1C1">{{ $total - $disc }} Mad Checkout</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            @else
                <div class="card-body text-center">
                    <h2>Your <i class="fa fa-shopping-cart"></i> cart is empty</h2>
                    <a href="{{ route('category') }}" class="btn btn-dark ">Continue shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection
