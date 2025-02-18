<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        $this->dispatch('addToCart', $this->product->id);
    }

    public function render()
    {
        return view('livewire.shop.product-card');
    }
}