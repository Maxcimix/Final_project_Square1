<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $firstsCategories = Category::where('name', '!=', 'Discounts')
            ->where('is_active', true)
            ->take(4)
            ->get();

        $discountCategory = Category::where('name', 'Discounts')
            ->where('is_active', true)
            ->first();

        // Si no hay categorías, crear una colección vacía
        $categories = collect();

        if ($firstsCategories->isNotEmpty()) {
            $categories = $firstsCategories;
            
            if ($discountCategory) {
                $categories = $categories->push($discountCategory);
            }
        }

        return view('pages.home', [
            'categories' => $categories
        ]);
    }
}