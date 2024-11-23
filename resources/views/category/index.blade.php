@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-3">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Danh Mục Sản Phẩm</h5>
        </div>
        <div class="card-body">
            <form id="categoryForm">
                <!-- Tất cả sản phẩm -->
                <div class="form-check mb-2">
                    <input class="form-check-input category-checkbox" 
                           type="checkbox" 
                           value="all" 
                           id="allProducts"
                           {{ !request('categories') ? 'checked' : '' }}>
                    <label class="form-check-label" for="allProducts">
                        Tất cả sản phẩm
                    </label>
                </div>

                <hr>

                <!-- Danh mục cụ thể -->
                <div class="form-check mb-2">
                    <input class="form-check-input category-checkbox" 
                           type="checkbox" 
                           name="categories[]" 
                           value="ao-thun" 
                           id="aoThun"
                           {{ in_array('ao-thun', request('categories', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="aoThun">
                        Áo thun
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input category-checkbox" 
                           type="checkbox" 
                           name="categories[]" 
                           value="ao-dai-tay" 
                           id="aoDaiTay"
                           {{ in_array('ao-dai-tay', request('categories', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="aoDaiTay">
                        Áo dài tay
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input category-checkbox" 
                           type="checkbox" 
                           name="categories[]" 
                           value="quan-jean" 
                           id="quanJean"
                           {{ in_array('quan-jean', request('categories', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="quanJean">
                        Quần Jean
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input category-checkbox" 
                           type="checkbox" 
                           name="categories[]" 
                           value="quan-tay" 
                           id="quanTay"
                           {{ in_array('quan-tay', request('categories', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="quanTay">
                        Quần Tây
                    </label>
                </div>
            </form>
        </div>
    </div>

            <!-- Price Filter -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Lọc Theo Giá</h5>
                </div>
                <div class="card-body">
                    <select class="form-select" id="priceFilter">
                        <option value="">Tất cả giá</option>
                        <option value="0-100000" {{ request('price') == '0-100000' ? 'selected' : '' }}>
                            Dưới 100,000đ
                        </option>
                        <option value="100000-300000" {{ request('price') == '100000-300000' ? 'selected' : '' }}>
                            100,000đ - 300,000đ
                        </option>
                        <option value="300000-500000" {{ request('price') == '300000-500000' ? 'selected' : '' }}>
                            300,000đ - 500,000đ
                        </option>
                        <option value="500000-up" {{ request('price') == '500000-up' ? 'selected' : '' }}>
                            Trên 500,000đ
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Display -->
        <div class="col-lg-9">
            <!-- Sort Options -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <span class="me-2">Sắp xếp theo:</span>
                    <select class="form-select form-select-sm d-inline-block w-auto" id="sortFilter">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên A-Z</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên Z-A</option>
                    </select>
                </div>
                <div class="text-muted">
                    Hiển thị {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} 
                    của {{ $products->total() }} sản phẩm
                </div>
            </div>

            <!-- Products Grid -->
            <div class="row g-4">
                @forelse($products as $product)
                <div class="col-md-4">
                    <div class="card product-card h-100">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top product-image" 
                             alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title product-title">{{ $product->name }}</h5>
                            <p class="price mb-3">{{ number_format($product->price, 0) }}đ</p>
                            <button class="btn btn-primary mt-auto add-to-cart" 
                                    data-product-id="{{ $product->id }}">
                                <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Không tìm thấy sản phẩm nào.
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Xử lý lọc giá
    $('#priceFilter').change(function() {
        updateFilters();
    });

    // Xử lý sắp xếp
    $('#sortFilter').change(function() {
        updateFilters();
    });

    function updateFilters() {
        let currentUrl = new URL(window.location.href);
        let price = $('#priceFilter').val();
        let sort = $('#sortFilter').val();
        
        if (price) {
            currentUrl.searchParams.set('price', price);
        } else {
            currentUrl.searchParams.delete('price');
        }
        
        if (sort) {
            currentUrl.searchParams.set('sort', sort);
        } else {
            currentUrl.searchParams.delete('sort');
        }
        
        window.location.href = currentUrl.toString();
    }
});
</script>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    // Xử lý checkbox "Tất cả sản phẩm"
    $('#allProducts').change(function() {
        if ($(this).is(':checked')) {
            // Bỏ chọn tất cả các checkbox khác
            $('.category-checkbox:not(#allProducts)').prop('checked', false);
        }
    });

    // Xử lý các checkbox danh mục
    $('.category-checkbox:not(#allProducts)').change(function() {
        // Nếu có bất kỳ danh mục nào được chọn
        if ($('.category-checkbox:not(#allProducts):checked').length > 0) {
            // Bỏ chọn checkbox "Tất cả sản phẩm"
            $('#allProducts').prop('checked', false);
        } else {
            // Nếu không có danh mục nào được chọn, chọn "Tất cả sản phẩm"
            $('#allProducts').prop('checked', true);
        }
        updateFilters();
    });

    // Xử lý lọc giá
    $('#priceFilter').change(function() {
        updateFilters();
    });

    // Xử lý sắp xếp
    $('#sortFilter').change(function() {
        updateFilters();
    });

    function updateFilters() {
        let currentUrl = new URL(window.location.href);
        
        // Lấy danh sách các danh mục được chọn
        let selectedCategories = [];
        $('.category-checkbox:not(#allProducts):checked').each(function() {
            selectedCategories.push($(this).val());
        });

        // Cập nhật URL parameters
        if (selectedCategories.length > 0) {
            currentUrl.searchParams.delete('categories');
            selectedCategories.forEach(category => {
                currentUrl.searchParams.append('categories[]', category);
            });
        } else {
            currentUrl.searchParams.delete('categories');
        }

        let price = $('#priceFilter').val();
        let sort = $('#sortFilter').val();
        
        if (price) {
            currentUrl.searchParams.set('price', price);
        } else {
            currentUrl.searchParams.delete('price');
        }
        
        if (sort) {
            currentUrl.searchParams.set('sort', sort);
        } else {
            currentUrl.searchParams.delete('sort');
        }
        
        window.location.href = currentUrl.toString();
    }
});
</script>
@endsection