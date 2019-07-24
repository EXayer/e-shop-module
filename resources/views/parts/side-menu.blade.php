<nav class="side-menu">
    <h3>Tablets</h3>
    <ul class="list-unstyled">
        @foreach($product_types as $product_type)
            <li>
                <a href="{{ route('product', $product_type->id) }}">{{ $product_type->title }}</a>
            </li>
        @endforeach
    </ul>
</nav>