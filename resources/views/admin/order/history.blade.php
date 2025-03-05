@section('titre', 'History Orders')
@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        @include('success')
    @endif

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex mb-4">
                <i class="mdi mdi-home text-muted hover-cursor"></i>
                <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Order&nbsp;</p>
                <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;History Orders&nbsp;</p>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3> History Orders <a href="{{ route('order.index') }}"
                            class="float-end btn btn-warning text-decoration-none text-dark fw-bold">Back</a></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive border userlist-table">
                        <table class="table table-striped" id="myDataTable">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>#</span></th>
                                    <th class="wd-lg-8p"><span>Order date</span></th>
                                    <th class="wd-lg-8p"><span>tracking number</span></th>
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
                                        <td><span class="text-success fw-bold">{{ $item->total_price }} MAD</span></td>

                                        <td>

                                            @if ($item->status == '2')
                                                <span class="badge bg-danger">uncompleted</span>
                                            @elseif($item->status == '1')
                                                <span class="badge bg-success">completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('order.vieworder', $item->id) }}" class="btn btn-sm btn-info">
                                                show
                                            </a>

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


@endsection
