@extends('layouts.master')

@section('title', 'Products')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Product Catalog</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{ asset('images/' . strtolower($product['name']) . '.jpg') }}" 
                                 alt="{{ $product['name'] }} Image" 
                                 width="150">
                        </div>
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product['price'] }}</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
