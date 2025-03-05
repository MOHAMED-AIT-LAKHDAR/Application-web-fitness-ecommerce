@section('titre', 'New Orders')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('alert.success')
    @elseif(Session::has('danger'))
        @include('alert.danger')
    @endif

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-4">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Order&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3> New Orders <a href="{{ route('order.history') }}"
                            class="float-end btn btn-warning text-decoration-none text-dark fw-bold">Order history</a></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table table-striped" id="myDataTable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>#</span></th>
                                    <th class="wd-lg-8p"><span>Order date</span></th>
                                    <th class="wd-lg-8p"><span>tracking number</span></th>
                                    <th class="wd-lg-8p"><span>delivery date</span></th>
                                    <th class="wd-lg-8p"><span>total price</span></th>
                                    <th class="wd-lg-8p"><span>status</span></th>
                                    <th class="wd-lg-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1 @endphp
                                @foreach ($orders as $item)
                                    <tr>
                                        <td class="fw-bold">{{ $id }}</td>
                                        <td class="fw-bold">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td class="fw-bold">{{ $item->tracking_no }}</td>
                                        <td class="fw-bold">{{ $item->datedelivery }}</td>
                                        <td><span class="text-success fw-bold">{{ $item->total_price }} MAD</span></td>
                                        <td>
                                            @if ($item->status == '0')
                                                <span class="badge bg-warning">Pending</span>
                                            @else
                                                <span class="badge bg-success">completed</span>
                                            @endif
                                        </td>
                                        <td class="drop">
                                            <a href="{{ route('order.vieworder', $item->id) }}"
                                                class="btn btn-sm btn-info">show</a>
                                            <!-- Button trigger modal -->
                                            @if ($item->status == '0')
                                                <input type="hidden" name="id_order" id="order_tracking"
                                                    value="{{ $item->tracking_no }}">
                                                <button type="button" class="btn btn-primary senddate"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    delivery date
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @php $id++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Date </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('order.dateorder') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="order_tracking" id="get_id">
                                            <div class="form-group">
                                                <label>choise the date for delivred : </label>


                                                <input type="date" name="date_delivery" class="form-control">
                                                @error('date_order')
                                                    <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-secondary">Send</button>
                                                </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('document').ready(function() {
            $('.senddate').on('click', function() {
                var orderId = $(this).siblings('input[name="id_order"]').val();
                $('#get_id').val(orderId);
            });
        });
    </script>



@endsection
