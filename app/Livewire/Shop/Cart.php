<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $cartItems = [];
    public $errorMessage = '';

    protected $listeners = ['addToCart', 'removeFromCart', 'updateCartItemQuantity', 'checkout'];

    public function mount()
    {
        try {
            $this->cartItems = session()->get('cart', []);
        } catch (\Exception $e) {
            $this->errorMessage = 'Error loading cart items';
        }
    }

    public function addToCart($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            $cartItems = session()->get('cart', []);

            if (isset($cartItems[$productId])) {
                $cartItems[$productId]['quantity']++;
            } else {
                $cartItems[$productId] = [
                    'name' => $product->name ?? 'Product',
                    'price' => $product->price ?? 0,
                    'quantity' => 1,
                    'image' => $product->image ?? null
                ];
            }

            session()->put('cart', $cartItems);
            $this->cartItems = $cartItems;
            $this->dispatch('cartUpdated');
        } catch (\Exception $e) {
            $this->errorMessage = 'Error adding product to cart';
        }
    }

    public function removeFromCart($productId)
    {
        try {
            $cartItems = session()->get('cart', []);
            unset($cartItems[$productId]);
            session()->put('cart', $cartItems);
            $this->cartItems = $cartItems;
            $this->dispatch('cartUpdated');
        } catch (\Exception $e) {
            $this->errorMessage = 'Error removing product from cart';
        }
    }

    public function updateCartItemQuantity($productId, $quantity)
    {
        try {
            $cartItems = session()->get('cart', []);
            if ($quantity > 0) {
                $cartItems[$productId]['quantity'] = $quantity;
            } else {
                unset($cartItems[$productId]);
            }
            session()->put('cart', $cartItems);
            $this->cartItems = $cartItems;
            $this->dispatch('cartUpdated');
        } catch (\Exception $e) {
            $this->errorMessage = 'Error updating quantity';
        }
    }

    public function checkout()
    {
        if (auth()->check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.shop.cart', [
            'cartItems' => $this->cartItems,
            'errorMessage' => $this->errorMessage
        ]);
    }
}