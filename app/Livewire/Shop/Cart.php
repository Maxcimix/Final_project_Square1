<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $cartItems = [];

    protected $listeners = ['addToCart', 'removeFromCart', 'updateCartItemQuantity'];

    public function mount()
    {
        $this->cartItems = session()->get('cart', []);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);
        $cartItems = session()->get('cart', []);

        if (isset($cartItems[$productId])) {
            $cartItems[$productId]['quantity']++;
        } else {
            $cartItems[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cartItems);
        $this->cartItems = $cartItems;
        $this->dispatch('cartUpdated');
    }

    public function removeFromCart($productId)
    {
        $cartItems = session()->get('cart', []);
        unset($cartItems[$productId]);
        session()->put('cart', $cartItems);
        $this->cartItems = $cartItems;
        $this->dispatch('cartUpdated');
    }

    public function updateCartItemQuantity($productId, $quantity)
    {
        $cartItems = session()->get('cart', []);
        if ($quantity > 0) {
            $cartItems[$productId]['quantity'] = $quantity;
        } else {
            unset($cartItems[$productId]);
        }
        session()->put('cart', $cartItems);
        $this->cartItems = $cartItems;
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.shop.cart');
    }
}