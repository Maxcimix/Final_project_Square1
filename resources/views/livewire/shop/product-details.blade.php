<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
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
    
    <div class="mt-12">
        @livewire('shop.product-reviews', ['product' => $product])
    </div>
</div>