<div class="row">
    <div class="col-6 d-flex flex-column text-center mb-3">
        <div class="p-2 bg-secondary text-light"><strong>@lang('product.model_number')</strong></div>
        <div class="p-2 border">{{ $modification['model_number'] }}</div>
    </div>
    <div class="col-6 d-flex flex-column text-center">
        <div class="p-2 bg-secondary text-light"><strong>@lang('product.price')</strong></div>
        <div class="p-2 border">{{ $modification['price'] }}</div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h5 class="mt-4 text-info">@lang('product.select_modification')</h5>
        <form method="POST" action="#" class="various-attributes">
            <input type="hidden" name="product_type" value="{{ $productType->id }}">
            @foreach($various_attributes as $attribute)
                @if (!isset($previous) or $attribute['attribute'] !== $previous['attribute'])
                    <div>
                        <span class="pr-1"><strong>{{ $attribute['attribute'] }}:</strong></span>
                    </div>
                @endif
                <div class="form-check form-check-inline">
                    <input data-product="{{ $attribute['product_id'] }}"
                           class="form-check-input"
                           type="radio"
                           name="{{ $attribute['attribute'] }}"
                           id="attr-{{ $attribute['value_id'] }}"
                           value="{{ $attribute['value_id'] }}"
                           @if($modification['product_id'] === $attribute['product_id']) checked @endif>
                    <label class="form-check-label" for="attr-{{ $attribute['value_id'] }}">
                        {{ $attribute['attribute_value'] }}</label>
                    @php $previous = $attribute; @endphp
                </div>
            @endforeach
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h5 class="mt-4 text-info">@lang('product.modification')</h5>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th class="text-center">@lang('product.parameter')</th>
                <th class="text-center">@lang('product.value')</th>
            </tr>
            </thead>
            <tbody>
            @php $attr_counter = 0; @endphp
            @foreach($static_attributes as $attribute)
                <tr>
                    <td>{{ ++$attr_counter }}</td>
                    <td class="text-center"><strong>{{ $attribute['attribute'] }}</strong></td>
                    <td class="text-center">{{ $attribute['attribute_value'] }}</td>
                </tr>
            @endforeach
            @foreach($type_attributes as $attribute)
                <tr>
                    <td>{{ ++$attr_counter }}</td>
                    <td class="text-center"><strong>{{ $attribute->attribute }}</strong></td>
                    <td class="text-center">{{ $attribute->attribute_value }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>