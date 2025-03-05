@section('titre', 'detail d Achat')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Achat&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Afficher Achat&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Achat <a href="{{ route('buy.index') }}" class="btn btn-primary btn-sm float-end">back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>REFERENCE Buy</th>
                                    <th class="text-center">PRODUCT</th>
                                    <th>NAME PRODUCT</th>
                                    <th>PRICE UNITY</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th>PRICE TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1 @endphp
                                @foreach ($productbuys as $productbuy)
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>{{ $productbuy->reference_buy }}</td>
                                        <td class="text-center">
                                            <div class="demo-avatar-group my-auto">
                                                <div class="main-img-user avatar-sm mx-auto d-block">
                                                    {{-- Check if product exists --}}
                                                    @if ($productbuy->product)
                                                        {{-- Display product image --}}
                                                        <img alt="avatar" class="rounded-circle"
                                                            src="{{ asset('images/products/' . $productbuy->product->img) }}">
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        {{-- Check if product exists before accessing category_id --}}
                                        <td>{{ optional($productbuy->product)->category_id }}</td>
                                        <td class="text-success fw-bold">{{ $productbuy->price_unity }} MAD</td>
                                        <td class="text-center">{{ $productbuy->quantity }}</td>
                                        <td class="text-success fw-bold">{{ $productbuy->price_total }} MAD</td>
                                    </tr>
                                    @php $id++ @endphp
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
