@extends('layouts.main')
@section('title', "{$productType->title} | E-Shop")

@section('content')
    <h1 class="text-center my-5">{{$productType->title}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('parts.side-menu')
            </div>
            <div class="col-8">

                <div class="row">
                    <div class="col-6 d-flex flex-column text-center mb-3">
                        <div class="p-2 bg-secondary text-light"><strong>Артикул</strong></div>
                        <div class="p-2 border">{{ $init_modification['model_number'] }}</div>
                    </div>
                    <div class="col-6 d-flex flex-column text-center">
                        <div class="p-2 bg-secondary text-light"><strong>Цена, $</strong></div>
                        <div class="p-2 border">{{ $init_modification['price'] }}</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h5 class="mt-4">Выберите модификацию</h5>
                        <form method="POST" action="#">
                            @foreach($various_attributes as $attribute)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $attribute['attribute'] }}"
                                       id="attr-{{ $attribute['value_id'] }}" value="{{ $attribute['value_id'] }}"
                                        @if($init_modification['product_id'] === $attribute['product_id']) checked @endif>
                                <label class="form-check-label" for="attr-{{ $attribute['value_id'] }}">
                                    {{ $attribute['attribute_value'] }}</label>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary ml-5">Select</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h5 class="mt-4">Модификации</h5>
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Характеристика</th>
                                <th class="text-center">Значение</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($static_attributes as $attribute)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center"><strong>{{ $attribute['attribute'] }}</strong></td>
                                <td class="text-center">{{ $attribute['attribute_value'] }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection