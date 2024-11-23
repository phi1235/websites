@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2 class="mb-3">All Products</h2>
        </div>
        <div class="col-auto">
            <!-- Có thể thêm bộ lọc hoặc sắp xếp ở đây -->
        </div>
    </div>

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
                        <div class="d-flex gap-2">
                            <a href="{{ route('shop.show', $product) }}" 
                               class="btn btn-outline-primary flex-grow-1">
                                View Details
                            </a>
                            <button class="btn btn-primary add-to-cart" 
                                    data-product-id="{{ $product->id }}">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
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

@section('styles')
<style>
.product-card {
    height: 100%;
    transition: transform 0.2s;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.product-image {
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #eee;
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
    margin-bottom: 0;
}

.add-to-cart {
    width: 45px;
    padding: 0.375rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .product-image {
        height: 160px;
    }
    
    .product-title {
        font-size: 0.9rem;
        height: 40px;
    }
    
    .price {
        font-size: 1.1rem;
    }
}
</style>
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