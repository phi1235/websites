<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // Category filter
        if ($request->has('category')) {
            $query->where('category_id', $request->get('category'));
        }

        // Sort
        if ($request->has('sort')) {
            switch($request->get('sort')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->latest();
                    break;
            }
        }

        $products = $query->where('status', 'active')->paginate(9);
        $categories = Category::where('status', 'active')->get();

        return view('dashboard', compact('products', 'categories'));
    }
}