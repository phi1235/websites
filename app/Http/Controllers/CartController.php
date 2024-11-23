<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Product $product)
    {
        // Xử lý thêm vào giỏ hàng
        return back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Product $product)
    {
        // Xử lý xóa khỏi giỏ hàng
        return back()->with('success', 'Product removed from cart successfully!');
    }
}