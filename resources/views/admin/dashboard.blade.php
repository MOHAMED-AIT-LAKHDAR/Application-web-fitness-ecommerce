@section('titre', 'Dashboard')
@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        @if (session()->has('success'))
                            @include('success')
                        @endif
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Card stats -->
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"> <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                    revenue</span> <span class="h3 font-bold mb-0">${{ $total }}</span> </div>
                            <div class="col-auto">
                                <i class="fa fa-money text-success fa-3x"></i>

                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-success text-success me-2"> <i
                                    class="bi bi-arrow-up me-1"></i>13% </span> <span
                                class="text-nowrap text-xs text-muted">Since last month</span> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"> <span
                                    class="h6 font-semibold text-muted text-sm d-block mb-2">Orders</span> <span
                                    class="h3 font-bold mb-0">{{ $orders->count() }}</span> </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle"> <i
                                        class="bi bi-people"></i> </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-success text-success me-2"> <i
                                    class="bi bi-arrow-up me-1"></i>30% </span> <span
                                class="text-nowrap text-xs text-muted">Since last month</span> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col"> <span class="h6 font-semibold text-muted text-sm d-block mb-2">Sales</span>
                                <span class="h3 font-bold mb-0">{{ $sales->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white text-lg rounded-circle"> <i
                                        class="bi bi-clock-history"></i> </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                <i class="bi bi-arrow-down me-1"></i>-5% </span> <span
                                class="text-nowrap text-xs text-muted">Since last month</span> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Clients</span>
                                <span class="h3 font-bold mb-0">{{ $clients->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-3x"></i>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm"> <span class="badge badge-pill bg-soft-success text-success me-2"> <i
                                    class="bi bi-arrow-up me-1"></i>10% </span> <span
                                class="text-nowrap text-xs text-muted">Since last month</span> </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row row-sm mt-4">
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-header border-bottom-0">
                    <div>
                        <label class="main-content-label mb-2">Orders</label>
                        <span class="d-block tx-12 mb-0 text-muted">The Orders are the ones that make the most money and
                            show what customers like.</span>
                    </div>
                </div>
                <div class="card-body ps-0">
                    <div class>
                        <div class="container">
                            <canvas id="myChart" class="chart-dropshadow2 ht-250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm mt-4">
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div class="card custom-card mg-b-20">
                <div class="card-body">
                    <div class="card-header border-bottom-0 pt-0 ps-0 pe-0 d-flex bg-white">
                        <div class="">

                            <label class="main-content-label mb-2 fw-bold ">List of Clients who have the orders of
                                month "@php echo  \Carbon\Carbon::now()->format('F') @endphp"
                            </label>
                        </div>
                    </div>
                    <div class="table-responsive tasks">
                        <div style="max-height: 300px; overflow-y: auto;">
                            <table class="table card-table table-vcenter  text-nowrap mb-0 ">
                                <thead class="sticky-top bg-white">
                                    <th>tracking number Order</th>
                                    <th>Date Order</th>
                                    <th>Clients</th>
                                    <th>Date delivred the order</th>
                                    <th>Status</th>
                                    <th>Price total</th>
                                </thead>
                                <tbody>
                                    @php $i=0 @endphp
                                    @foreach ($orders as $order)
                                        @if ($order->status == '0')
                                            @if ($i > 8)
                                            @break
                                        @endif
                                        <tr>
                                            <td class="font-weight-semibold fw-bold"><span
                                                    class="mt-1">{{ $order->tracking_no }}</span>
                                            </td>
                                            <td class="font-weight-semibold fw-bold">
                                                <span class="mt-1">{{ $order->created_at->format('Y-m-d') }}</span>
                                            </td>
                                            <td class="font-weight-semibold fw-bold">
                                                <span class="mt-1">{{ $order->client->name }}</span>
                                            </td>
                                            <td class="font-weight-semibold fw-bold">
                                                <span class="mt-1">{{ $order->datedelivery }}</span>
                                            </td>
                                            <td class="font-weight-semibold fw-bold">
                                                <span class="badge bg-pill bg-warning">Pending</span>
                                            </td>
                                            <td class="">
                                                <span class="badge bg-pill text-success fa-1x fw-bold">
                                                    {{ $order->total_price }} DH</span>
                                            </td>


                                        </tr>
                                    @endif
                                    @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        // var salesmonth = @json($chart);
        var salespaid = @json($chart2);
        var salesunpaid = @json($unpaid);
        var ctx = document.getElementById("myChart");
        // console.log(refsale);
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'nov', 'dec'],
                datasets: [

                    {
                        label: 'Order Paid',
                        data: salespaid,
                        backgroundColor: "transparent",
                        borderColor: 'grey',
                        pointBackgroundColor: "#ffffff",
                        pointRadius: 0,
                        borderWidth: 1,
                    },
                    {
                        label: 'Order Pending',
                        data: salesunpaid,
                        backgroundColor: "transparent",
                        borderColor: 'blue',
                        pointBackgroundColor: "#ffffff",
                        pointRadius: 0,
                        borderWidth: 1,
                    }
                ],

            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    mode: "nearest",
                    intersect: false,
                },

            }
        });
    </script>


@endsection
