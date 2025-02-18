<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class RecommendedProductsSection extends Component
{
    public $categories;
    public $selectedCategory;

    public function mount($categories)
    {
        $this->categories = $categories;
        $this->selectedCategory = $categories->first();
    }

    public function selectCategory($slug)
    {
        $this->selectedCategory = $this->categories->firstWhere('slug', $slug);
    }

    public function render()
    {
        return view('livewire.recommended-products-section', [
            'products' => $this->selectedCategory ? $this->selectedCategory->products->take(8) : collect(),
        ]);
    }
}