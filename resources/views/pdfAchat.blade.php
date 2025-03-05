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
                <h2 class="main-content-label mb-1">Informations about Buys we do : </h2>
                <hr>
                <h3>Reference Buy: {{ $buy->reference }}</h3>
                <p>Fournisseur : <strong>{{ $buy->fournisseur->name }}</strong></p>
                <p>Create At : {{ $buy->created_at }}</p>
                <p>Email of Fournisseur :{{ $buy->fournisseur->email }}</p>
                <p>Phone number of Supplier :{{ $buy->fournisseur->phone_number }}</p>
            </div>
            <div class="table-responsive mg-t-40">
                <table class="table table-bordered">
                    <caption class="text-center ">table of products we buy</caption>
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
                        @foreach ($buyproducts as $buyproduct)
                            <tr>
                                <td>{{ $buyproduct->product->name }}</td>
                                <td>{{ $buyproduct->product->description }}</td>
                                <td>{{ $buyproduct->quantity }}</td>
                                <td>{{ $buyproduct->price_unity }}</td>
                                <td>{{ $buyproduct->price_total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h4 class="tx-bold">Price Total : {{ $buy->prix_total }} DH</h4>
        </div>
    </div>
</div>
<br>
<div class="text-start">Signature Client : </div>
<div class="text-end">Signature Fournisseur : </div>
</body>

</html>
