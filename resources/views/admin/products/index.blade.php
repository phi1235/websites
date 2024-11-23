@extends('layouts.admin')
<link href="{{ asset('css/searchproduct.css') }}" rel="stylesheet">
@section('styles')
<style>
.pagination {
    display: flex;
    justify-content: center;
    gap: 3px;
}

.page-link {
    padding: 5px 10px !important;
    font-size: 12px !important;
}
</style>
@endsection



@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products Management</h1>
        <div class="d-flex align-items-center gap-2">
            <!-- Search Box -->
            <div class="search-container">
                <form action="{{ route('admin.products.index') }}" method="GET" class="search-box">
                    <input type="text" name="search" class="form-control" placeholder="Search products..."
                        value="{{ $search ?? '' }}" autocomplete="off">
                    <button type="button" class="clear-btn" title="Clear search">
                        <i class="fas fa-times"></i>
                    </button>
                    <button type="submit" class="search-btn" title="Search">
                        <i class="fas fa-search"></i>
                    </button>
                     <!-- Thêm dropdown suggestions -->
        <div class="search-suggestions" style="display: none;"></div>
                </form>

                {{-- Thêm debug --}}
                @if(isset($searchMessage))
                <div class="search-result-count" style="color: #666; font-size: 12px; margin-top: 5px;">
                    {{ $searchMessage }}
                </div>
                @else
                <div>No search message</div>
                @endif
            </div>

            <!-- Add New Button -->
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>
    </div>

    <!-- Xóa phần card search box cũ -->
    <!-- Products Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Colors</th>
                            <th>Sizes</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}"
                                    style="width: 100px; height: auto;"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->colors }}</td>
                            <td>{{ $product->sizes }}</td>
                            <td>{{ number_format($product->price, 0) }}VND</td>
                            <td>{{ $product->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

<script src="{{ asset('js/searchproduct.js') }}"></script>
@endsection