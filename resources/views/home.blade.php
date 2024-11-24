@extends('layouts.app')

@section('banner')
<div class="banner-slider">
    <button class="slider-btn prev-btn">
        <i class="fas fa-chevron-left"></i>
    </button>

    <div class="slider-container">
        <div class="slide active">
            <img src="{{ asset('images/banner1.png') }}" alt="Banner 1">
        </div>
        <div class="slide">
            <img src="{{ asset('images/banner2.png') }}" alt="Banner 2">
        </div>
        <div class="slide">
            <img src="{{ asset('images/banner3.png') }}" alt="Banner 3">
        </div>
    </div>

    <button class="slider-btn next-btn">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>
@endsection

@section('content')
<div class="row g-4">
    @foreach($products as $product)
    <div class="col-6 col-md-4 col-lg-3">
        <div class="card product-card">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image"
                alt="{{ $product->name }}">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title product-title">{{ $product->name }}</h5>
                <p class="card-text text-muted mb-2">
                    <small>
                        Colors: {{ $product->colors }}<br>
                        Sizes: {{ $product->sizes }}
                    </small>
                </p>
                <div class="mt-auto">
                    <p class="price mb-2">{{ number_format($product->price, 0) }} VND</p>
                    <button class="btn btn-primary w-100 add-to-cart" data-product-id="{{ $product->id }}">
                        <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection