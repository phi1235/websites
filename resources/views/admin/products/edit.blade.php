@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="image">Main Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100" class="mt-2">
        </div>

        <!-- Dropdown cho màu sắc -->
        <div class="form-group">
            <label for="colors">Available Colors</label>
            <div class="dropdown-container">
                <input type="text" class="form-control" id="colorInput" readonly placeholder="Select colors"
                    onclick="toggleDropdown('colorDropdown')" value="{{ $product->colors }}">
                <input type="hidden" name="colors" id="selectedColors" value="{{ $product->colors }}">
                <div class="dropdown-menu" id="colorDropdown">
                    @php
                    $selectedColors = explode(',', $product->colors);
                    @endphp
                    <div class="dropdown-item">
                        <input type="checkbox" value="Red" onclick="updateColors(this)"
                            {{ in_array('Red', $selectedColors) ? 'checked' : '' }}> Red
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Blue" onclick="updateColors(this)"
                            {{ in_array('Blue', $selectedColors) ? 'checked' : '' }}> Blue
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Green" onclick="updateColors(this)"
                            {{ in_array('Green', $selectedColors) ? 'checked' : '' }}> Green
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Yellow" onclick="updateColors(this)"
                            {{ in_array('Yellow', $selectedColors) ? 'checked' : '' }}> Yellow
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="Black" onclick="updateColors(this)"
                            {{ in_array('Black', $selectedColors) ? 'checked' : '' }}> Black
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="White" onclick="updateColors(this)"
                            {{ in_array('White', $selectedColors) ? 'checked' : '' }}> White
                    </div>
                </div>
            </div>
        </div>

        <!-- Dropdown cho kích thước -->
        <div class="form-group">
            <label for="sizes">Available Sizes</label>
            <div class="dropdown-container">
                <input type="text" class="form-control" id="sizeInput" readonly placeholder="Select sizes"
                    onclick="toggleDropdown('sizeDropdown')" value="{{ $product->sizes }}">
                <input type="hidden" name="sizes" id="selectedSizes" value="{{ $product->sizes }}">
                <div class="dropdown-menu" id="sizeDropdown">
                    @php
                    $selectedSizes = explode(',', $product->sizes);
                    @endphp
                    <div class="dropdown-item">
                        <input type="checkbox" value="M" onclick="updateSizes(this)"
                            {{ in_array('M', $selectedSizes) ? 'checked' : '' }}> M
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="L" onclick="updateSizes(this)"
                            {{ in_array('L', $selectedSizes) ? 'checked' : '' }}> L
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="XL" onclick="updateSizes(this)"
                            {{ in_array('XL', $selectedSizes) ? 'checked' : '' }}> XL
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="2XL" onclick="updateSizes(this)"
                            {{ in_array('2XL', $selectedSizes) ? 'checked' : '' }}> 2XL
                    </div>
                    <div class="dropdown-item">
                        <input type="checkbox" value="3XL" onclick="updateSizes(this)"
                            {{ in_array('3XL', $selectedSizes) ? 'checked' : '' }}> 3XL
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}"
                required>
        </div>

      
        <!-- Thêm vào phần cuối form, cạnh nút Update -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<style>
.dropdown-container {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    width: 100%;
    padding: 8px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    padding: 8px;
    cursor: pointer;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}
</style>

<script>
// Khởi tạo mảng với các giá trị đã có
let selectedColors = '{{ $product->colors }}'.split(',');
let selectedSizes = '{{ $product->sizes }}'.split(',');

function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const allDropdowns = document.getElementsByClassName('dropdown-menu');

    Array.from(allDropdowns).forEach(d => {
        if (d.id !== dropdownId) {
            d.style.display = 'none';
        }
    });

    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

function updateColors(checkbox) {
    if (checkbox.checked) {
        if (!selectedColors.includes(checkbox.value)) {
            selectedColors.push(checkbox.value);
        }
    } else {
        selectedColors = selectedColors.filter(color => color !== checkbox.value);
    }

    document.getElementById('colorInput').value = selectedColors.join(', ');
    document.getElementById('selectedColors').value = selectedColors.join(',');
}

function updateSizes(checkbox) {
    if (checkbox.checked) {
        if (!selectedSizes.includes(checkbox.value)) {
            selectedSizes.push(checkbox.value);
        }
    } else {
        selectedSizes = selectedSizes.filter(size => size !== checkbox.value);
    }

    document.getElementById('sizeInput').value = selectedSizes.join(', ');
    document.getElementById('selectedSizes').value = selectedSizes.join(',');
}

// Đóng dropdown khi click bên ngoài
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown-container')) {
        const dropdowns = document.getElementsByClassName('dropdown-menu');
        Array.from(dropdowns).forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    }
});

// Khởi tạo giá trị ban đầu
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('colorInput').value = selectedColors.join(', ');
    document.getElementById('sizeInput').value = selectedSizes.join(', ');
});
</script>
@endsection