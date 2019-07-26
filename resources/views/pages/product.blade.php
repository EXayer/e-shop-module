@extends('layouts.main')
@section('title', "{$productType->title} | E-Shop")

@section('content')
    <h1 class="text-center my-5 text-info">{{ $productType->title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xl-4">
                @include('parts.side-menu')
            </div>
            <div class="col-sm-10 col-xl-8">
                <div id="product-data">
                    @include('pages._product-modification',[
                                'productType' => $productType,
                                'modification' => $init_modification,
                                'various_attributes' => $various_attributes,
                                'static_attributes' => $static_attributes
                            ])
                </div>
            </div>
        </div>
    </div>
@endsection