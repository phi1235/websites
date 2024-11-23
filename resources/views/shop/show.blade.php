@extends('layouts.app')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Shop</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6 mb-4">
            <img src="{{ asset('storage/' . $product->image) }}" 
                 class="img-fluid rounded" 
                 alt="{{ $product->name }}">
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="price h2 mb-4">{{ number_format($product->price, 0) }} VND</p>
            
            <div class="mb-4">
                <h5>Colors:</h5>
                <p>{{ $product->colors }}</p>
                
                <h5>Sizes:</h5>
                <p>{{ $product->sizes }}</p>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg add-to-cart" 
                        data-product-id="{{ $product->id }}">
                    <i class="fas fa-shopping-cart me-2"></i>
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>
@endsection