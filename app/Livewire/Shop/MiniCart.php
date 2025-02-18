<?php

namespace App\Livewire\Shop;

use Livewire\Component;

class MiniCart extends Component
{
    public $cartItems = [];
    public $cartTotal = 0;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cartItems = session()->get('cart', []);
        $this->cartTotal = $this->calculateTotal();
    }

    private function calculateTotal()
    {
        return array_reduce($this->cartItems, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function render()
    {
        return view('livewire.shop.mini-cart');
    }
}