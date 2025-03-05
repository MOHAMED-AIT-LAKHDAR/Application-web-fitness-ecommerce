@section('titre', 'Detail Order')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('success')
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Order&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Show Items&nbsp;</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @foreach ($orders->first()->orderitems as $item)
                        <!-- Rest of your code -->
                        <div class="row shadow mt-3 product_data p-3">
                            <div class="col-md-2 my-auto">
                                <img width="90%" height="90%"
                                    src="{{ optional($item->products)->img ? asset('images/products/' . $item->products->img) : '' }}"
                                    alt="products">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->products->name }}</h6>
                            </div>
                            <div class="col-md-4 my-auto">
                                <h6 class=" fw-bold">Quantity : {{ $item->qty }}</h6>
                            </div>
                            <div class="col-md-4 my-auto">
                                <h6 class="text-capitalize text-success fw-bold">
                                    Price : {{ $item->price }} Mad</h6>
                            </div>


                        </div>
                    @endforeach



                </div>
                <div class="col-lg-6">
                    <div class="card border-0">
                        <div class="card-header bg-white">
                            <h4 class="text-secondary">Informations about the orders <span
                                    class="text-dark">{{ $orders->tracking_no }}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">full Name of the client</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">{{ $orders->lname }} {{ $orders->fname }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">Phone</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">{{ $orders->phone }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">city</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">{{ $orders->city }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">Postal code</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">{{ $orders->postalcd }}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">location</h6>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold">{{ $orders->fadresse }}</h6>
                                </div>

                                <div class="col-lg-12">
                                    <h6 class="text-capitalize fw-bold">Total price : <span
                                            class="text-success">{{ $orders->total_price }} Mad</span></h6>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h6 class="text-capitalize fw-bold">Order Status</h6>
                            </div>
                            @if ($orders->status == '0')
                                <div class="col-lg-12">
                                    <form action="{{ route('order.updateorder', $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed
                                            </option>
                                            <option {{ $orders->status == '2' ? 'selected' : '' }} value="1">
                                                Uncompleted
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                                    </form>
                                </div>
                            @elseif($orders->status == '2')
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold badge bg-danger float-end">UnCompleted</h6>
                                </div>
                            @else
                                <div class="col-lg-6">
                                    <h6 class="text-capitalize fw-bold badge bg-success float-end">Completed</h6>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
