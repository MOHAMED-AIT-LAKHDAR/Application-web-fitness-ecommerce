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
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Registred Users&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Show more information informations&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>User details <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ asset('assets/avatars/14.png') }}" alt="user image"
                                class="d-block h-auto mt-3 ms-0 rounded  user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4> {{ $user->name }} {{ $user->lname }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                        <li class="list-inline-item"><i class="ti ti-map-pin"></i>{{ $user->city }}</li>
                                        <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined
                                            {{ $user->created_at }}</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">full Name of the client</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">{{ $user->name }} {{ $user->lname }}</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">Phone</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">{{ $user->phone }}</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">city</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">{{ $user->city }}</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">Postal code</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">{{ $user->postalcd }}</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">location</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-capitalize fw-bold">{{ $user->fadresse }}</h6>
                        </div>

                        <div class="col-lg-12">
                            <h6 class="text-capitalize fw-bold">Status : <span
                                    class="text-white {{ $user->role_as == 0 ? 'badge bg-success' : 'badge bg-danger' }}">{{ $user->role_as == 0 ? 'Client' : 'Admin' }}</span>
                            </h6>
                        </div>
                    </div>
                    {{--
                        <div class="mt-2">
                            for actions
                        </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
@endsection
