<nav>
    <ul class="list-unstyled">
        @foreach($product_types as $product_type)
            <li>
                <a href="#">{{ $product_type->title }}</a>
            </li>
        @endforeach
    </ul>
</nav>