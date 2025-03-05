@section('titre', 'Wishlist')
@extends('client.master')
@section('style')
    <style>
        #edit {
            width: 350px;
            height: 180px;
        }
    </style>
@endsection
@section('content')
    <div Class="py-3 mb-4 shadow-sa bg-warning border-top">
        <div class=" container">
            <h6 class="mb-0"><a href="{{ route('home') }}" class="text-dark text-decoration-none"> Home</a> /
                <a href="{{ route('wishlist') }}" class="text-dark text-decoration-none"> wishlist </a>
            </h6>

        </div>
    </div>
    <div class="container">
        <div class="card border-0 mt-4  shadow">
            <div class="card-body ">
                @if ($wishlist->count() > 0)
                    <div class="row product_data">
                        @foreach ($wishlist as $item)
                            <div class="col-lg-3">
                                <a
                                    href="{{ route('product', ['category' => $item->product->category->name, 'product' => $item->product->name]) }}">
                                    <div class="card">
                                        <img alt="Image" width="40%" height="40%" class="img-fluid b-img"
                                            id="edit" src="{{ asset('images/products/' . $item->product->img) }}">
                                        <span
                                            class="float-start position-absolute end-0 m-2 text-capitalize badge {{ $item->product->condition == 'new'
                                                ? 'bg-warning'
                                                : ($item->product->condition == 'hot'
                                                    ? 'bg-danger'
                                                    : ($item->product->condition == 'default'
                                                        ? 'bg-secondary'
                                                        : '')) }}  trending_tag">{{ $item->product->condition }}</span>
                                        <button
                                            class="float-start m-2 border-1 rounded-5  position-absolute start-0 bg-white remove-wishlist-item">
                                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                            <i class="fa fa-heart text-danger fs-6"></i>
                                        </button>
                                        <div class="card-header bg-white custom-card-header border-bottom-0">
                                            <h5 class="main-content-label tx-dark tx-medium mb-0">
                                                <span class="float-start">{{ Str::limit($item->product->name, 19) }}</span>
                                            </h5>
                                        </div>
                                        <div class="card-body">

                                            <span
                                                class="text-success float-start">{{ $item->product->prix_vent - ($item->product->prix_vent * $item->product->discount) / 100 }}
                                                (DH)
                                            </span>
                                            @if ($item->product->discount != 0)
                                                <span class="text-danger float-end"> <s>{{ $item->product->prix_vent }}
                                                        (DH)</s></span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="card-body text-center">
                        <h4>
                            There's no products in your wishlist <i class="fa fa-heart text-danger"></i>
                        </h4> <a href="{{ route('category') }}" class="btn btn-dark ">Continue shopping</a>
                    </div>

                @endif
            </div>
        </div>
    </div>
@endsection
