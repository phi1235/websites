<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        // Lọc theo nhiều danh mục
    if ($request->has('categories')) {
        $categories = $request->categories;
        $query->whereIn('category', $categories);
    }
        
        // Lọc theo giá
        if ($request->has('price')) {
            $priceRange = explode('-', $request->price);
            if (count($priceRange) == 2) {
                $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            } elseif ($priceRange[0] == '500000-up') {
                $query->where('price', '>=', 500000);
            }
        }
        
        // Sắp xếp
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->latest();
                break;
        }
        
        $products = $query->paginate(12)->withQueryString();
        
        return view('category.index', compact('products'));
    }
}