@section ('titre','First')
@extends('layouts.master')
@section('content')
@if(Session::has('success'))
  @include('success')
@endif
 <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex mb-4">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Fournisseur&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Afficher Plus Information&nbsp;</p>
        </div>
      <div class="card">
            <div class="card-header">
            <h3>Show information <a href="{{route('fournisseur.index')}}" class="btn btn-primary btn-sm float-end">Back</a>
            </h3>
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
                                    <div class="carousel-item active"><img id="logoClient" src="{{asset('images/fournisseur/'.$fournisseur->logo)}}" alt="img" class="img-fluid mx-auto d-block "></div>
                                </div>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="mt-4 mb-4">
                            <h1 class="mt-1 mb-3">#{{$fournisseur->id}} {{$fournisseur->name}}</h1>
                            <h2 class="mt-1 mb-3">Information about supplier :</h2>
                            <div class="form-group ms-5">
                            <h5 class="mb-2">City : <span class="text-info me-2">{{$fournisseur->city}}</span></h5>
                            <h5 class="mb-2">Phone Number : <span class="text-info me-2">{{$fournisseur->phone_number}}</span></h5>
                            <h5 class="mb-2">Email : <span class="text-info me-2">{{$fournisseur->email}}</span></h5>
                            <h6 class="mb-2 fs-16">Address : <span class="text-info me-2">{{$fournisseur->address}}</span></h6>
                            </div>

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="mt-4">
            <a href="{{route('fournisseur.update',$fournisseur->id)}}"  class="btn ripple btn-primary">Edit</a>
            <a href="{{route('fournisseur.delete',$fournisseur->id)}}" class="btn ripple btn-danger" onclick="if (confirmation(event)) document.getElementById('delete-form-{{$fournisseur->id}}').submit();">Delete</a>
            <!-- index.blade.php -->

            <form id="delete-form-{{ $fournisseur->id }}" action="{{ route('fournisseur.delete', $fournisseur->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
