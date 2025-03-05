@section('titre', 'Orders')
@extends('client.master')

@section('content')

    <div Class="py-3 mb-4 shadow-sa bg-warning border-top">
        <div class=" container">
            <h6 class="mb-0"><a href="{{ route('home') }}" class="text-dark text-decoration-none"> Home</a> /
                <a href="{{ route('viewpanier') }}" class="text-dark text-decoration-none">My Orders </a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card border-0 mt-4  product_data">
            @if ($orders->count() > 0)
                <div class="card-header bg-body">
                    <h3 class="text-center">Orders for the client
                        <span class="text-capitalize fw-bold">{{ Auth::user()->name }}</span>
                    </h3>
                </div>
                <div class="card-body">
                    <h3>Orders Cart</h3>
                    <p>You have {{ $orders->count() }} order in your cart</p>
                    @foreach ($orders as $order)
                        <div class="row shadow mt-3 product_data p-3">
                            <div class="col-md-2 my-auto">

                                <h6><span class="text-dark fw-bold">Tracking Number :</span> {{ $order->tracking_no }}</h6>
                            </div>
                            <div class="col-md-1 my-auto">
                                <h6 class="text-success fw-bold">{{ $order->total_price }} Mad</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <span class="text-dark fw-bold">Status :
                                </span>
                                <h6
                                    class="text-capitalize {{ $order->status == 0 ? 'badge bg-warning' : ($order->status == 2 ? 'badge bg-danger' : 'badge bg-success') }} fw-bold">
                                    {{ $order->status == 0 ? 'Pending' : ($order->status == 2 ? 'Uncompleted' : 'Completed') }}
                                </h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <span class="text-dark fw-bold">date delivery :
                                </span>
                                <h6 class="fw-bold">
                                    {{ $order->datedelivery }}
                                </h6>
                            </div>
                            <div class="col-md-1 my-auto">
                                <a class="btn btn-success delete-item" href="{{ route('vieworder', $order->id) }}">
                                    Show</a>
                            </div>
                            @if ($order->status == 0)
                                <div class="col-md-1 my-auto">
                                    <a class="btn btn-info " href="{{ route('pdf.factor', $order->tracking_no) }}">
                                        facteur</a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <a class="btn btn-danger delete-item"
                                        href="{{ route('uncomplete.order', $order->tracking_no) }}"
                                        onclick="confirmation(event)">
                                        <i class="fa fa-trash"></i> </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card-body text-center">
                    <h2>Your <i class="fa fa-shopping-cart"></i> order cart is empty</h2>
                    <a href="{{ route('category') }}" class="btn btn-dark ">Continue shopping</a>
                </div>
            @endif
        </div>
    </div>


@endsection
