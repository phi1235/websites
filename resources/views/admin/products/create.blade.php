@extends('layouts.admin')
@section('styles')
{{-- Sử dụng asset() helper để tạo đường dẫn chính xác --}}
<link href="{{ asset('css/dropdown.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="image">Main Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <!-- Dropdown cho màu sắc -->
        <div class="form-group">
            <label for="colors">Available Colors</label>
            <div class="dropdown-container">
                <input type="text" class="form-control" id="colorInput" readonly placeholder="Select colors"
                    onclick="toggleDropdown('colorDropdown')">
                <input type="hidden" name="colors" id="selectedColors">
                <div class="dropdown-menu" id="colorDropdown">
                    <div class="dropdown-item">
                        <input type="checkbox" value="Red" onclick="updateColors(this)"> Red
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Blue" onclick="updateColors(this)"> Blue
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Green" onclick="updateColors(this)"> Green
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Yellow" onclick="updateColors(this)"> Yellow
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Black" onclick="updateColors(this)"> Black
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="White" onclick="updateColors(this)"> White
                    </div>
                </div>
            </div>
        </div>

        <!-- Dropdown cho kích thước -->
        <div class="form-group">
            <label for="sizes">Available Sizes</label>
            <div class="dropdown-container">
                <input type="text" class="form-control" id="sizeInput" readonly placeholder="Select sizes"
                    onclick="toggleDropdown('sizeDropdown')">
                <input type="hidden" name="sizes" id="selectedSizes">
                <div class="dropdown-menu" id="sizeDropdown">
                    <div class="dropdown-item">
                        <input type="checkbox" value="M" onclick="updateSizes(this)"> M
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="L" onclick="updateSizes(this)"> L
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="XL" onclick="updateSizes(this)"> XL
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="2XL" onclick="updateSizes(this)"> 2XL
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="3XL" onclick="updateSizes(this)"> 3XL
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <!-- Thêm vào phần cuối form, cạnh nút Create -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@endsection
@section('scripts')
{{-- Sử dụng asset() helper để tạo đường dẫn chính xác --}}
<script src="{{ asset('js/dropdown.js') }}"></script>
@endsection