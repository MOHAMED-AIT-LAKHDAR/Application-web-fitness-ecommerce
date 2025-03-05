<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card custom-card">
            <div class="card-body">
                <h2 class="main-content-label mb-1">Informations about Buys the Client do : </h2>
                <hr>
                <h3>Tracking number: {{ $order->tracking_no }}</h3>
                <p>Client : <strong>{{ $order->fname . ' ' . $order->lname }}</strong></p>
                <p>Date of the order : {{ $order->created_at }}</p>
                <p>Email of client :{{ $order->email }}</p>
                <p>Phone number of Client :{{ $order->phone }}</p>
            </div>
            <div class="table-responsive mg-t-40">
                <table class="table table-bordered">
                    <caption class="text-center ">table of products MR. {{ $order->fname . ' ' . $order->lname }}
                    </caption>
                    <thead>
                        <tr>
                            <th>Name Product</th>
                            <th>Description</th>
                            <th>quantity</th>
                            <th>price Unity</th>
                            <th>Price Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderproducts as $orderproduct)
                            <tr>
                                <td>{{ $orderproduct->products->name }}</td>
                                <td>{{ $orderproduct->products->description }}</td>
                                <td>{{ $orderproduct->qty }}</td>
                                <td>{{ $orderproduct->price }}</td>
                                <td>{{ $orderproduct->qty * $orderproduct->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h4 class="tx-bold">Price Total : {{ $order->total_price }} DH</h4>
        </div>
    </div>
</div>
<br>
<div class="text-start">Signature du Client : </div>
<div class="text-end">Signature du vendeur : </div>
</body>

</html>
