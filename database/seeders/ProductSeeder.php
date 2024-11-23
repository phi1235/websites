<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Basic T-Shirt',
                'price' => 199000,
                'image' => 'products/1732326025.png',
                'colors' => 'White,Black,Gray',
                'sizes' => 'M,L,XL',
                'quantity' => 100,
            ],
            [
                'name' => 'Premium Polo Shirt',
                'price' => 299000,
                'image' => 'products/1732326025.png',
                'colors' => 'Blue,Red,Black',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 75,
            ],
            [
                'name' => 'Slim Fit Jeans',
                'price' => 599000,
                'image' => 'products/1732326025.png',
                'colors' => 'Blue,Black',
                'sizes' => 'M,L,XL',
                'quantity' => 50,
            ],
            [
                'name' => 'Casual Hoodie',
                'price' => 449000,
                'image' => 'products/1732326025.png',
                'colors' => 'Gray,Black,Blue',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 60,
            ],
            [
                'name' => 'Sports Jacket',
                'price' => 799000,
                'image' => 'products/1732326025.png',
                'colors' => 'Black,Blue,Red',
                'sizes' => 'M,L,XL',
                'quantity' => 40,
            ],
            [
                'name' => 'Cotton Shorts',
                'price' => 249000,
                'image' => 'products/1732326025.png',
                'colors' => 'Black,Khaki,Navy',
                'sizes' => 'M,L,XL',
                'quantity' => 80,
            ],
            [
                'name' => 'Formal Shirt',
                'price' => 399000,
                'image' => 'products/1732326025.png',
                'colors' => 'White,Blue,Pink',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 45,
            ],
            [
                'name' => 'Cargo Pants',
                'price' => 499000,
                'image' => 'products/1732326025.png',
                'colors' => 'Green,Khaki,Black',
                'sizes' => 'M,L,XL',
                'quantity' => 55,
            ],
            [
                'name' => 'Winter Sweater',
                'price' => 599000,
                'image' => 'products/1732326025.png',
                'colors' => 'Gray,Black,Navy',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 35,
            ],
            [
                'name' => 'Denim Jacket',
                'price' => 699000,
                'image' => 'products/1732326025.png',
                'colors' => 'Blue,Black',
                'sizes' => 'M,L,XL',
                'quantity' => 30,
            ],
            [
                'name' => 'Athletic Shorts',
                'price' => 299000,
                'image' => 'products/1732326025.png',
                'colors' => 'Black,Gray,Blue',
                'sizes' => 'M,L,XL',
                'quantity' => 90,
            ],
            [
                'name' => 'Casual Blazer',
                'price' => 899000,
                'image' => 'products/1732326025.png',
                'colors' => 'Navy,Black,Gray',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 25,
            ],
            [
                'name' => 'V-Neck T-Shirt',
                'price' => 179000,
                'image' => 'products/1732326025.png',
                'colors' => 'White,Black,Gray,Navy',
                'sizes' => 'M,L,XL',
                'quantity' => 120,
            ],
            [
                'name' => 'Slim Fit Chinos',
                'price' => 449000,
                'image' => 'products/1732326025.png',
                'colors' => 'Khaki,Navy,Gray',
                'sizes' => 'M,L,XL',
                'quantity' => 65,
            ],
            [
                'name' => 'Zip-Up Hoodie',
                'price' => 499000,
                'image' => 'products/1732326025.png',
                'colors' => 'Black,Gray,Navy',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 70,
            ],
            [
                'name' => 'Track Pants',
                'price' => 349000,
                'image' => 'products/1732326025.png',
                'colors' => 'Black,Gray,Navy',
                'sizes' => 'M,L,XL',
                'quantity' => 85,
            ],
            [
                'name' => 'Long Sleeve Shirt',
                'price' => 379000,
                'image' => 'products/1732326025.png',
                'colors' => 'White,Blue,Black',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 55,
            ],
            [
                'name' => 'Bomber Jacket',
                'price' => 799000,
                'image' => 'products/1732326025.png',
                'colors' => 'Black,Green,Navy',
                'sizes' => 'M,L,XL',
                'quantity' => 40,
            ],
            [
                'name' => 'Graphic T-Shirt',
                'price' => 249000,
                'image' => 'products/1732326025.png',
                'colors' => 'White,Black,Gray',
                'sizes' => 'M,L,XL',
                'quantity' => 95,
            ],
            [
                'name' => 'Wool Coat',
                'price' => 1299000,
                'image' => 'products/1732326025.png',
                'colors' => 'Black,Gray,Navy',
                'sizes' => 'M,L,XL,2XL',
                'quantity' => 20,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}