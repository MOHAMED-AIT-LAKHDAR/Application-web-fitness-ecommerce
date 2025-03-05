<ul id="searchProductsList">
    @foreach($products as $product)
    <li><a href="{{ route('product.view', ['cat' => $product->category->name, 'prod' => $product->name]) }}">{{ $product->name }}</a></li>
    @endforeach
</ul>
