@props(['product'])
<style>
    #edit {
        width: 350px;
        height: 180px;
    }
</style>
<div class="col-lg-12 col-xl-4 col-md-12 col-12 col-sm-12">
    <div class="card">
        <img alt="Image" class="img-fluid b-img" id="edit" src="{{ asset('images/products/' . $product->img) }}">
        <div class="card-header custom-card-header border-bottom-0">
            <h5 class="main-content-label tx-dark tx-medium mb-0">#{{ $product->id }} {{ $product->name }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">
                <span class="fw-bold">Description :</span> {{ Str::limit($product->description, 25) }}
            </p>
            <h6 class="text-success">Price : {{ $product->prix_vent }} (DH)</h6>
            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary ripple btn-block">Afficher
                Plus</a>
        </div>
    </div>
</div>
