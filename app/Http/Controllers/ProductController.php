<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::query();
    
         // Xử lý AJAX request cho auto-suggest
    if ($request->ajax()) {
        $suggestions = Product::where('name', 'like', "%{$search}%") // Thay đổi từ {$search}% thành %{$search}%
            ->select('name')
            ->limit(5)
            ->pluck('name');
        
        // Sắp xếp kết quả theo độ phù hợp
        $sortedSuggestions = $suggestions->sort(function($a, $b) use ($search) {
            // Ưu tiên từ bắt đầu bằng từ khóa tìm kiếm
            $aStartsWith = stripos($a, $search) === 0;
            $bStartsWith = stripos($b, $search) === 0;
            
            if ($aStartsWith && !$bStartsWith) return -1;
            if (!$aStartsWith && $bStartsWith) return 1;
            
            // Nếu cùng vị trí, sắp xếp theo độ dài
            return strlen($a) - strlen($b);
        })->values();
        return response()->json($sortedSuggestions);
    }
        // Xử lý tìm kiếm thông thường
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
                 
            });
        }
    
        $products = $query->latest()->paginate(10);
        $searchMessage = $search 
            ? 'Found ' . $products->total() . ' products for "' . $search . '"'
            : 'Total ' . $products->total() . ' products';
    
        return view('admin.products.index', compact('products', 'search', 'searchMessage'));
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
{
    // Validate dữ liệu
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'colors' => 'required|string',  // Validate colors
        'sizes' => 'required|string',   // Validate sizes
        'quantity' => 'required|integer|min:0',
    ]);

    try {
        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/products', $imageName);
            $imagePath = 'products/' . $imageName;
        }

        // Tạo sản phẩm mới
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath ?? null,
            'colors' => $request->colors,  // Lưu colors
            'sizes' => $request->sizes,    // Lưu sizes
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');

    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Error creating product: ' . $e->getMessage())
            ->withInput();
    }
}

   

public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required',
       
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'colors' => 'required',
        'sizes' => 'required',
        'quantity' => 'required|integer',
    ]);

    // Xử lý upload ảnh nếu có
    $data = [
        'name' => $request->name,
       
        'price' => $request->price,
        'colors' => $request->colors,
        'sizes' => $request->sizes,
        'quantity' => $request->quantity,
    ];

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/products', 'public');
        $data['image'] = $imagePath;
    }

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
}    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
    