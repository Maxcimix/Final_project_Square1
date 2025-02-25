<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;

class ProductDetail extends Component
{
    public Product $product;
    public $selectedSize = 'M';
    public $selectedColor;
    public $quantity = 1;
    public $mainImage;
    public $images = [];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->selectedColor = $product->colors[0] ?? null;
        $this->mainImage = $product->image;
        $this->images = array_merge([$product->image], $product->gallery ?? []);
    }

    public function incrementQuantity()
    {
        if ($this->quantity < $this->product->stock) {
            $this->quantity++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function selectSize($size)
    {
        $this->selectedSize = $size;
    }

    public function selectColor($color)
    {
        $this->selectedColor = $color;
    }

    public function addToCart()
    {

        $cart = Cart::firstOrCreate([
            'session_id' => session()->getId()
        ]);

        $cart->items()->create([
            'product_id' => $this->product->id,
            'quantity' => $this->quantity,
            'size' => $this->selectedSize,
            'color' => $this->selectedColor
        ]);

        $this->dispatch('cart-updated');
        session()->flash('message', 'Product added to cart successfully!');
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}