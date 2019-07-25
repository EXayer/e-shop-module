@extends('layouts.main')
@section('title', 'E-Shop Module')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center full-height">
            <div class="text-center">
                <h1>Welcome to E-Shop</h1>
                <a href="{{ route('product.type') }}" class="btn btn-lg btn-secondary" role="button" aria-pressed="true">Buy tablet</a>
            </div>
        </div>
    </div>
@endsection