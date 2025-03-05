@section('titre', 'First')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-2">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Products&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Afficher plus informations&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Show information <a href="{{ route('product.index') }}"
                            class="btn btn-primary btn-sm float-end">Back</a></h3>
                </div>
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-lg-12 col-md-12">
                            <div class="card custom-card productdesc">
                                <div class="card-body h-100">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-12 col-md-12">
                                            <div class="row">

                                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                    <div class="product-carousel">
                                                        <div id="carousel" class="carousel slide" data-bs-ride="false">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img id="logoClient"
                                                                        src="{{ asset('images/products/' . $product->img) }}"
                                                                        alt="img" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-md-12">

                                            <div class="mt-4 mb-4">
                                                <h4 class="mt-1 mb-3 text-capitalize">
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
                                                </h4>

                                                <h6 class="text-success text-uppercase">
                                                    {{ $product->discount == 1 ? 0 : $product->discount }} % Off</h6>
                                                <h5 class="mb-2">Prix d'achat : <b><span
                                                            class="text-success me-2">{{ $product->prix_achat }}
                                                            DH</span></b></h5>
                                                <h5 class="mb-2">Price de vente : <b> <span
                                                            class="text-success me-2">{{ $product->prix_vent }}
                                                            DH</span></b></h5>
                                                <h5 class="mb-2">Price de vente avec discount : <b> <span
                                                            class="text-success me-2">{{ $product->prix_vent - $product->prix_vent * ($product->discount / 100) }}
                                                            DH</span></b></h5>
                                                <h6 class="mt-2 fs-16">Description :</h6>
                                                <p>{{ $product->description }}</p>
                                                <h6 class="mt-2 fs-16">Type Of Category : <p
                                                        class="badge bg-primary text-wrap">{{ $product->category->name }}
                                                    </p>
                                                </h6>
                                                <span class="fs-16 h6">Status : <p
                                                        class="badge {{ $product->status == 'inactive' ? 'bg-danger' : 'bg-success' }} text-wrap">
                                                        {{ $product->status }}</p>
                                                </span>
                                                <span class="fs-16 h6">Best : <p
                                                        class="badge {{ $product->best == 'inactive' ? 'bg-danger' : 'bg-success' }} text-wrap">
                                                        {{ $product->best }}</p>
                                                </span>
                                                <span class="fs-16 h6">Featured : <p
                                                        class="badge {{ $product->featured == 'inactive' ? 'bg-danger' : 'bg-success' }} text-wrap">
                                                        {{ $product->featured }}</p>
                                                </span>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <a href="{{ route('product.update', $product->id) }}" class="btn ripple btn-primary">Edit</a>
                        <a href="{{ route('product.delete', $product->id) }}" class="btn ripple btn-danger"
                            onclick="if(confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $product->id }}').submit();">Delete</a>
                        <form id="delete-form-{{ $product->id }}" action="{{ route('product.delete', $product->id) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
