<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function women()
    {
        $category = Category::where('slug', 'women')->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->with('category')
            ->paginate(12);

        return view('categories.show', [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function men()
    {
        $category = Category::where('slug', 'men')->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->with('category')
            ->paginate(12);

        return view('categories.show', [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function kids()
    {
        $category = Category::where('slug', 'kids')->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->with('category')
            ->paginate(12);

        return view('categories.show', [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function accessories()
    {
        $category = Category::where('slug', 'accessories')->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->with('category')
            ->paginate(12);

        return view('categories.show', [
            'category' => $category,
            'products' => $products
        ]);
    }
}