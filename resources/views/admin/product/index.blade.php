@section('titre', 'Product')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('alert.success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-4">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Products&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-end">Add products</a>

                    </h3>

                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table table-striped" id="myDataTable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>#</span></th>
                                    <th class="wd-lg-8p"><span>picture</span></th>
                                    <th class="wd-lg-8p"><span>Name of Product</span></th>
                                    <th class="wd-lg-8p"><span>Description</span></th>
                                    <th class="wd-lg-8p"><span>Buy Price</span></th>
                                    <th class="wd-lg-8p"><span>Status</span></th>
                                    <th class="wd-lg-8p"><span>Create</span></th>
                                    <th class="wd-lg-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1 @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="fw-bold">{{ $id }}</td>
                                        <td><img src="{{ asset('images/products/' . $product->img) }}" alt="">
                                        </td>
                                        <td class="fw-bold">{{ $product->name }}</td>
                                        <td class="fw-bold">{{ Str::limit($product->description, 30) }}</td>
                                        <td class="text-success fw-bold">{{ $product->prix_vent }} MAD</td>
                                        <td>

                                            @if ($product->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Unactive</span>
                                            @endif
                                        </td>
                                        <td class="fw-bold">{{ $product->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('product.show', $product->id) }}"
                                                class="btn btn-primary ripple btn-block">More details</a>
                                        </td>
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
    </div>
@endsection
