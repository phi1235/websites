@extends('layouts.app')

@section('styles')
<style>
.product-card {
    height: 100%;
    transition: transform 0.2s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.product-image {
    height: 200px;
    object-fit: cover;
}

.product-title {
    height: 48px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.price {
    font-size: 1.25rem;
    font-weight: bold;
    color: #dc3545;
}
</style>
@endsection

@section('content')
<div class="container">
    <!-- Products Grid -->
    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card product-card">
                <img src="{{ asset('storage/' . $product->image) }}" 
                     class="card-img-top product-image" 
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
                        <button class="btn btn-primary w-100 add-to-cart" 
                                data-product-id="{{ $product->id }}">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product-id');
        // Thêm xử lý thêm vào giỏ hàng sau
        alert('Added to cart! Product ID: ' + productId);
    });
});
</script>
@endsection