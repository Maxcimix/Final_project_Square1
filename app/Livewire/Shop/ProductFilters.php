<?php

namespace App\Livewire\Shop;

use App\Models\Category;
use Livewire\Component;

class ProductFilters extends Component
{
    public $selectedCategories = [];
    public $minPrice = 0;
    public $maxPrice = 1000;

    public function render()
    {
        $categories = Category::where('is_active', true)->get();

        return view('livewire.shop.product-filters', [
            'categories' => $categories
        ]);
    }

    public function updatedSelectedCategories()
    {
        $this->dispatch('filtersUpdated', $this->selectedCategories, $this->minPrice, $this->maxPrice);
    }

    public function updatedMinPrice()
    {
        $this->dispatch('filtersUpdated', $this->selectedCategories, $this->minPrice, $this->maxPrice);
    }

    public function updatedMaxPrice()
    {
        $this->dispatch('filtersUpdated', $this->selectedCategories, $this->minPrice, $this->maxPrice);
    }
}