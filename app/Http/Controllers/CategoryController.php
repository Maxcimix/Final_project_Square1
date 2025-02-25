<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function women()
    {
        return $this->showCategory('womens-fashion');
    }

    public function men()
    {
        return $this->showCategory('mens-fashion');
    }

    public function kids()
    {
        return $this->showCategory('kids');
    }

    public function accessories()
    {
        return $this->showCategory('accessories');
    }

    protected function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->paginate(12);
            
        return view('categories.show', compact('category', 'products'));
    }
}