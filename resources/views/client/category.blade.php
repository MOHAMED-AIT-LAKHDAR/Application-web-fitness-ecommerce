@section('titre', 'Home')
@extends('client.master')
@section('style')
    <style>
        .list-group-item {
            border: none;
        }
    </style>

@endsection
@section('content')
    <div Class="py-3 mb-4 shadow-sa bg-warning border-top">
        <div class=" container">
            <h6 class="mb-0">Collections / </h6>
        </div>
    </div>
    <div class="container mt-4">
        <h4> <i class="fa fa-solid fa-list"></i> Liste of all Categorys we have : </h4>
        <div class="row">
            @foreach ($categorys as $cat)
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item d-flex align-items-center justify-content-center">
                            <a href="{{ route('catergoryproduct', $cat->name) }}" class="btn btn-light w-100">
                                <img src="{{ asset('images/category/' . $cat->image) }}" class="float-start" width="100"
                                    height="100" alt="">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="float-start   text-capitalize">&nbsp;{{ $cat->name }}</div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="float-start d-block">description : {{ $cat->description }}</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

@endsection
