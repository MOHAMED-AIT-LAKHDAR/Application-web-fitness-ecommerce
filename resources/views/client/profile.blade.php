@section('titre', 'Home')
@extends('client.master')

@section('content')
    @if (Session::has('success'))
        @include('alert.success')
    @endif
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="user-profile-header-banner">
                            <img src="{{ asset('assets/pages/profile-banner.png') }}" alt="Banner image"
                                class="rounded-top w-100">
                        </div>
                        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                <img src="{{ asset('images/users/' . $user->image) }}" alt="user image"
                                    class="d-block h-auto ms-0 ms-sm-4 mt-2 w-50 h-50 rounded  user-profile-img">
                            </div>
                            <div class="flex-grow-1 mt-3 mt-sm-5">
                                <div
                                    class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                    <div class="user-profile-info">
                                        <h4>{{ $user->name . ' ' . $user->lname }}</h4>
                                        <ul
                                            class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                            <li class="list-inline-item"><i class="ti ti-map-pin"></i> {{ $user->city }}
                                                City</li>
                                            <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined
                                                {{ $user->created_at->format('D M Y') }}
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container w-75 mt-5 mb-5 pb-3 shadow flex-grow-1 container-p-y">
            <div class="row mt-5 w-80">
                <div class="col-lg-6">
                    <h3 class="m-3">About</h3>
                    <div><i class="fa fa-user"></i> <span class="fw-bold">Full Name :
                        </span>{{ $user->name . ' ' . $user->lname }}</div>
                    <div><i class="fa fa-flag"></i><span class="fw-bold"> City : </span>{{ $user->city }}</div>
                    <div><i class="fa fa-check"></i><span class="fw-bold"> Code Postal : </span>{{ $user->postalcd }}</div>
                    <div><i class="fa fa-map-marker"></i><span class="fw-bold"> Adresse : </span>{{ $user->fadresse }}</div>
                </div>
                <div class="col-lg-6">
                    <h3 class="m-3">Contact</h3>
                    <div><i class="fa fa-phone"></i><span class="fw-bold"> Phone : </span>{{ $user->phone }}</div>
                    <div><i class="fa fa-envelope"></i><span class="fw-bold"> Email : </span>{{ $user->email }}</div>
                </div>
            </div>

            <a class="btn btn-dark text-white m-2 position-relative  d-flex justify-content-center" href="{{route('editprofile')}}">Modifier
                les information</a>
        </div>
    </div>
@endsection
