<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $category = Category::where('name', 'Men\'s Fashion')->first();

        if (!$category) {
            $category = Category::create([
                'name' => 'Men\'s Fashion',
                'slug' => Str::slug('Men\'s Fashion'),
                'is_active' => true
            ]);
        }

        $products = [
            [
                'name' => 'Denim Jacket',
                'brand' => 'FASCO',
                'price' => 39.00,
                'sale_price' => 59.00,
                'image' => 'images/index/catalog/chaqueta.png',
                'colors' => ['#0000FF', '#000000', '#FFC0CB'],
                'sizes' => ['M', 'L', 'XL', 'XXL'],
                'stock' => 100,
                'is_featured' => true,
                'is_active' => true
            ],
            // Añade más productos aquí...
        ];

        foreach ($products as $productData) {
            $product = new Product($productData);
            $product->category()->associate($category);
            $product->slug = Str::slug($product->name);
            $product->save();
        }
    }
}