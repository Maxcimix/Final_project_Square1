<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public Product $product;
    public $quantity = 1;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }

    public function addToCart()
    {
        $this->dispatch('addToCart', [
            'productId' => $this->product->id,
            'quantity' => $this->quantity
        ]);
    }

    public function render()
    {
        return view('livewire.shop.product-details');
    }
}